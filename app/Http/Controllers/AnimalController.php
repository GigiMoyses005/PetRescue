<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class AnimalController extends Controller
{
    use AuthorizesRequests;
   public function index(Request $request)
{
    $query = Animal::query();

    // filtro por espécie
    if ($request->filled('especie')) {
        $query->where('especie', $request->especie);
    }

    // porte
    if ($request->filled('porte')) {
        $query->where('porte', $request->porte);
    }

    // idade (faixa)
  if ($request->filled('idade')) {

    $partes = explode(' ', $request->idade, 2);

    $numero = $partes[0];
    $unidade = $partes[1] ?? null;

    if ($unidade) {
        $query->where('idade', $numero)
              ->where('tempo', $unidade);
    }
}

    // sexo
    if ($request->filled('sexo')) {
        $query->where('sexo', $request->sexo);
    }

    // raça
    if ($request->filled('raca')) {
        $query->where('raca', 'LIKE', '%' . $request->raca . '%');
    }

    // localização (cidade/estado)
    if ($request->filled('localizacao')) {
        $query->where('localizacao', 'LIKE', '%' . $request->localizacao . '%');
    }

    $animals = $query->paginate(12)->appends($request->query());

    return view('animals.index', compact('animals'));
}

    public function create()
    {
        $this->authorize('create', Animal::class);
        return view('animals.create');
    }


    public function store(Request $request)
    {
        $this->authorize('create', Animal::class);

        $data = $request->validate([
            'nome' => 'required|string|max:150',
            'especie' => 'nullable|string|max:50',
            'raca' => 'nullable|string|max:100',
            'idade' => 'nullable|string|max:50',
            'tempo' => 'nullable|string|max:50',
            'porte' => 'nullable|string|max:20',
            'sexo' => 'nullable|in:M,F,U',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|image|max:2048'
        ]);
        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('animals', 'public');
        }
        $data['user_id'] = auth()->id();
        Animal::create($data);
        return redirect()->route('animals.index')->with('success', 'Animal cadastrado.');
    }

    public function show(Animal $animal)
    {
        return view('animals.show', compact('animal'));
    }

    public function edit(Animal $animal)
    {
        $this->authorize('update', $animal);
        return view('animals.edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal)
    {
        $this->authorize('update', $animal);
        $data = $request->validate([
            'nome' => 'required|string|max:150',
            'imagem' => 'nullable|image|max:2048',
            'descricao' => 'nullable|string',
        ]);
        if ($request->hasFile('imagem')) {
            if ($animal->imagem) Storage::disk('public')->delete($animal->imagem);
            $data['imagem'] = $request->file('imagem')->store('animals', 'public');
        }
        $animal->update($data);
        return redirect()->route('animals.show', $animal)->with('success', 'Atualizado.');
    }

    public function destroy(Animal $animal)
    {
        $this->authorize('delete', $animal);
        if ($animal->imagem) Storage::disk('public')->delete($animal->imagem);
        $animal->delete();
        return redirect()->route('animals.index')->with('success', 'Removido.');
    }
    
}
