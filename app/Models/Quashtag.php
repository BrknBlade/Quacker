<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quashtag extends Model
{
    /** @use HasFactory<\Database\Factories\QuashtagFactory> */
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    //quacks_quashtags lo he puesto en plural por no cambiar el nombre de la tabla
    public function quacks(){
        return $this->belongsToMany(Quack::class, 'quacks_quashtags', 'quashtag_id', 'quack_id');
    }
}
