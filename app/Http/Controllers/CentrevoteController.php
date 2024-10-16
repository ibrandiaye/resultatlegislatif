<?php

namespace App\Http\Controllers;

use App\Imports\CentrevoteImport;
use App\Models\Centrevote;
use App\Repositories\ArrondissementRepository;
use App\Repositories\CentrevoteRepository;
use App\Repositories\CommuneRepository;
use App\Repositories\DepartementRepository;
use App\Repositories\LieuvoteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\SimpleExcel\SimpleExcelReader;

class CentrevoteController extends Controller
{
    protected $centrevoteRepository;
    protected $communeRepository;
    protected $arrondissementRepository;
    protected $departementRepository;
    protected $lieuvoteRepository;

    public function __construct(CentrevoteRepository $centrevoteRepository, CommuneRepository $communeRepository,
    ArrondissementRepository $arrondissementRepository, DepartementRepository $departementRepository,
   LieuvoteRepository $lieuvoteRepository){
        $this->centrevoteRepository         =   $centrevoteRepository;
        $this->communeRepository            = $communeRepository;
        $this->arrondissementRepository     = $arrondissementRepository;
        $this->departementRepository        = $departementRepository;
        $this->lieuvoteRepository           = $lieuvoteRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centrevotes = $this->centrevoteRepository->getAllCentre();
        return view('centrevote.index',compact('centrevotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $communes = $this->communeRepository->getAll();
        return view('centrevote.add',compact('communes'));
    }
    public function allCentrevoteApi(){
        $centrevotes = $this->centrevoteRepository->getAllOnly();
        return response()->json($centrevotes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $centrevotes = $this->centrevoteRepository->store($request->all());
        return redirect('centrevote');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $centrevote = $this->centrevoteRepository->getById($id);
        return view('centrevote.show',compact('centrevote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $communes = $this->communeRepository->getAll();
        $centrevote = $this->centrevoteRepository->getById($id);
        return view('centrevote.edit',compact('centrevote','communes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->centrevoteRepository->update($id, $request->all());
        return redirect('centrevote');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->centrevoteRepository->destroy($id);
        return redirect('centrevote');
    }
    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'file' => 'bail|required|file|mimes:xlsx'
        ]);

        // 2. On déplace le fichier uploadé vers le dossier "public" pour le lire
        $fichier = $request->file->move(public_path(), $request->file->hashName());

        // 3. $reader : L'instance Spatie\SimpleExcel\SimpleExcelReader
        $reader = SimpleExcelReader::create($fichier);

        // On récupère le contenu (les lignes) du fichier
        $rows = $reader->getRows();

        // $rows est une Illuminate\Support\LazyCollection

        // 4. On insère toutes les lignes dans la base de données
      //  $rows->toArray());
      $communes = $this->communeRepository->getAll();
      foreach ($rows as $key => $centrevote) {
        foreach ($communes as $key1 => $commune) {
            if($centrevote["commune"]==$commune->nom){
                Centrevote::create([
                    "nom"=>$centrevote['centrevote'],
                    "commune_id"=>$commune->id,

                ]);
            }
        }

    }
            // 5. On supprime le fichier uploadé
            $reader->close(); // On ferme le $reader
           // unlink($fichier);

            // 6. Retour vers le formulaire avec un message $msg
            return redirect()->back()->with('success', 'Données importées avec succès.');
    }
    public function getBycommune($commune){
        $centrevotes = $this->centrevoteRepository->getByCommune($commune);
        return response()->json($centrevotes);
    }

    public function sumElecteurByCentre($id){
        $electeurs = $this->centrevoteRepository->sumElecteurByCentre($id);
        return response()->json($electeurs);
    }

    public function getByArrondissement()
    {
       
        $centrevotes = $this->centrevoteRepository->getByArrondissement(Auth::user()->arrondissement_id);
        $communes    = $this->communeRepository->getByArrondissement(Auth::user()->arrondissement_id);
        $nbBureauVote  = $this->lieuvoteRepository->countByArrondissementt(Auth::user()->arrondissement_id);
        $nbCentreVote   = $this->centrevoteRepository->countByArrondissement(Auth::user()->arrondissement_id);
        $nbElecteur   = $this->lieuvoteRepository->sumByArrondissement(Auth::user()->arrondissement_id);
        return view("bureau.centrevote_arrondissement",compact("centrevotes","communes","nbBureauVote",
        "nbCentreVote","nbElecteur"));
    }
    public function getByDepartement()
    {
       // dd("ok");
        $communes = [];
        $commune_id = "";
        $arrondissement_id = "";
        $arrondissements = $this->arrondissementRepository->getByDepartement(Auth::user()->departement_id);
        $centrevotes = $this->centrevoteRepository->getByDepartement(Auth::user()->departement_id);
        $nbBureauVote  = $this->lieuvoteRepository->countByDepartement(Auth::user()->departement_id);
        $nbCentreVote   = $this->centrevoteRepository->countByDepartement(Auth::user()->departement_id);
        $nbElecteur   = $this->lieuvoteRepository->sommeByDepartement(Auth::user()->departement_id);
        return view("bureau.centrevote_departement",compact("centrevotes","arrondissements","nbBureauVote",
    "nbCentreVote","nbElecteur","communes","commune_id","arrondissement_id"));
    }
    public function getByRegion()
    {
         // dd("ok");
         $communes = [];
         $commune_id = "";
         $arrondissement_id = "";
         $arrondissements = [];
         $departement_id = "";
        $centrevotes = $this->centrevoteRepository->getByRegion(Auth::user()->region_id);
        $departements = $this->departementRepository->getByRegion(Auth::user()->region_id);
        $nbBureauVote  = $this->lieuvoteRepository->countByRegion(Auth::user()->region_id);
        $nbCentreVote   = $this->centrevoteRepository->countByRegion(Auth::user()->region_id);
        $nbElecteur   = $this->lieuvoteRepository->sumByRegion(Auth::user()->region_id);
        return view("bureau.centrevote_region",compact("centrevotes","departements","nbBureauVote",
        "nbCentreVote","nbElecteur","communes","commune_id","arrondissement_id","departement_id","arrondissements"));
    }

    public function centreByLocalite()
    {
        if(Auth::user()->role=="sous_prefet")
        {
            return   $this->getByArrondissement();
        }
        elseif(Auth::user()->role=="prefet")
        {
            return  $this->getByDepartement();
        }
        elseif(Auth::user()->role=="gouverneur")
        {
            return  $this->getByRegion();
        }
    }

    public function searhArrondissement(Request $request)
    {
        if($request->centrevote_id)
        {
            return redirect()->route("lieu.vote.by.centre",["id"=>$request->centrevote_id]);
        }
        elseif($request->commune_id)
        {
            $centrevotes = $this->centrevoteRepository->getByCommune($request->commune_id);
            $communes    = $this->communeRepository->getByArrondissement(Auth::user()->arrondissement_id);
            $nbBureauVote  = $this->lieuvoteRepository->countByCommune($request->commune_id);
            $nbCentreVote   = $this->centrevoteRepository->countByCommune($request->commune_id);
            $nbElecteur   = $this->lieuvoteRepository->sumByCommune($request->commune_id);
            return view("bureau.centrevote_arrondissement",compact("centrevotes","communes","nbBureauVote",
            "nbCentreVote","nbElecteur"));
        }

    }

    public function searhDepartement(Request $request)
    {
        $commune_id = $request->commune_id;
        $arrondissement_id = $request->arrondissement_id;
        if($request->centrevote_id)
        {
            return redirect()->route("lieu.vote.by.centre",["id"=>$request->centrevote_id]);
        }
        elseif($request->commune_id)
        {
            $arrondissements = $this->arrondissementRepository->getByDepartement(Auth::user()->departement_id);
            $centrevotes = $this->centrevoteRepository->getByCommune($request->commune_id);
            $communes    = $this->communeRepository->getByArrondissement($request->arrondissement_id);
            $nbBureauVote  = $this->lieuvoteRepository->countByCommune($request->commune_id);
            $nbCentreVote   = $this->centrevoteRepository->countByCommune($request->commune_id);
            $nbElecteur   = $this->lieuvoteRepository->sumByCommune($request->commune_id);
            return view("bureau.centrevote_departement",compact("centrevotes","communes","arrondissements","nbBureauVote",
            "nbCentreVote","nbElecteur","commune_id","arrondissement_id"));
        }
        else if($request->arrondissement_id)
        {
            $arrondissements = $this->arrondissementRepository->getByDepartement(Auth::user()->departement_id);
            $centrevotes = $this->centrevoteRepository->getByArrondissement($request->arrondissement_id);
            $communes    = $this->communeRepository->getByArrondissement($request->arrondissement_id);
            $nbBureauVote  = $this->lieuvoteRepository->countByArrondissementt($request->arrondissement_id);
            $nbCentreVote   = $this->centrevoteRepository->countByArrondissement($request->arrondissement_id);
            $nbElecteur   = $this->lieuvoteRepository->sumByArrondissement($request->arrondissement_id);
            return view("bureau.centrevote_departement",compact("centrevotes","communes","nbBureauVote","arrondissements",
            "nbCentreVote","nbElecteur","commune_id","arrondissement_id"));
        }


    }
    public function searhRegion(Request $request)
    {
        $commune_id = $request->commune_id;
        $arrondissement_id = $request->arrondissement_id;
        $departement_id = $request->departement_id;
        if($request->centrevote_id)
        {
            return redirect()->route("lieu.vote.by.centre",["id"=>$request->centrevote_id]);
        }
        elseif($request->commune_id)
        {
            $departements = $this->departementRepository->getByRegion(Auth::user()->region_id);
            $arrondissements = $this->arrondissementRepository->getByDepartement($request->departement_id);
            $centrevotes = $this->centrevoteRepository->getByCommune($request->commune_id);
            $communes    = $this->communeRepository->getByArrondissement($request->arrondissement_id);
            $nbBureauVote  = $this->lieuvoteRepository->countByCommune($request->commune_id);
            $nbCentreVote   = $this->centrevoteRepository->countByCommune($request->commune_id);
            $nbElecteur   = $this->lieuvoteRepository->sumByCommune($request->commune_id);
            return view("bureau.centrevote_region",compact("centrevotes","communes","arrondissements","nbBureauVote",
            "nbCentreVote","nbElecteur","commune_id","arrondissement_id","departement_id","departements"));
        }
        elseif($request->arrondissement_id)
        {
            $departements = $this->departementRepository->getByRegion(Auth::user()->region_id);
            $arrondissements = $this->arrondissementRepository->getByDepartement($request->departement_id);
            $centrevotes = $this->centrevoteRepository->getByArrondissement($request->arrondissement_id);
            $communes    = $this->communeRepository->getByArrondissement($request->arrondissement_id);
            $nbBureauVote  = $this->lieuvoteRepository->countByArrondissementt($request->arrondissement_id);
            $nbCentreVote   = $this->centrevoteRepository->countByArrondissement($request->arrondissement_id);
            $nbElecteur   = $this->lieuvoteRepository->sumByArrondissement($request->arrondissement_id);
            return view("bureau.centrevote_region",compact("centrevotes","communes","nbBureauVote","arrondissements",
            "nbCentreVote","nbElecteur","commune_id","arrondissement_id","departement_id","departements"));
        }
        elseif($request->departement_id)
        {
        
            $communes = [];
            $arrondissements = $this->arrondissementRepository->getByDepartement($request->departement_id);
            $departements = $this->departementRepository->getByRegion(Auth::user()->region_id);
            $centrevotes = $this->centrevoteRepository->getByDepartement($request->departement_id);
            $nbBureauVote  = $this->lieuvoteRepository->countByDepartement($request->departement_id);
            $nbCentreVote   = $this->centrevoteRepository->countByDepartement($request->departement_id);
            $nbElecteur   = $this->lieuvoteRepository->sumByDepartements($request->departement_id);
            return view("bureau.centrevote_region",compact("centrevotes","departements","nbBureauVote",
            "nbCentreVote","nbElecteur","departement_id","departements","commune_id","arrondissement_id","arrondissements","communes"));
        }


    }
    
}
