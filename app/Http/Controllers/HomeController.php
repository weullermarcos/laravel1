<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __invoke()
    {
        //criando um método padrão, para controllers que possuem apenas uma action
        return view('welcome');
    }
}
