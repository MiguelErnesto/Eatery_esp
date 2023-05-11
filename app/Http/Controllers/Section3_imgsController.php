<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\section3_imgs;
use App\Models\section3_imgs_social_networks;

include 'InitialValues.php';

class section3_imgsController extends Controller
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
        return view('admin.section3_imgs.create');
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
            'name' => 'required',
            'role' => 'required',
            'text_social_networks' => 'required',
        ]);

        $section3_imgs = new section3_imgs();

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
                $section3_imgs->image = $file_name;
            } else {
                return redirect()
                    ->route('section3_imgs.edit', ['section3_img' => $id])
                    ->with(
                        'success',
                        'Escoja un formato de imagen válido (jpeg, png, jpg, gif, svg)'
                    );
            }
        } else {
            return redirect()
                ->route('section3_imgs.edit', ['section3_img' => $id])
                ->with(
                    'success',
                    'Escoja un formato de imagen válido (jpeg, png, jpg, gif, svg)'
                );
        }

        $section3_imgs->name = $request->name;
        $section3_imgs->role = $request->role;
        $section3_imgs->text_social_networks = $request->text_social_networks;

        $section3_imgs->save();

        return redirect()
            ->route('section3.index')
            ->with(
                'success',
                'Sección ' .
                    config('app.nav_section3') .
                    ' actualizada correctamente.'
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
        session()->put('section3_id', $id);

        $section3_imgs = section3_imgs::find($id);
        $section3_imgs_social_networks = section3_imgs_social_networks::all();
        $section3_imgs_social_networks = section3_imgs_social_networks::where(
            'section3_imgs_id',
            $id
        )->get();

        return view(
            'admin.section3_imgs.edit',
            compact('section3_imgs', 'section3_imgs_social_networks')
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
            'name' => 'required',
            'role' => 'required',
            'text_social_networks' => 'required',
        ]);

        $section3_imgs = section3_imgs::find($id);

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
                $section3_imgs->image = $file_name;
            } else {
                return redirect()
                    ->route('section3_imgs.edit', ['section3_img' => $id])
                    ->with(
                        'success',
                        'Escoja un formato de imagen válido (jpeg, png, jpg, gif, svg)'
                    );
            }
        }

        $section3_imgs->name = $request->name;
        $section3_imgs->role = $request->role;
        $section3_imgs->text_social_networks = $request->text_social_networks;

        $section3_imgs->save();

        return redirect()
            ->route('section3.index')
            ->with(
                'success',
                'Sección' .
                    config('app.nav_section3') .
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
        $section3_imgs = section3_imgs::find($id);
        $section3_imgs->delete();

        return redirect()
            ->route('section3.index')
            ->with(
                'success',
                'Sección' .
                    config('app.nav_section3') .
                    '  actualizada correctamente.'
            );
    }
}
