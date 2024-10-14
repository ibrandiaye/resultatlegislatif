<?php
namespace App\Repositories;

use App\Models\Arrondissement;
use App\Repositories\RessourceRepository;
use Illuminate\Support\Facades\DB;

class ArrondissementRepository extends RessourceRepository{
    public function __construct(Arrondissement $Arrondissement){
        $this->model = $Arrondissement;
    }
    public function getAllWithdepartement(){
        return Arrondissement::with(['departement','departement.region'])
        ->get();
    }
    public function getOneArrondissementWithdepartementAndRegion($id){
        return Arrondissement::with(['departement','departement.region'])
        ->where('id',$id)
        ->first();
    }
    public function getByDepartement($departement){
        return DB::table("Arrondissements")
        ->where("departement_id",$departement)
        ->orderBy("nom","asc")
        ->get();
}
public function getAllOnLy(){
    return DB::table("Arrondissements")
    ->orderBy("nom","asc")
    ->get();
}
public function updateEtat($id){
    return DB::table("Arrondissements")->where("id",$id)->update(["etat"=>true]);
}

public function getArrondissementByNom($nom){
    return DB::table("Arrondissements")->where('nom', 'like', '%'.$nom.'%')->get();
}

public function getOneByName($nom)
{
    return DB::table("Arrondissements")->where("nom",$nom)->first();
}

}