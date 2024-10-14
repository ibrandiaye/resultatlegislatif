<?php

namespace App\Http\Controllers;

use App\Repositories\ArrondissementRepository;
use App\Repositories\BureauRepository;
use App\Repositories\CentrevoteRepository;
use App\Repositories\CommuneRepository;
use App\Repositories\LieuvoteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BureauController extends Controller
{
    protected $bureauRepository;
    protected $lieuvoteRepository;
    protected $centrevoteRepository;
    protected $communeRepository;
    protected $arrondissementRepository;

    public function __construct(BureauRepository $bureauRepository, LieuvoteRepository $lieuvoteRepository,CentrevoteRepository $centrevoteRepository,
    CommuneRepository $communeRepository,ArrondissementRepository $arrondissementRepository){
        $this->bureauRepository =$bureauRepository;
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
        $bureaus = $this->bureauRepository->getByUser();
        return view('bureau.index',compact('bureaus'));
    }

    public function allBureauApi(){
        $bureaus = $this->bureauRepository->getAll();
        return response()->json($bureaus);
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
        return view('bureau.add',compact('lieuvotes','communes'));
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
            'prenom' => 'required',
            'fonction' => 'required|string',
            'tel' => 'required|string',
    
            //'g-recaptcha-response' => 'required|captcha',
            ], [
                'tel.unique' => 'Cette personne est déjà affecté.',
               
            ]);
        $bureaus = $this->bureauRepository->store($request->all());
        return redirect('bureau');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bureau = $this->bureauRepository->getById($id);
        return view('bureau.show',compact('bureau'));
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
        $bureau = $this->bureauRepository->getById($id);
        return view('bureau.edit',compact('bureau','lieuvotes'));
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
        $this->bureauRepository->update($id, $request->all());
        return redirect('bureau');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bureauRepository->destroy($id);
        return redirect('bureau');
    }

    public function docParBureau($id)
    {
        $bureaus = $this->bureauRepository->getByBureauVote($id);
        $arrondissement = $this->arrondissementRepository->getOneArrondissementWithdepartementAndRegion(Auth::user()->arrondissement_id);
        return view("bureau.doc",compact("bureaus","arrondissement"));
    }
    public function docParCentre($id)
    {
        $centrevote = $this->centrevoteRepository->getBureauByCentre($id);
        $arrondissement = $this->arrondissementRepository->getOneArrondissementWithdepartementAndRegion(Auth::user()->arrondissement_id);
        return view("bureau.doc-centre",compact("centrevote","arrondissement"));
    }

    /*public function docParCentre($id)
    {
        $bureaus = $this->bureauRepository->getByBureauVote($id);
        $arrondissement = $this->arrondissementRepository->getOneArrondissementWithdepartementAndRegion(Auth::user()->arrondissement_id);
        return view("bureau.doc",compact("bureaus","arrondissement"));
    }*/
}
