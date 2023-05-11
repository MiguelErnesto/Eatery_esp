<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\section4_testimonials;

include 'InitialValues.php';

class Section4_testimonialsController extends Controller
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
        return view('admin.section4_testimonials.create');
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
            'name' => 'required',
            'name_description' => 'required',
            'testimonial_text' => 'required',
        ]);

        $section4_testimonials = new section4_testimonials();

        $section4_testimonials->name = $request->name;
        $section4_testimonials->name_description = $request->name_description;
        $section4_testimonials->testimonial_text = $request->testimonial_text;

        $section4_testimonials->save();

        return redirect()
            ->route('section4.edit', ['section4' => 1])
            ->with('success', 'Testimonio creado exitosamente.');
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
        $section4_testimonials = section4_testimonials::find($id);
        return view('admin.section4_testimonials.edit', [
            'section4_testimonials' => $section4_testimonials,
        ]);
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
            'name_description' => 'required',
            'testimonial_text' => 'required',
        ]);

        $section4_testimonials = section4_testimonials::find($id);

        $section4_testimonials->name = $request->name;
        $section4_testimonials->name_description = $request->name_description;
        $section4_testimonials->testimonial_text = $request->testimonial_text;

        $section4_testimonials->save();

        return redirect()
            ->route('section4.edit', ['section4' => 1])
            ->with('success', 'Testimonio actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section4_testimonials = section4_testimonials::find($id);

        $section4_testimonials->delete();
        return redirect()
            ->route('section4.edit', ['section4' => 1])
            ->with('success', 'Testimonio eliminado exitosamente.');
    }
}
