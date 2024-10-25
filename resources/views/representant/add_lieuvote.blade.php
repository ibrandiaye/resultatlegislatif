{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Enregister Département')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">


                        <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item active"><a class="btn btn-primary" href="{{ route('lieu.vote.by.centre.representant',$lieuvote->centrevote_id) }}" style="color: white !important;">Terminer </a></li>

                        </ol>
                    </div>
                    <h4 class="page-title">Starter</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <form action="{{ route('representant.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
             <div class="card ">
                        <div class="card-header text-center">FORMULAIRE D'ENREGISTREMENT D'UN REPRESENTANT</div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                               {{--  @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif --}}
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div id="error">

                            </div>
                                                            <div class="row">


                                    <input  type="hidden" name="commune_id" value="{{ $commune_id }}">
                                    <input  type="hidden" name="lieuvote_id" value="{{ $lieuvote_id }}">
                                  
                                    <div class="col-lg-4">
                                        
                                        <div class="form-group ">
                                            <label>Numéro Electeur </label>
                                            <input type="text" name="nin" id="cni" class="form-control"  required>
                                            <span class="input-group-append">
                                                <button type="button" id="btncni" class="btn  btn-primary"><i class="fa fa-search"></i> Rechercher</button>
                                                </span>
                                        </div> 
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nom </label>
                                            <input type="text" name="nom" id="nom"  value="{{ old('nom') }}" class="form-control"  required>
                                        </div>
                                    </div>
                                   
                                  {{--   <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Numéro Carte /récepissé </label>
                                            <input type="text" name="nin"  value="{{ old('nin') }}" class="form-control"  required>
                                        </div>
                                    </div> --}}
                                  
                                   <input type="hidden" name="sexe"  id="sexe">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Profession </label>
                                            <input type="text" name="profession"  value="{{ old('profession') }}" class="form-control"  >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Liste </label>
                                            <select class="form-control select2  custom-select" id="liste" name="liste" required>
                                                <option value="">Selectionner</option>
                                                    <option value="AND LIGUEY SUNU REW">AND LIGUEY SUNU REW</option>
                                                    <option value="SENEGAL KESE">SENEGAL KESE</option>
                                                    <option value="RV NAATANGE">RV NAATANGE</option>
                                                    <option value="UNION DES GROUPES PATRIOTIQUES">UNION DES GROUPES PATRIOTIQUES</option>
                                                    <option value="COALITION POLE ALTERNATIF KIRAAY AK NATANGUE 3EME VOIE">COALITION POLE ALTERNATIF KIRAAY AK NATANGUE 3EME VOIE</option>
                                                    <option value="COALITION XAAL YOON">COALITION XAAL YOON</option>
                                                    <option value="UNION CITOYENNE BUNT-BI">UNION CITOYENNE BUNT-BI</option>
                                                    <option value="JUBANTI SENEGAL">JUBANTI SENEGAL</option>
                                                    <option value="AND CI KOOLUTE NGUIR SENEGAL (AKS)">AND CI KOOLUTE NGUIR SENEGAL (AKS)</option>
                                                    <option value="ALSAR">ALSAR</option>
                                                    <option value="COALITION NAFOORE/SENEGAL">COALITION NAFOORE/SENEGAL</option>
                                                    <option value="UNION NATIONALE POUR L’INTEGRATION, LE TRAVAIL ET L’EQUITE (U.N.I.T.E)">UNION NATIONALE POUR L’INTEGRATION, LE TRAVAIL ET L’EQUITE (U.N.I.T.E)</option>
                                                    <option value="SAMM SA GAFAKA-SAMM SA ELLEG / ACSIF">SAMM SA GAFAKA-SAMM SA ELLEG / ACSIF</option>
                                                    <option value="COALITION WAREEF">COALITION WAREEF</option>
                                                    <option value="COALITION ACTIONS">COALITION ACTIONS</option>
                                                    <option value="UNION NAATALL KAAW-GUI (U.N.K)">UNION NAATALL KAAW-GUI (U.N.K)</option>
                                                    <option value="COALITION « DUNDU »">COALITION « DUNDU »</option>
                                                    <option value="LA MARCHE DES TERRITOIRES ANDU-NAWLE">LA MARCHE DES TERRITOIRES ANDU-NAWLE</option>
                                                    <option value="LES NATIONALISTES JEL LINU MOOM">LES NATIONALISTES JEL LINU MOOM</option>
                                                    <option value="COALITION MANKOO LIGGEEYAL SENEGAAL (MLS)">COALITION MANKOO LIGGEEYAL SENEGAAL (MLS)</option>
                                                    <option value="COALITION DEKKAL TERANGA">COALITION DEKKAL TERANGA</option>
                                                    <option value="AND DOOLEL LIGUEY KAT YI">AND DOOLEL LIGUEY KAT YI</option>
                                                    <option value="PARTI ENSEMBLE POUR LE SENEGAL (PEPS)">PARTI ENSEMBLE POUR LE SENEGAL (PEPS)</option>
                                                    <option value="ALLIANCE SAMM SUNU SENEGAAL (A3S)">ALLIANCE SAMM SUNU SENEGAAL (A3S)</option>
                                                    <option value="COALITION AND BEESAL SENEGAL-ABS">COALITION AND BEESAL SENEGAL-ABS</option>
                                                    <option value="PARTI GARAP-ADS">PARTI GARAP-ADS</option>
                                                    <option value="COALITION GOX YU BEES">COALITION GOX YU BEES</option>
                                                    <option value="COALITION REPUBLICAINE/SAMM SUNU REW JOTALI KADDU ASKANWI">COALITION REPUBLICAINE/SAMM SUNU REW JOTALI KADDU ASKANWI</option>
                                                    <option value="COALITION « DEFAR SA GOKH »">COALITION « DEFAR SA GOKH »</option>
                                                    <option value="COALITION FEDERATION DU RENOUVEAU">COALITION FEDERATION DU RENOUVEAU</option>
                                                    <option value="PARTI ALLIANCE JEF JEL">PARTI ALLIANCE JEF JEL</option>
                                                    <option value="PASTEF">PASTEF</option>
                                                    <option value="ENTITE ALLIANCE NATIONALE POUR LA PATRIE">ENTITE ALLIANCE NATIONALE POUR LA PATRIE</option>
                                                    <option value="COALITION FARLU">COALITION FARLU</option>
                                                    <option value="AND SUXALI PRODUCTION,TRANSPORT AK COMMMERCE /LAAP FAL JIKKO">AND SUXALI PRODUCTION,TRANSPORT AK COMMMERCE /LAAP FAL JIKKO</option>
                                                    <option value="SECTEUR PRIVE">SECTEUR PRIVE</option>
                                                    <option value="COALITION DIAM AK NJARIN">COALITION DIAM AK NJARIN</option>
                                                    <option value="COALITION SAMM SA KAADU">COALITION SAMM SA KAADU</option>
                                                    <option value="PARTI BES DU NAKK">PARTI BES DU NAKK</option>
                                                    <option value="TAKKU WALLU SENEGAL (TWS)">TAKKU WALLU SENEGAL (TWS)</option>
                                                    <option value="GRAND RASSEMBLEMENT DES ARTISANTS DU SENEGAL">GRAND RASSEMBLEMENT DES ARTISANTS DU SENEGAL</option>
                                                    <option value="COALITION SOPI SENEGAL">COALITION SOPI SENEGAL</option>
                                                
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <input type="hidden" id="nb_electeur" name="nb_electeur">
                                <div>
                                    <center>
                                        <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                                    </center>
                                </div>
                            </div>

                            </div>

            </form>



@endsection

@section('script')
    <script>
 url_api = '{{ config('app.api_url') }}';
 departement = '{{$commune->departement->nom}}';
 console.log(departement);
        $("#btncni").click(function () 
        {
            var cni = $("#cni").val();
            $.blockUI({ message: "<p>Patienter</p>" }); 
                $.ajax({
                type:'GET',
                // url:'http://127.0.0.1:7777/api/cartes/get/by/nin?nin='+cni,
                url: url_api+'cartes/get/by/numelec?numelec='+cni,
          
                    data:'_token = <?php echo csrf_token() ?>',
                    success:function(data) {
                        console.log(data,data.length);
                        if(data.length >=1)
                        {
                            console.log(data[0].ELEC_DATE_NAISSANCE)
                            $("#prenom").val(data[0].ELEC_PRENOM)
                            $("#nom").val(data[0].ELEC_PRENOM +" "+data[0].ELEC_NOM)
                            $("#sexe").val(data[0].ELEC_SEXE)
                            sexeSaisi = data[0].ELEC_SEXE;
                            console.log("sexe saisi",sexeSaisi)
                           // $("#datenaiss").val(convertirDate(data[0].ELEC_DATE_NAISSANCE))
                            $("#numelecteur").val(data[0].ELEC_NUM_ELECTEUR)
                            $("#lieunaiss").val(data[0].ELEC_LIEU_NAISSANCE)
                            $("#commune").val(data[0].COMMUNE);
                            if(departement!=data[0].DEPARTEMENT)
                            {
                                $("#error").append(" <div  class='alert alert-danger'> Cette Personne n'est pas dans le departement.<br> Son departement est :"+data[0].DEPARTEMENT+"</div>");

                            }
                          /*  const givenDate = new Date(convertirDate( data[0].ELEC_DATE_NAISSANCE));
                            const today = new Date();
                            // Calcul de la différence en millisecondes
                            const differenceInMilliseconds = today.getTime() - givenDate.getTime();
                            const differenceInYears = differenceInMilliseconds / (1000 * 60 * 60 * 24 * 365.25);
                            console.log(differenceInYears)
                            if(differenceInYears< 25)
                            {
                                $("#error").append(" <div  class='alert alert-danger'> age minimun non ateint. age :"+parseInt(differenceInYears)+" ans</div>");
                            }
                            $("#present").val(1);
                            $("#validation_modal").append("Voulez-vous enregistrer  "+data[0].ELEC_PRENOM+" "+data[0].ELEC_NOM+"  "+data[0].NIN+"?");
*/
                        }
                        else
                        {
                           // $("#validation_modal").empty();
                           // $("#present").val(0);
                            //alert("CNI non trouve");
                            $("#error").append(" <div  class='alert alert-danger'> Personne non identifier</div>");
                        }
                        setTimeout($.unblockUI, 1); 
                    },
                    error:function(){
                        setTimeout($.unblockUI, 1); 
                    }
                });
        });
    </script>
@endsection