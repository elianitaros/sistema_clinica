<?php

namespace App\Modelos\Hclinica;

use Illuminate\Database\Eloquent\Model;

class DetalleReceta extends Model
{
    protected $table = 'detalle_receta';

    protected $fillable = ['producto_id','nombre_generico','precio','unidad'
    ];

    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }
}
