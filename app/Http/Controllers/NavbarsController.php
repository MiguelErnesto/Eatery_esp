<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\navbar;
use App\Models\section1;

include 'InitialValues.php';

class NavbarsController extends Controller
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
        $navbar = navbar::find($id);
        return view('admin.navbar.edit', ['navbar' => $navbar]);
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
            'item1' => 'required',
            'item2' => 'required',
            'item3' => 'required',
            'item4' => 'required',
            'item5' => 'required',
            'item6' => 'required',
            'item7' => 'required',
        ]);

        $navbar = navbar::find($id);

        $old_value = null;
        $new_value = null;
        if ($navbar->item1 != $request->item1) {
            section1::where('link_button', $navbar->item1)->update([
                'link_button' => $request->item1,
            ]);
        }
        if ($navbar->item2 != $request->item2) {
            section1::where('link_button', $navbar->item2)->update([
                'link_button' => $request->item2,
            ]);
        }
        if ($navbar->item3 != $request->item3) {
            section1::where('link_button', $navbar->item3)->update([
                'link_button' => $request->item3,
            ]);
        }
        if ($navbar->item4 != $request->item4) {
            section1::where('link_button', $navbar->item4)->update([
                'link_button' => $request->item4,
            ]);
        }
        if ($navbar->item5 != $request->item5) {
            section1::where('link_button', $navbar->item5)->update([
                'link_button' => $request->item5,
            ]);
        }
        if ($navbar->item6 != $request->item6) {
            section1::where('link_button', $navbar->item6)->update([
                'link_button' => $request->item6,
            ]);
        }
        if ($navbar->item7 != $request->item7) {
            section1::where('link_button', $navbar->item7)->update([
                'link_button' => $request->item7,
            ]);
        }

        $navbar->item1 = $request->item1;
        $navbar->item2 = $request->item2;
        $navbar->item3 = $request->item3;
        $navbar->item4 = $request->item4;
        $navbar->item5 = $request->item5;
        $navbar->item6 = $request->item6;
        $navbar->item7 = $request->item7;

        $navbar->chk1 = $request->nav_chk1 != null ? 1 : 0;
        $navbar->chk2 = $request->nav_chk2 != null ? 1 : 0;
        $navbar->chk3 = $request->nav_chk3 != null ? 1 : 0;
        $navbar->chk4 = $request->nav_chk4 != null ? 1 : 0;
        $navbar->chk5 = $request->nav_chk5 != null ? 1 : 0;
        $navbar->chk6 = $request->nav_chk6 != null ? 1 : 0;
        $navbar->chk7 = $request->nav_chk7 != null ? 1 : 0;

        $navbar->save();

        return redirect()
            ->route('home')
            ->with('success', 'Menú superior actualizado correctamente.');
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
