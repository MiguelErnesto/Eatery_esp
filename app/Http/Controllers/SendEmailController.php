<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Mail\NotifyMail;
use App\Models\section7;
use App\Models\reservation;

include 'InitialValues.php';

class SendEmailController extends Controller
{
    public function send_contact_email(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email | required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $section7 = section7::all()->first();
        $contact = $section7->rv_email;

        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'subject' =>
                config('app.nombre_principal') . ' - ' . $request->subject,
            'body' => [
                'date' => '',
                'message' => $request->message,
            ],
        ];

        Mail::to($contact)->send(new NotifyMail($data));

        return redirect()
            ->route('welcome')
            ->with(
                'success',
                'Correo electrónico de contacto enviado exitosamente.'
            );
    }

    public function send_reservation_email(
        $id,
        $name,
        $email,
        $date,
        $time,
        $quantity
    ) {
        $data = [
            'email' => $email,
            'name' => $name,
            'subject' =>
                config('app.nombre_principal') .
                ' - ' .
                'New Reservation' .
                '  (Code: RV' .
                $id .
                ')',
            'body' => [
                'code' => 'RV' . $id,
                'date' => $date,
                'time' => $time,
                'quantity' => $quantity,
            ],
        ];

        $section7 = section7::all()->first();
        $contact = $section7->rv_email;

        Mail::to($contact)->send(new NotifyMail($data));

        return redirect()
            ->route('welcome')
            ->with(
                'success',
                'Correo electrónico de reservación enviado exitosamente.'
            );
    }
}
