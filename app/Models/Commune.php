<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Jenssegers\Mongodb\Eloquent\Model ;

class Commune extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom','departement_id','latitude','longitude'
    ];
    public function departement(){
        return $this->belongsTo(Departement::class);
    }
    public function centrevotes(){
        return $this->hasMany(Centrevote::class);
    }
}
