<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\main;
use App\Models\navbar;
use App\Models\section1;
use App\Models\section2;
use App\Models\section3;
use App\Models\section3_imgs;
use App\Models\section3_imgs_social_networks;
use App\Models\section4;
use App\Models\section4_testimonials;
use App\Models\section4_images;
use App\Models\section5;
use App\Models\section6;
use App\Models\section7;
use App\Models\social_network;
use App\Models\footer;

include 'InitialValues.php';

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section1s = section1::all();
        $section2 = section2::all()->first();
        $section3 = section3::all()->first();
        $section3_imgs = section3_imgs::all();
        $section3_imgs_social_networks = section3_imgs_social_networks::all();
        $section4 = section4::all()->first();
        $section4_images = section4_images::all();
        $section4_testimonials = section4_testimonials::all();
        $section5 = section5::all()->first();
        $section6 = section6::all()->first();
        $section7 = section7::all()->first();
        $social_networks = social_network::all();
        $footer = footer::all()->first();

        return view(
            'welcome',
            compact(
                'section1s',
                'section2',
                'section3',
                'section3_imgs',
                'section3_imgs_social_networks',
                'section4',
                'section4_images',
                'section4_testimonials',
                'section5',
                'section6',
                'section7',
                'social_networks',
                'footer'
            )
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
        //
    }
}
