<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function index()
    {
        $agendas = Agenda::latest()->paginate(10);
        return view('agendas.index', compact('agendas'));
    }


    public function show(Agenda $agenda)
    {
        return view('agendas.show', 'agenda');
    }


    public function edit(Agenda $agenda)
    {
        return view('agendas.edit', 'agenda');
    }


    public function update(Request $request, Agenda $agenda)
    {

    }


    public function destroy(Agenda $agenda)
    {
        //
    }
}
