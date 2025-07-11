<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class nosotrosController extends Controller
{
    public function index() {
        return Inertia::render('Public/nosotros/Index');
    }
}



