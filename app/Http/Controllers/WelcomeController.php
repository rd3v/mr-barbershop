<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DataInformasi;

class WelcomeController extends Controller
{

    public function index() {    
        $informasi = DataInformasi::get();
        return view('welcome', compact('informasi'));
    }

}
