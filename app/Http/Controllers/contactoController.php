<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class contactoController extends Controller
{
    public function index() {
        return Inertia::render('Public/contacto/Index');
    }
}



