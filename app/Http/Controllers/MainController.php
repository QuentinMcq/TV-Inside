<?php

namespace App\Http\Controllers;

use App\Serie;
use App\User;
use Illuminate\Http\Request;

class MainController extends Controller
{

    /**
     * MainController constructor.
     */


    public function index() {
        $series = Serie::all()->random(5);


        return view("index", ['series'=>$series]);
    }
}
