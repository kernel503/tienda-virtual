<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'producto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['numero_rastreo', 'nombre', 'url'];

    /**
     * Obtiene los detalle del producto.
     */
    public function disponibilidad_venta()
    {
        return $this->hasMany(DetalleVenta::class, 'producto_id', 'id');
    }
}
