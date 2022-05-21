<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\cliente;

class ClienteResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            cliente::all()->map(function($cliente){
                return [
                    "nombres" => $cliente->nombres,
                    "apellidos" => $cliente->apellidos,
                    "correo" => $cliente->correo,
                    "telefono" => $cliente->telefono,
                ];
            })
        ];
    }
}
