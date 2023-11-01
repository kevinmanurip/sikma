<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        $data = array(
            'active' => 'profile',
            'title' => 'Profile'
        );

        return view('user.profile', $data);
    }
}
