<?php
namespace App\Http\Controllers;

use App\Models\Adotante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdotanteAuthController extends Controller
{
    public function showRegister(){ return view('adotante.register'); }
    public function showLogin(){ return view('adotante.login'); }

    public function register(Request $request){
        $data = $request->validate([
            'nome'=>'required|string|max:150',
            'email'=>'required|email|unique:adotantes,email',
            'password'=>'required|min:6|confirmed'
        ]);
        $data['password'] = Hash::make($data['password']);
        $ad = Adotante::create($data);
        Auth::guard('web')->logout(); // ensure user guard not interfering
        Auth::loginUsingId($ad->id); // log in via default guard (we'll treat adotante as auth user)
        return redirect('/')->with('success','Registrado como adotante.');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        // attempt with adotantes table
        $ad = Adotante::where('email',$credentials['email'])->first();
        if($ad && Hash::check($credentials['password'],$ad->password)){
            Auth::loginUsingId($ad->id);
            return redirect('/')->with('success','Logado como adotante.');
        }
        return back()->withErrors(['email'=>'Credenciais inválidas.']);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
