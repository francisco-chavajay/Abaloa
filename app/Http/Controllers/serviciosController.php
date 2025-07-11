<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class serviciosController extends Controller
{
    public function index() {
        return Inertia::render('Public/servicios/Index');
    }
}



