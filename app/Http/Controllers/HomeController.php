<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){

        // lo mas vistos
        $lstArt = [
            (object) ['title' => 'Titulo 1', 'conten' => 'contenido','published_at' =>  "2021-12-09"],
            (object) ['title' => 'Titulo 2', 'conten' => 'contenido','published_at' =>  "2021-12-09"],
            (object) ['title' => 'Titulo 3', 'conten' => 'contenido','published_at' =>  "2021-12-09"],
            (object) ['title' => 'Titulo 4', 'conten' => 'contenido','published_at' =>  "2021-12-09"],
            (object) ['title' => 'Titulo 5', 'conten' => 'contenido','published_at' =>  "2021-12-09"],
        ];

        //recientes
        return view('blog.home')->with(['lstArt' => $lstArt]);
    }
}
