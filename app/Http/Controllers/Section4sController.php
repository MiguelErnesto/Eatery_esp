<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\section4;
use App\Models\section4_images;
use App\Models\section4_testimonials_header;
use App\Models\section4_testimonials;

include 'InitialValues.php';

class Section4sController extends Controller
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
        $section4 = section4::find($id);
        $section4_images = section4_images::all();
        $section4_testimonials = section4_testimonials::all();

        return view(
            'admin.section4.edit',
            compact('section4', 'section4_images', 'section4_testimonials')
        );
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
            'title' => 'required',
            'description' => 'required',
        ]);

        $section4 = section4::find($id);

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
                $section4->bg_testimonials_image = $file_name;
            } else {
                return redirect()
                    ->route('section4.edit', ['section4' => 1])
                    ->with(
                        'success',
                        'Escoja un formato de imagen válido (jpeg, png, jpg, gif, svg)'
                    );
            }
        }

        $section4->title = $request->title;
        $section4->description = $request->description;
        $section4->save();
        return redirect()
            ->route('home')
            ->with(
                'success',
                'Sección  ' .
                    config('app.nav_section4') .
                    '  actualizada exitosamente.'
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
