<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\section2;

include 'InitialValues.php';

class Section2sController extends Controller
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
        $section2 = section2::find($id);
        return view('admin.section2.edit', compact('section2'));
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
            'small_text' => 'required',
            'large_text' => 'required',
            'description' => 'required',
        ]);

        $section2 = section2::find($id);

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
                $section2->image = $file_name;
            } else {
                return redirect()
                    ->route('section2.edit', ['section2' => 1])
                    ->with(
                        'success',
                        'Escoja un formato de imagen válido (jpeg, png, jpg, gif, svg)'
                    );
            }
        }

        $section2->small_text = $request->small_text;
        $section2->large_text = $request->large_text;
        $section2->description = $request->description;

        $section2->save();

        return redirect()
            ->route('home')
            ->with(
                'success',
                'Sección  ' .
                    config('app.nav_section2') .
                    '  actualizada correctamente.'
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
