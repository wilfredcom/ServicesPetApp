<?php

namespace App\Http\Controllers;

use App\Models\prestador_servicio;
use Illuminate\Http\Request;

class PrestadorServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         try {
            $prestador_servicio = prestador_servicio::all();
            return response()->json($prestador_servicio);
        } catch (\Throwable $th) {
            throw $th;
        }
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
     * @param  \App\Models\prestador_servicio  $prestador_servicio
     * @return \Illuminate\Http\Response
     */
    public function show(prestador_servicio $prestador_servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\prestador_servicio  $prestador_servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(prestador_servicio $prestador_servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prestador_servicio  $prestador_servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prestador_servicio $prestador_servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prestador_servicio  $prestador_servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(prestador_servicio $prestador_servicio)
    {
        //
    }
}
