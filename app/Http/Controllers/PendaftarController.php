<?php

namespace App\Http\Controllers;

use App\DataTables\PendaftarDatatable;
use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form = Form::all();
        return view('pendaftar.index', ['form' => $form]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = Form::find($id)->first();
        $user = User::find($form->user_id)->first();
        return view('pendaftar.show', ['data' => $form, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = Form::find($id)->first();
        if ($request->status == 'diterima') {
            $form->update(['status' => 'diterima']);
            return response()->json(['status' => 200]);
        } else if ($request->status == 'dicadangkan') {
            $form->update(['status' => 'dicadangkan']);
            return response()->json(['status' => 200]);
        } else if ($request->status == 'tidak diterima') {
            $form->update(['status' => 'tidak diterima']);
            return response()->json(['status' => 200]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }
}
