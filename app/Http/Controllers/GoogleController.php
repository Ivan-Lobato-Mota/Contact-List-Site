<?php

namespace App\Http\Controllers;

class GoogleController extends Controller

{

    public function index(){

        return view('googleAutocomplete');

    }

}