<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representant extends Model
{
    use HasFactory;
    protected $fillable = ["nom","nin","profession","liste","commune_id","lieuvote_id"  ] ;
    
    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }
    public function lieuvote()
    {
        return $this->belongsTo(Lieuvote::class);
    }
}
