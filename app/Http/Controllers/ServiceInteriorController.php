<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceInteriorController extends Controller
{
  public function index(){
      return view('admin.interior.index');
  }
}
