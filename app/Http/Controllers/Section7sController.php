<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\section7;

include 'InitialValues.php';

class Section7sController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        $section7 = section7::find($id);
        return view('admin.section7.edit', compact('section7'));
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
        $request->validate([
            //Find us
            'fu_description' => 'required',

            //Reservation
            'rv_number1' => 'required',
            'rv_number2' => 'required',
            'rv_email' => 'required|email',
            'rv_text' => 'required',

            //Open Hours
            'oh_closed' => 'required',
            'oh_days1' => 'required',
            'oh_hours1' => 'required',
            'oh_days2' => 'required',
            'oh_hours2' => 'required',
        ]);

        $section7 = section7::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $ruta = public_path('images/' . $file_name);
            $ext = $file->guessExtension();

            if (
                $ext == 'jpeg' or
                $ext == 'png' or
                $ext == 'jpg' or
                $ext == 'gif' or
                $ext == 'svg'
            ) {
                if (file_exists($ruta)) {
                    !unlink($ruta);
                }
                copy($file, $ruta);
                $section7->oh_bg_image = $file_name;
            } else {
                return redirect()
                    ->route('section7.edit')
                    ->with(
                        'success',
                        'Escoja un formato de imagen válido (jpeg, png, jpg, gif, svg)'
                    );
            }
        }

        //Find us
        $section7->fu_description = $request->fu_description;

        //Reservation
        $section7->rv_number1 = $request->rv_number1;
        $section7->rv_number2 = $request->rv_number2;
        $section7->rv_email = $request->rv_email;
        $section7->rv_text = $request->rv_text;

        //Open Hours
        $section7->oh_closed = $request->oh_closed;
        $section7->oh_days1 = $request->oh_days1;
        $section7->oh_hours1 = $request->oh_hours1;
        $section7->oh_days2 = $request->oh_days2;
        $section7->oh_hours2 = $request->oh_hours2;

        $section7->save();
        return redirect()
            ->route('home')
            ->with(
                'success',
                'Sección  ' .
                    config('app.nav_section7') .
                    ' actualizada exitosamente.'
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
