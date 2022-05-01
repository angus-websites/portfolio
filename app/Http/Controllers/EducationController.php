<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{

    public function __construct()
    {
      $this->authorizeResource(Education::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('education.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('education.edit' , ["education" => new Education()]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        return view('education.edit' , ["education" => $education]);
    }

}
