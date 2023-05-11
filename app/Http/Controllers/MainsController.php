<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\main;

include 'InitialValues.php';

class MainsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $principal = main::all();
        return view('main.index', ['main' => $principal]);
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
        $main = main::find($id);
        return view('admin.main.edit', ['main' => $main]);
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
        $request->validate(
            [
                'name1' => 'required',
            ] /* ,
            $message = [
                'required' => 'el campo :attribute es requerido',
                'numeric' =>
                    'el campo :attribute no es numerico(Este campo necesita ser un numero)',
            ] */
        );

        $main = main::find($id);
        $main->name1 = $request->name1;
        $main->name2 = $request->name2 == null ? '' : $request->name2;
        $main->save();
        return redirect()
            ->route('home')
            ->with(
                'success',
                'Nombre del sitio web actualizado correctamente.'
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
