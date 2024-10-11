<?php
namespace App\Repositories;

use App\Models\Commune;
use App\Repositories\RessourceRepository;
use Illuminate\Support\Facades\DB;

class CommuneRepository extends RessourceRepository{
    public function __construct(Commune $commune){
        $this->model = $commune;
    }
    public function getAllWithdepartement(){
        return Commune::with(['departement','departement.region'])
        ->get();
    }
    public function getOneCommuneWithdepartementAndRegion($id){
        return Commune::with(['departement','departement.region'])
        ->where('id',$id)
        ->first();
    }
    public function getByDepartement($departement){
        return DB::table("communes")
        ->where("departement_id",$departement)
        ->orderBy("nom","asc")
        ->get();
}
public function getAllOnLy(){
    return DB::table("communes")
    ->orderBy("nom","asc")
    ->get();
}
public function updateEtat($id){
    return DB::table("communes")->where("id",$id)->update(["etat"=>true]);
}

public function getCommuneByNom($nom){
    return DB::table("communes")->where('nom', 'like', '%'.$nom.'%')->get();
} 

}
