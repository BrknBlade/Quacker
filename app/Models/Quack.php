<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Quack extends Model
{
    /** @use HasFactory<\Database\Factories\QuackFactory> */
    use HasFactory;

    protected $fillable = [
        'titulo',
        'mensaje',
        'user_id'
    ];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function requackers() {
        return $this->belongsToMany(User::class, 'quacker_user', 'quack_id', 'user_id');
    }

    public function quavers() {
        return $this->belongsToMany(User::class, 'quack_user_quav', 'quack_id', 'user_id');
    }

    //quacks_quashtags lo he puesto en plural por no cambiar el nombre de la tabla
    public function quashtags(){
        return $this->belongsToMany(Quashtag::class, 'quacks_quashtags', 'quack_id', 'quashtag_id');
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'likes');
    }
}
