<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservation;
use App\Http\Controllers\SendEmailController;

include 'InitialValues.php';

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = reservation::Paginate(15);
        $count = reservation::all()->count();
        return view(
            'admin.reservation.index',
            compact('reservations', 'count')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'rsv_name' => 'required',
            'rsv_email' => 'required',
            'rsv_date' => 'required',
            'rsv_time' => 'required',
            'rsv_quantity' => 'required',
        ]);

        $reservation = new reservation();

        $reservation->name = $request->rsv_name;
        $reservation->email = $request->rsv_email;
        $reservation->date = $request->rsv_date;
        $reservation->time = $request->rsv_time;
        $reservation->quantity = $request->rsv_quantity;

        $reservation->save();

        //enviar email de reserva
        $SendEmailController = new SendEmailController();
        $SendEmailController->send_reservation_email(
            $reservation->id,
            $reservation->name,
            $reservation->email,
            $reservation->date,
            $reservation->time,
            $reservation->quantity
        );

        return redirect()
            ->route('welcome')
            ->with(
                'success',
                'La reservación fue enviada exitosamente  (Code: RV' .
                    $reservation->id .
                    ')'
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = reservation::find($id);
        $id_deleted = $reservation->id;

        $reservation->delete();
        return redirect()
            ->route('reservation.index')
            ->with(
                'success',
                'La reservación RV' .
                    $id_deleted .
                    ' fue eliminada correctamente.'
            );
    }
}
