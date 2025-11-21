<?php
namespace App\Http\Controllers;

use App\Models\Animal;

class HomeController extends Controller
{
    public function index(){
        $latest = Animal::where('status','disponivel')->latest()->take(8)->get();
        return view('home', compact('latest'));
    }
}
