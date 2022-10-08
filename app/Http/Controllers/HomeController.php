<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $randomImgs = ['bombril.png', 'nescau.png', 'redbull.jpg', 'adidas.png', 'guarana.jpg', 'steam.png'];

        $selectedImg = $randomImgs[array_rand($randomImgs)];
        $users = User::all();
        return view('home.home', compact('users', 'selectedImg'));
    }
}
