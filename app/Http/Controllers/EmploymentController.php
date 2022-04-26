<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employment;

class EmploymentController extends Controller
{

    public function __construct()
    {
      $this->authorizeResource(Employment::class);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employment.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employment $employment)
    {
        return view('employment.edit' , ["employment" => $employment]);
    }
}
