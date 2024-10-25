<?php
namespace App\Repositories;

use App\Models\Representant;
use App\Repositories\RessourceRepository;
use Auth;
use Illuminate\Support\Facades\DB;

class RepresentantRepository extends RessourceRepository{
    public function __construct(Representant $representant){
        $this->model = $representant;
    }

    public function getByUser()
    {
        return DB::table("representants")
        ->join("communes","representants.commune_id","=","communes.id")
        ->join("lieuvotes","representants.lieuvote_id","=","lieuvotes.id")
        ->join("centrevotes","lieuvotes.centrevote_id","=","centrevotes.id")
        ->select("representants.*","communes.nom as commune","lieuvotes.nom as lieuvote","centrevotes.nom as centrevote")
        ->where("communes.arrondissement_id",Auth::user()->arrondissement_id)
        ->get();
    }

    public function getTel($tel)
    {
        return DB::table("representants")
        ->join("communes","representants.commune_id","=","communes.id")
        ->join("lieuvotes","representants.lieuvote_id","=","lieuvotes.id")
        ->join("centrevotes","lieuvotes.centrevote_id","=","centrevotes.id")
        ->select("representants.*","communes.nom as commune","lieuvotes.nom as lieuvote","centrevotes.nom as centrevote")
        ->where("representants.tel",$tel)
        ->get();
    }

    public function getByLieuVote($id)
    {
        return DB::table("representants")
        ->join("communes","representants.commune_id","=","communes.id")
        ->join("lieuvotes","representants.lieuvote_id","=","lieuvotes.id")
        ->join("centrevotes","lieuvotes.centrevote_id","=","centrevotes.id")
        ->select("representants.*","communes.nom as commune","lieuvotes.nom as lieuvote","centrevotes.nom as centrevote")
        ->where("lieuvotes.id",$id)
        ->get();
    }
    public function getByLieuVoteOnly($id)
    {
        return DB::table("representants")
      
        ->where("lieuvote_id",$id)
        ->get();
    }
    public function getByRepresentantVote($id)
    {
        return DB::table("representants")
        ->join("communes","representants.commune_id","=","communes.id")
        ->join("lieuvotes","representants.lieuvote_id","=","lieuvotes.id")
        ->join("centrevotes","lieuvotes.centrevote_id","=","centrevotes.id")
        ->select("representants.*","communes.nom as commune","lieuvotes.nom as lieuvote","centrevotes.nom as centrevote","communes.arrondissement_id as arrondissement_id")
        ->where("representants.lieuvote_id",$id)
        ->get();
    }

    public function getByRepresentantListe($liste)
    {
        return DB::table("representants")
        ->join("communes","representants.commune_id","=","communes.id")
        ->join("lieuvotes","representants.lieuvote_id","=","lieuvotes.id")
        ->join("centrevotes","lieuvotes.centrevote_id","=","centrevotes.id")
        ->select("representants.*","communes.nom as commune","lieuvotes.nom as lieuvote","centrevotes.nom as centrevote","communes.arrondissement_id as arrondissement_id")
        ->where("representants.liste",$liste)
        ->get();
    }


    public function getByCentreVote($id)
    {
        return DB::table("representants")
        ->join("communes","representants.commune_id","=","communes.id")
        ->join("lieuvotes","representants.lieuvote_id","=","lieuvotes.id")
        ->join("centrevotes","lieuvotes.centrevote_id","=","centrevotes.id")
        ->select("representants.*","communes.nom as commune","lieuvotes.nom as lieuvote","centrevotes.nom as centrevote")
        ->where("lieuvotes.centrevote_id",$id)
        ->get();
    }

    public function destroyByLieuVote($id)
    {
       return DB::table("representants")->where("lieuvote_id",$id)->delete();
    }
}
