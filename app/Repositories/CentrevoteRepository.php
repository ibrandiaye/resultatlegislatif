<?php
namespace App\Repositories;

use App\Models\Centrevote;
use App\Repositories\RessourceRepository;
use Illuminate\Support\Facades\DB;

class CentrevoteRepository extends RessourceRepository{
    public function __construct(Centrevote $centrevote){
        $this->model = $centrevote;
    }
    public function nbCentreVote(){
        return   DB::table('centrevotes')
        ->count();
        //->get();


    }
    public function getAllCentre(){
        return Centrevote::with('commune')
        ->get();
    }
    public function getByCommune($commune){
        return DB::table("centrevotes")
        ->where([["commune_id",$commune],["niveau",false]])
        ->orderBy("nom","asc")
        ->get();
}
public function getAllOnly(){
    return DB::table("centrevotes")->get();
}

public function updateNiveau($id){
    return DB::table("centrevotes")->where("id",$id)->update(["niveau"=>true]);
}

public function sumElecteurByCentre($id){
    return DB::table("centrevotes")
    ->join("lieuvotes","centrevotes.id","=","lieuvotes.centrevote_id")
    ->where("centrevotes.id",$id)
    ->sum("lieuvotes.nb");
}

public function getCentreTemoin($commune){
    return DB::table("centrevotes")
    ->join("lieuvotes","centrevotes.id","=","lieuvotes.centrevote_id")
    ->select("centrevotes.*")
    ->where([["centrevotes.commune_id",$commune],["lieuvotes.temoin",true]])
    ->get();
}

public function getByArrondissement($id){
    return DB::table("centrevotes")
    ->join("communes","centrevotes.commune_id","=","communes.id")
    ->select("centrevotes.*","communes.nom as commune")
    ->where("communes.arrondissement_id",$id)
    ->orderBy("communes.nom",'asc')
    ->get();
}

    public function getBureauByCentre($id)
    {
        return Centrevote::with(["lieuvotes","lieuvotes.bureaus","commune"])
        ->where("id",$id)
        ->first();
    }

    public function countByArrondissement($id){
        return DB::table("centrevotes")
        ->join("communes","centrevotes.commune_id","=","communes.id")
        ->select("centrevotes.*","communes.nom as commune")
        ->where("communes.arrondissement_id",$id)
        ->count();
    }
}
