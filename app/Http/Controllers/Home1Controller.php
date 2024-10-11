<?php

namespace App\Http\Controllers;

use App\Repositories\CandidatRepository;
use App\Repositories\CarteRepository;
use App\Repositories\CentrevoteeRepository;
use App\Repositories\CentrevoteRepository;
use App\Repositories\LieuvoteeRepository;
use App\Repositories\LieuvoteRepository;
use App\Repositories\ParticipationRepository;
use App\Repositories\PaysRepository;
use App\Repositories\RtscentreeRepository;
use App\Repositories\RtscentreRepository;
use App\Repositories\RtsdepartementRepository;
use App\Repositories\RtslieueRepository;
use App\Repositories\RtslieuRepository;
use App\Repositories\RtspaysRepository;
use App\Repositories\RtstemoinRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $centrevoteRepository;
    protected $rtscentreRepository;
    protected $rtslieuRepository;
    protected $lieuvoteRepository;
    protected $candidatRepository;
    protected $centrevoteeRepository;
    protected $rtscentreeRepository;
    protected $rtslieueRepository;
    protected $lieuvoteeRepository;
    protected $participationRepository;
    private $rtsPayrrepository;
    private $paysRepository;
    private $rtsTemoinRepository;
    private $rtsDepartementRepository;
    public function __construct(CentrevoteRepository $centrevoteRepository,
    RtscentreRepository $rtscentreRepository, RtslieuRepository $rtslieuRepository,
    LieuvoteRepository $lieuvoteRepository,CandidatRepository $candidatRepository,
    CentrevoteeRepository $centrevoteeRepository,RtscentreeRepository $rtscentreeRepository, 
RtslieueRepository $rtslieueRepository,LieuvoteeRepository $lieuvoteeRepository,ParticipationRepository $participationRepository,
RtstemoinRepository $rtstemoinRepository,RtspaysRepository $rtspaysRepository,PaysRepository $paysRepository
,RtsdepartementRepository $rtsdepartementRepository){
        $this->centrevoteRepository = $centrevoteRepository;
        $this->rtscentreRepository = $rtscentreRepository;
        $this->rtslieuRepository = $rtslieuRepository;
        $this->lieuvoteRepository = $lieuvoteRepository;
        $this->candidatRepository = $candidatRepository;

        $this->centrevoteeRepository = $centrevoteeRepository;
        $this->rtscentreeRepository = $rtscentreeRepository;
        $this->rtslieueRepository = $rtslieueRepository;
        $this->lieuvoteeRepository = $lieuvoteeRepository;
        $this->participationRepository = $participationRepository;
        $this->rtsTemoinRepository = $rtstemoinRepository;
        $this->rtsDepartementRepository = $rtsdepartementRepository;
        $this->rtsPayrrepository = $rtspaysRepository;

    }
    public function index(){
        $nbCentrevotes = $this->lieuvoteRepository->nbLieuVote();
        $nbRtsCentre = $this->lieuvoteRepository->nbLieuVoteByEtat(true);
       // dd($nbCentrevotes);
       $tauxDepouillement = round(($nbRtsCentre/$nbCentrevotes)*100,2);
       $electeurs = $this->lieuvoteRepository->nbElecteurs();
       $votants = $this->rtscentreRepository->nbVotants();
       $votantDiaspores = $this->rtscentreeRepository->nbVotants();
      // dd($votantDiaspores);    
       $tauxDepouillementElecteurs = round(($votants/$electeurs)*100,2);

       $rtsParCandidats = $this->rtscentreRepository->rtsByCandidat();
       $rtsParCandidatDiasporas = $this->rtscentreeRepository->rtsByCandidat();
      /*   $rtsNational=[];

       foreach ($rtsParCandidats as $key => $value) {
        
       } */
      $candidats = $this->candidatRepository->getAll();

      $electeursDiaspora = $this->lieuvoteeRepository->nbElecteurs();
      $nbureauDiaspora = $this->lieuvoteeRepository->nbLieuVotee();
      $nCentreVote = $this->centrevoteeRepository->nbCentrevotee();

      //Taux de particippation

      $tauxDeParticipations = $this->participationRepository->getParticipationGroupByHeure();
      $nbElecteursTemoin = $this->lieuvoteRepository->nbElecteursTemoin();
      $rtsTemoins = $this->rtsTemoinRepository->rtsByCandidat();
      $nbVotantTemoin = $this->rtsTemoinRepository->nbVotants();
      //dd($rtsTemoins);
       return view("dashboardr",compact("nbCentrevotes","nbRtsCentre","electeurs",
    "tauxDepouillement","votants","tauxDepouillementElecteurs","rtsParCandidats",
"nbureauDiaspora","electeursDiaspora","nCentreVote","tauxDeParticipations","nbElecteursTemoin",'rtsTemoins','nbVotantTemoin'));
    }
    public function carteByDepartement($id,$nom){

    }
    public function resultat(){

        $votants = $this->rtscentreRepository->nbVotants();

       $rtsParCandidats = $this->rtscentreRepository->rtsByCandidat();

       return view("dasboard",compact("rtsParCandidats","votants"));
    }
    public function apiDashbord(){
            $votants = $this->rtsDepartementRepository->nbVotants();
            $nbVotantDiaspora = $this->rtsPayrrepository->nbVotants();
            $electeurs = $this->lieuvoteRepository->nbElecteurs();
            $electeursDiaspora = $this->lieuvoteeRepository->nbElecteurs();
            $nbureauDiaspora = $this->lieuvoteeRepository->nbLieuVotee();
            $nCentreVoteDiaspora = $this->centrevoteeRepository->nbCentrevotee();
            $nbureauVote = $this->lieuvoteRepository->nbLieuVote();
            $nCentreVote = $this->centrevoteRepository->nbCentrevote();
            $data = array(
                "nbVotantNational"=>$votants,
                "nbVotantDiaspora"=>$nbVotantDiaspora,
                "electeursNational"=>$electeurs,
                "electeursDiaspora"=>$electeursDiaspora,
    
                "nbureauVoteDiaspora"=>$nbureauDiaspora,
                "nbCentreVoteDiaspora"=>$nCentreVoteDiaspora,
                "nbureauVoteNational"=>$nbureauVote,
                "nbCentreVote"=>$nCentreVote,
            );
        return response()->json($data);
    }
}
