<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detalle_venta';

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id', 'producto_id');
    }
}
