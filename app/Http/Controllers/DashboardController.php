<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Form::where('user_id', '=', auth()->user()->id)->first();
        return view('dashboard.index', ['data' => $data]);
    }
}
