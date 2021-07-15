<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'numero_rastreo' => $this->numero_rastreo,
            'nombre' => $this->nombre,
            'url' => $this->url,
            'disponibilidad_venta' => DetalleVentaResource::collection($this->disponibilidad_venta)
        ];
    }
}
