<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        return "Hello, Lara!";
    }

    public function demo()
    {
        return view('demo.demo_blade');
    }

    public function lara()
    {
        return "Lara!";
    }

    public function hello()
    {
        return "Hello!";
    }

}
