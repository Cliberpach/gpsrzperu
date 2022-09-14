<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    public $primaryKey = 'id';
    protected $fillable = ['nombre',
                           'tipo_documento',
                           'documento',
                           'nombre_comercial',
                           'direccion_fiscal',
                           'direccion',
                           'tipo_documento_contacto',
                           'documento_contacto',
                           'nombre_contacto',
                           'telefono_movil',
                           'correo_electronico',
                           'whatsapp',
                           'facebook',
                           'estado',
                           'user_id'
                        ];
    public $timestamps = true;

    public function usuario()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
