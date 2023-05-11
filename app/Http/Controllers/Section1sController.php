<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\section1;
use App\Models\navbar;

include 'InitialValues.php';

class Section1sController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section1s = section1::all();
        return view('admin.section1.index', compact('section1s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $navbar = navbar::all();
        return view('admin.section1.create', compact('navbar'));
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
            'image' => 'required',
            'lb_button' => 'required',
            'link_button' => 'required',
            'small_text' => 'required',
            'large_text' => 'required',
        ]);

        $section1 = new section1();

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
                $section1->image = $file_name;
            } else {
                return redirect()
                    ->route('section1.create')
                    ->with(
                        'success',
                        'Escoja un formato de imagen válido (jpeg, png, jpg, gif, svg)'
                    );
            }
        } else {
            return redirect()
                ->route('section1.create')
                ->with(
                    'success',
                    'Escoja un formato de imagen válido (jpeg, png, jpg, gif, svg)'
                );
        }

        $section1->lb_button = $request->lb_button;
        $section1->link_button = $request->link_button;
        $section1->small_text = $request->small_text;
        $section1->large_text = $request->large_text;

        $section1->save();

        return redirect()
            ->route('section1.index')
            ->with(
                'success',
                'Sección  ' .
                    config('app.nav_section1') .
                    ' actualizada correctatmente.'
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
        $section1 = section1::find($id);
        $navbar = navbar::all();

        return view('admin.section1.edit', compact('section1', 'navbar'));
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
            'lb_button' => 'required',
            'link_button' => 'required',
            'small_text' => 'required',
            'large_text' => 'required',
        ]);

        $section1 = section1::find($id);

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
                $section1->image = $file_name;
            } else {
                return redirect()
                    ->route('section1.edit')
                    ->with(
                        'success',
                        'Escoja un formato de imagen válido (jpeg, png, jpg, gif, svg)'
                    );
            }
        }

        $section1->lb_button = $request->lb_button;
        $section1->link_button = $request->link_button;
        $section1->small_text = $request->small_text;
        $section1->large_text = $request->large_text;

        $section1->save();

        return redirect()
            ->route('section1.index')
            ->with(
                'success',
                'Sección  ' .
                    config('app.nav_section1') .
                    ' actualizada correctamente.'
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
        $section1 = section1::find($id);

        $section1->delete();
        return redirect()
            ->route('section1.index')
            ->with(
                'success',
                'Sección  ' .
                    config('app.nav_section1') .
                    ' actualizada correctamente.'
            );
    }
}
