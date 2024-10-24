<?php
namespace App\Repositories;

use App\Models\Representant;
use App\Repositories\RessourceRepository;
use Auth;
use Illuminate\Support\Facades\DB;

class RepresentantRepository extends RessourceRepository{
    public function __construct(Representant $Representant){
        $this->model = $Representant;
    }

    public function getByUser()
    {
        return DB::table("Representants")
        ->join("communes","Representants.commune_id","=","communes.id")
        ->join("lieuvotes","Representants.lieuvote_id","=","lieuvotes.id")
        ->join("centrevotes","lieuvotes.centrevote_id","=","centrevotes.id")
        ->select("Representants.*","communes.nom as commune","lieuvotes.nom as lieuvote","centrevotes.nom as centrevote")
        ->where("communes.arrondissement_id",Auth::user()->arrondissement_id)
        ->get();
    }

    public function getTel($tel)
    {
        return DB::table("Representants")
        ->join("communes","Representants.commune_id","=","communes.id")
        ->join("lieuvotes","Representants.lieuvote_id","=","lieuvotes.id")
        ->join("centrevotes","lieuvotes.centrevote_id","=","centrevotes.id")
        ->select("Representants.*","communes.nom as commune","lieuvotes.nom as lieuvote","centrevotes.nom as centrevote")
        ->where("Representants.tel",$tel)
        ->get();
    }

    public function getByLieuVote($id)
    {
        return DB::table("Representants")
        ->join("communes","Representants.commune_id","=","communes.id")
        ->join("lieuvotes","Representants.lieuvote_id","=","lieuvotes.id")
        ->join("centrevotes","lieuvotes.centrevote_id","=","centrevotes.id")
        ->select("Representants.*","communes.nom as commune","lieuvotes.nom as lieuvote","centrevotes.nom as centrevote")
        ->where("lieuvotes.id",$id)
        ->get();
    }
    public function getByLieuVoteOnly($id)
    {
        return DB::table("Representants")
      
        ->where("lieuvote_id",$id)
        ->get();
    }
    public function getByRepresentantVote($id)
    {
        return DB::table("Representants")
        ->join("communes","Representants.commune_id","=","communes.id")
        ->join("lieuvotes","Representants.lieuvote_id","=","lieuvotes.id")
        ->join("centrevotes","lieuvotes.centrevote_id","=","centrevotes.id")
        ->select("Representants.*","communes.nom as commune","lieuvotes.nom as lieuvote","centrevotes.nom as centrevote","communes.arrondissement_id as arrondissement_id")
        ->where("Representants.lieuvote_id",$id)
        ->get();
    }

    public function getByCentreVote($id)
    {
        return DB::table("Representants")
        ->join("communes","Representants.commune_id","=","communes.id")
        ->join("lieuvotes","Representants.lieuvote_id","=","lieuvotes.id")
        ->join("centrevotes","lieuvotes.centrevote_id","=","centrevotes.id")
        ->select("Representants.*","communes.nom as commune","lieuvotes.nom as lieuvote","centrevotes.nom as centrevote")
        ->where("lieuvotes.centrevote_id",$id)
        ->get();
    }

    public function destroyByLieuVote($id)
    {
       return DB::table("Representants")->where("lieuvote_id",$id)->delete();
    }
}
