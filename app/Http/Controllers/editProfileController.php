<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class editProfileController extends Controller
{
    public function index() {
        return view('editProfile');
    }

    public function update(Request $request) {

    }
}