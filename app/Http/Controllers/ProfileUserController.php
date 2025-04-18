<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ProfileUserController extends Controller
{

    public function index()
    {
        $data = Profile::query()->get();
//        dd($data);
        return view('profile', compact('data'));
    }
    public function create(): View|Application|Factory
    {
        return view('createProfile');
    }
}
