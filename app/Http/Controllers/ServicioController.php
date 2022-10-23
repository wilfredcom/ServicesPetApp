<?php

namespace App\Http\Controllers;

use App\Events\ServicesEvent;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\{ResponseRequestDriveEvent, CancelServicioEvent};


class ServicioController extends Controller
{
    public function indexDriver()
    {
        try {
            /* 
                SELECT *
FROM servicios
WHERE servicios.estado = 'solicitando servicio' 
AND servicios.acept_servicio_driver IS NULL
AND servicios.acept_servicio_user IS NUll
            */
            $servicios = Servicio::with(['belongToUser', 'belongToDriver'])
                                ->where('estado', 'solicitando servicio')
                                ->whereRaw('acept_servicio_driver IS NULL')
                                ->whereRaw('acept_servicio_user IS NULL')
                                ->orderBy('id', 'desc')->get();
            return response()->json($servicios);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function index()
    {
        try {
            $servicios = Servicio::with(['belongToUser', 'belongToDriver'])->orderBy('id', 'desc')->get();
            return response()->json($servicios);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request)
    {
        try {
            return DB::transaction(function()use ($request) {
                $servicio = new Servicio();
                $servicio->type_solicitud = $request['type_solicitud'];
                $servicio->inicio_ruta_coords = json_encode($request['inicio_ruta_coords']);
                $servicio->final_ruta_coords = json_encode($request['final_ruta_coords']);
                $servicio->inicio_ruta_address = $request['inicio_ruta_address'];
                $servicio->final_ruta_address = $request['final_ruta_address'];
                $servicio->distancia_servicio = json_encode($request['distancia_servicio']);
                $servicio->tiempo_aproximado_de_viaje = json_encode($request['tiempo_aproximado_de_viaje']);
                $servicio->costo = $request['costo'];
                $servicio->estado = $request['estado'];
                $servicio->user_id = $request['user_id'];

                $servicio->alto = $request['paquete']['alto'];
                $servicio->largo = $request['paquete']['largo'];
                $servicio->ancho = $request['paquete']['ancho'];
                $servicio->peso = $request['paquete']['peso'];
                $servicio->descripcion = $request['paquete']['descripcion'];
                
                $servicio->cantidad = $request['paquete']['cantidad'];
                $servicio->save();

                $serv = $servicio->with(['belongToUser', 'belongToDriver'])->where('id', $servicio['id'])->first();

                ServicesEvent::dispatch($serv);

                return response()->json($serv);

            }, 5);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function storeResponseDrive(Request $request)
    {
        try {
            return DB::transaction(function()use ($request) {
                $drive = collect(json_decode($request['drive']));
                $servicio = new Servicio();
                $servicio->find($request['id'])->update([
                    "user_conductor_id" => $drive['id'],
                    'acept_servicio_driver' => true,
                    'estado' => $drive['respuesta']." : Conductor"
                ]);

                $serv = $servicio->with(['belongToUser', 'belongToDriver'])->where('id', $request['id'])->first();
                
                ResponseRequestDriveEvent::dispatch($serv);

                // return response()->json($servicio);

            }, 5);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function cancelViaje(Request $request, $id_servicio = null)
    {
        try {
            return DB::transaction(function()use ($request, $id_servicio) {
                Servicio::where('id',$id_servicio)
                ->where('user_id',$request['user_id'])
                ->update([
                    'estado' => $request['estado'],
                    'acept_servicio_user' => false
                ]);
                $serv = Servicio::with(['belongToUser', 'belongToDriver'])->where('id', $id_servicio)->first();

                CancelServicioEvent::dispatch($serv);

                return response()->json($serv);

            }, 5);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function rechazarViaje(Request $request, $id_servicio = null)
    {
        try {
            return DB::transaction(function()use ($request, $id_servicio) {
                Servicio::where('id',$id_servicio)
                ->update([
                    'acept_servicio_driver' => $request['rechazar'],
                    'user_conductor_id' => $request['user_id'],
                    'estado' => $request['estado'],
                ]);
                $serv = Servicio::with(['belongToUser', 'belongToDriver'])->where('id', $id_servicio)->first();

                CancelServicioEvent::dispatch($serv);

                return response()->json($serv);

            }, 5);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
