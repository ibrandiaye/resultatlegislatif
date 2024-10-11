<?php

namespace App\Http\Controllers;

use App\Imports\CentrevoteImport;
use App\Models\Centrevote;
use App\Repositories\CentrevoteRepository;
use App\Repositories\CommuneRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\SimpleExcel\SimpleExcelReader;

class CentrevoteController extends Controller
{
    protected $centrevoteRepository;
    protected $communeRepository;

    public function __construct(CentrevoteRepository $centrevoteRepository, CommuneRepository $communeRepository){
        $this->centrevoteRepository =$centrevoteRepository;
        $this->communeRepository = $communeRepository;
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
}
