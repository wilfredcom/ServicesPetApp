<?php

namespace App\Http\Controllers;

use App\Models\mascota;
use Illuminate\Http\Request;
use DB;
class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $mascotas = mascota::all();
            return response()->json($mascotas);
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
        try {
            return DB::transaction(function () use ($request) {
                
                $mascota = new mascota();
                $mascota->nombre = $request['nombre'];
                $mascota->peso = $request['peso'];
                $mascota->fecha_nacimiento = $request['fecha_nacimiento'];
                $mascota->save();

                return ['mensaje' => 'mascota registrada con exito'];

            });
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show(mascota $mascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit(mascota $mascota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mascota $mascota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy(mascota $mascota)
    {
        //
    }
}
