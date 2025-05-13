<?php

namespace App\Http\Controllers;

use App\Models\Portafolio;

class PortafolioController
{
    public function index()
    {
        $portafolios = Portafolio::all();

        return view('portafolio.index', compact('portafolios'));

    }

    public function show($id){
        $portafolio = Portafolio::findOrFail($id);

        return view('portafolio.show', compact('portafolio'));
    }
}
