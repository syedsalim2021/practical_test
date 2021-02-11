<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'logout']);

    }

     public function terminology()
    {
        return view('terminology.index');
    }

     public function specification()
    {
        return view('specification.index');
    }



}
