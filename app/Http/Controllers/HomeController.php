<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{

    public function index(){

        // lo mas vistos
        // $lstArt = [
        //     (object) ['title' => 'Titulo 1', 'conten' => 'contenido','published_at' =>  "2021-12-09"],
        //     (object) ['title' => 'Titulo 2', 'conten' => 'contenido','published_at' =>  "2021-12-09"],
        // ];

        $lstArt = Blog::all();
        //recientes
        return view('blog.home')->with(['lstArt' => $lstArt]);
    }
}
