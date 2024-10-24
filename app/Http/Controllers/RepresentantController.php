<?php

namespace App\Http\Controllers;

use App\Repositories\ArrondissementRepository;
use App\Repositories\CentrevoteRepository;
use App\Repositories\CommuneRepository;
use App\Repositories\LieuvoteRepository;
use App\Repositories\RepresentantRepository;
use Illuminate\Http\Request;

class RepresentantController extends Controller
{
    protected $representantRepository;
    protected $lieuvoteRepository;
    protected $centrevoteRepository;
    protected $communeRepository;
    protected $arrondissementRepository;

    public function __construct(RepresentantRepository $representantRepository, LieuvoteRepository $lieuvoteRepository,CentrevoteRepository $centrevoteRepository,
    CommuneRepository $communeRepository,ArrondissementRepository $arrondissementRepository){
        $this->representantRepository =$representantRepository;
        $this->lieuvoteRepository = $lieuvoteRepository;
        $this->arrondissementRepository = $arrondissementRepository;
        $this->centrevoteRepository = $centrevoteRepository;
        $this->communeRepository = $communeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representants = $this->representantRepository->getByUser();
        return view('representant.index',compact('representants'));
    }

    public function searchTel(Request $request)
    {
        $representants = $this->representantRepository->getTel($request->tel);
        return view('representant.chercher',compact('representants'));
    }

    
    public function getByLieuVote($id)
    {
        $representants = $this->representantRepository->getByLieuVote($id);
        return view('representant.index',compact('representants'));
    }


    public function allrepresentantApi(){
        $representants = $this->representantRepository->getAll();
        return response()->json($representants);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lieuvotes = $this->lieuvoteRepository->getAll();
        $communes = $this->communeRepository->getByArrondissement(Auth::user()->arrondissement_id);
        return view('representant.add',compact('lieuvotes','communes'));
    }

    public function createByLieuVote($id,$commune)
    {
        $lieuvote_id = $id;
        $commune_id  = $commune;
        $commune = $this->communeRepository->getById($commune_id);
       /*  $representants = $this->representantRepository->getByLieuVote($id);
        if(count($representants) >=3)
        {
            return redirect()->back()->with("error","Vous avez déja atteind les trois membre");
        } */
        return view('representant.add_lieuvote',compact('lieuvote_id','commune_id','commune'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'nin' => 'required',
            'profession' => 'required|string',
            'liste' => 'required|string',
            'commune_id' => 'required|string',
            'lieuvote_id' => 'required|string',
           // 'tel' => 'required|unique:representants,tel|string|min:9|max:9',

            //'g-recaptcha-response' => 'required|captcha',
            ], [
                'nom.required' => 'Nom Obligatoire.',
                'nin.required' => 'Numéro Obligatoire.',
                'profession.required' => 'Profession Obligatoire.',
                'commune_id.required' => 'Commune Obligatoire.',
                'lieuvote_id.required' => 'Numéro Bureau Obligatoire.',

            ]);
         
        $representant = $this->representantRepository->store($request->all());
        
        return redirect()->back()->with("success","enregistrement avec succès");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $representant = $this->representantRepository->getById($id);
        return view('representant.show',compact('representant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lieuvotes = $this->lieuvoteRepository->getAll();
        $representant = $this->representantRepository->getById($id);
        return view('representant.edit',compact('representant','lieuvotes'));
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

        $this->representantRepository->update($id, $request->all());
       // return redirect('representant');
       return redirect()->back()->withInput()->with("success","modification avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->representantRepository->destroy($id);
        return redirect('representant');
    }

    public function docParRepresentant($id)
    {
        $representants = $this->representantRepository->getByrepresentantVote($id);
       
        return view("representant.doc",compact("representants"));
    }
    public function docParCentre($id)
    {
        $centrevote = $this->centrevoteRepository->getRepresentantByCentre($id);
        return view("representant.doc-centre",compact("centrevote"));
    }

    public function destroyByLieuVote($id)
    {
        $this->representantRepository->destroyByLieuVote($id);
        return redirect()->back();
    }

   

    public function chercherrepresentant()
    {
        $representants = [];
        return view("representant.chercher",compact("representants"));
    }
   
}
