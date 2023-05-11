<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\section3_imgs_social_networks;

include 'InitialValues.php';

class section3_imgs_social_networksController extends Controller
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
        return view('admin.section3_imgs_social_networks.create');
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
            'link' => 'required',
            'section3_imgs_id' => 'required',
        ]);

        $section3_imgs_social_networks = new section3_imgs_social_networks();

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
                $section3_imgs_social_networks->image = $file_name;
            } else {
                return redirect()
                    ->route('social_network.edit', ['social_network' => 1])
                    ->with(
                        'success',
                        'Escoja un formato de imagen válido (jpeg, png, jpg, gif, svg)'
                    );
            }
        } else {
            return redirect()
                ->route('social_network.edit', ['social_network' => 1])
                ->with(
                    'success',
                    'Escoja un formato de imagen válido (jpeg, png, jpg, gif, svg)'
                );
        }

        $section3_imgs_social_networks->name = $request->name;
        $section3_imgs_social_networks->link = $request->link;
        $section3_imgs_social_networks->section3_imgs_id =
            $request->section3_imgs_id;

        $section3_imgs_social_networks->save();
        return redirect()
            ->route('section3.index')
            ->with(
                'success',
                'Sección  ' .
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
        $section3_imgs_social_networks = section3_imgs_social_networks::find(
            $id
        );

        return view(
            'admin.section3_imgs_social_networks.edit',
            compact('section3_imgs_social_networks')
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
            'link' => 'required',
            'section3_imgs_id' => 'required',
        ]);

        $section3_imgs_social_networks = section3_imgs_social_networks::find(
            $id
        );

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
                $section3_imgs_social_networks->image = $file_name;
            } else {
                return redirect()
                    ->route('section3_imgs.edit', [
                        'section3_img' => session()->get('section3_id'),
                    ])
                    ->with(
                        'success',
                        'Escoja un formato de imagen válido (jpeg, png, jpg, gif, svg)'
                    );
            }
        }

        $section3_imgs_social_networks->name = $request->name;
        $section3_imgs_social_networks->link = $request->link;
        $section3_imgs_social_networks->section3_imgs_id =
            $request->section3_imgs_id;

        $section3_imgs_social_networks->save();
        return redirect()
            ->route('section3_imgs.edit', [
                'section3_img' => session()->get('section3_id'),
            ])
            ->with(
                'success',
                'Sección  ' .
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
        $section3_imgs_social_networks = section3_imgs_social_networks::find(
            $id
        );
        $section3_imgs_social_networks->delete();

        return redirect()
            ->route('section3.index')
            ->with(
                'success',
                'Sección ' .
                    config('app.nav_section3') .
                    '  actualizada correctamente.'
            );
    }
}
