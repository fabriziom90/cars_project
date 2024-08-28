<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('homepage');
    }

    public function about(){
        $name = 'Fabrizio Mastrobattista';
        $videogames = [
            'The Witcher 3',
            'Bloodborne',
            'Elden Ring',
            'Red Dead Redemption 2',
            'Paperino Operazione Papero'
        ];

        return view('about_me', compact('name', 'videogames'));
    }
}
