<?php

namespace App\Http\Controllers;

use App\Imports\CommuneImport;
use App\Imports\DepartementImport;
use App\Models\Commune;
use App\Repositories\CommuneRepository;
use App\Repositories\DepartementRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\SimpleExcel\SimpleExcelReader;

class CommuneController extends Controller
{
    protected $communeRepository;
    protected $departementRepository;

    public function __construct(CommuneRepository $communeRepository, DepartementRepository $departementRepository){
        $this->communeRepository =$communeRepository;
        $this->departementRepository = $departementRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communes = $this->communeRepository->getAllWithdepartement();
        return view('commune.index',compact('communes'));
    }

    public function allCommuneApi()
    {
        $communes = $this->communeRepository->getAllOnLy();
        return response()->json($communes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = $this->departementRepository->getAll();
        return view('commune.add',compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $communes = $this->communeRepository->store($request->all());
        return redirect('commune');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commune = $this->communeRepository->getById($id);
        return view('commune.show',compact('commune'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departements = $this->departementRepository->getAll();
        $commune = $this->communeRepository->getById($id);
        return view('commune.edit',compact('commune','departements'));
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

        $this->communeRepository->update($id, $request->all());
        return redirect('commune');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->communeRepository->destroy($id);
        return redirect('commune');
    }
    public function byDepartement($departement){
        $communes = $this->communeRepository->getByDepartement($departement);
        return response()->json($communes);
    }
    public function importExcel(Request $request)
    {
         /*  Excel::import(new CommuneImport,$request['file']);
       //  dd($data);
        return redirect()->back()->with('success', 'Données importées avec succès.'); */

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
      $departements = $this->departementRepository->getAll();
      foreach ($rows as $key => $commune) {
        foreach ($departements as $key1 => $departement) {
            if($commune["departement"]==$departement->nom){
                Commune::create([
                    "nom"=>$commune['commune'],
                    "departement_id"=>$departement->id/* ,
                    "latitude"=>$commune['latitude'],
        "longitude"=>$commune['longitude'] */
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

    public function getByDepartement($departement){
        $communes = $this->communeRepository->getByDepartement($departement);
        return response()->json($communes);
    }
 public function getCommuneByNom(){
        $communes = $this->communeRepository->getCommuneByNom($_GET['q']);
        return response()->json($communes);
    }

}
