<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return Inertia::render('Public/Contact/Index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        // Guardar en la base de datos
        $contact = Contact::create($data);

        // Obtener la dirección de correo de "from" desde la configuración
        $fromEmail = config('mail.from.address'); // El correo de destino

        // Enviar el correo: el remitente es el correo que ingresa el usuario, y el destinatario es el "from"
        Mail::to($fromEmail)
            ->send(new ContactFormMail($contact, $data['email'])); // Enviamos también el correo del usuario como remitente

        return response()->json(['message' => 'Formulario enviado con éxito'], 200);
    }
}
