<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdoptionStatusMail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdoptionController extends Controller
{
    use AuthorizesRequests;

    public function store(Request $request)
    {
        $data = $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'observacoes' => 'nullable|string|max:1000'
        ]);

        if (!auth()->check()) {
            return redirect()->route('adotante.login')->with('error', 'Faça login para solicitar.');
        }

        Adoption::create([
            'animal_id' => $data['animal_id'],
            'adotante_id' => auth()->id(),
            'observacoes' => $data['observacoes'] ?? null,
            'status' => 'pendente'
        ]);

        return redirect()->route('animals.show', $data['animal_id'])->with('success', 'Solicitação enviada.');
    }

    public function index()
    {
        $requests = Adoption::with(['animal', 'adotante'])
            ->latest()
            ->paginate(20);

        return view('admin.adoptions.index', compact('requests'));
    }

    public function approve($id)
    {
        $ad = Adoption::findOrFail($id);

        $ad->status = 'aprovado';
        $ad->data_adocao = now();
        $ad->save();

        $animal = $ad->animal;
        $animal->status = 'adotado';
        $animal->save();

        Mail::to($ad->adotante->email)->send(new AdoptionStatusMail($ad));

        return back()->with('success', 'Adoção aprovada.');
    }

    public function reject($id)
    {
        $ad = Adoption::findOrFail($id);

        $ad->status = 'rejeitado';
        $ad->save();

        Mail::to($ad->adotante->email)->send(new AdoptionStatusMail($ad));

        return back()->with('success', 'Solicitação rejeitada.');
    }

  public function destroy($id)
{
    $adoption = Adoption::findOrFail($id);

    // Corrigido — passa o $adoption
    $this->authorize('delete', $adoption);

    $adoption->delete();

    return back()->with('success', 'Adoção removida com sucesso.');
}


}


