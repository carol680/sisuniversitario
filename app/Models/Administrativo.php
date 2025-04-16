<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    use HasFactory;

    protected $table ='administrativos';

    protected $fillable =[
        'usuario_id',
        'nombre',
        'apellidos',
        'ci',
        'fecha_nacimiento',
        'telefono', 
        'direccion',
        ' profecion',

    ];
    public function usuario()
    {
        return $this->belongsto(User::class);
    }
}
