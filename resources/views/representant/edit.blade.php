{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Modifier Région')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">

                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item active"><a class="btn btn-primary" href="{{ route('lieu.vote.by.centre.representant',$representant->lieuvote->centrevote_id) }}" style="color: white !important;">Terminer </a></li>

                        </ol>

                    </div>
                    <h4 class="page-title">Starter</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        {!! Form::model($representant, ['method'=>'PATCH','route'=>['representant.update', $representant->id],'enctype'=>'multipart/form-data']) !!}
            @csrf
             <div class="card ">
                        <div class="card-header text-center">FORMULAIRE DE MODIFICATION D'une representant</div>
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
                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="row">

                                <input  type="hidden" name="commune_id" value="{{ $representant->commune_id }}">
                                <input  type="hidden" name="lieuvote_id" value="{{ $representant->lieuvote_id }}">
                                <div class="col-lg-4">
                                    <div class="form-group ">
                                        <label>Numéro Electeur </label>
                                        <input type="text" name="nin" id="cni" class="form-control" value="{{ $representant->nin }}"  required>
                                        <span class="input-group-append">
                                            <button type="button" id="btncni" class="btn  btn-primary"><i class="fa fa-search"></i> Rechercher</button>
                                            </span>
                                    </div> 
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Nom </label>
                                        <input type="text" name="nom" id="nom"  value="{{ $representant->nom }}" class="form-control"  required>
                                    </div>
                                </div>
                               
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Profession </label>
                                        <input type="text" name="profession"  value="{{ $representant->profession }}" class="form-control"  >
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Liste </label>
                                        <select class="form-control" id="liste" name="liste" required>
                                            <option value="">Selectionner</option>
                                                <option value="AND LIGUEY SUNU REW" {{ $representant->liste == "AND LIGUEY SUNU REW" ? "selected" : "" }}>AND LIGUEY SUNU REW</option>
                                                <option value="SENEGAL KESE" {{ $representant->liste == "SENEGAL KESE" ? "selected" : "" }}>SENEGAL KESE</option>
                                                <option value="RV NAATANGE" {{ $representant->liste == "RV NAATANGE" ? "selected" : "" }}>RV NAATANGE</option>
                                                <option value="UNION DES GROUPES PATRIOTIQUES" {{ $representant->liste == "UNION DES GROUPES PATRIOTIQUES" ? "selected" : "" }}>UNION DES GROUPES PATRIOTIQUES</option>
                                                <option value="COALITION POLE ALTERNATIF KIRAAY AK NATANGUE 3EME VOIE" {{ $representant->liste == "COALITION POLE ALTERNATIF KIRAAY AK NATANGUE 3EME VOIE" ? "selected" : "" }}>COALITION POLE ALTERNATIF KIRAAY AK NATANGUE 3EME VOIE</option>
                                                <option value="COALITION XAAL YOON" {{ $representant->liste == "COALITION XAAL YOON" ? "selected" : "" }}>COALITION XAAL YOON</option>
                                                <option value="UNION CITOYENNE BUNT-BI" {{ $representant->liste == "UNION CITOYENNE BUNT-BI" ? "selected" : "" }}>UNION CITOYENNE BUNT-BI</option>
                                                <option value="JUBANTI SENEGAL" {{ $representant->liste == "JUBANTI SENEGAL" ? "selected" : "" }}>JUBANTI SENEGAL</option>
                                                <option value="AND CI KOOLUTE NGUIR SENEGAL (AKS)" {{ $representant->liste == "AND CI KOOLUTE NGUIR SENEGAL (AKS)" ? "selected" : "" }}>AND CI KOOLUTE NGUIR SENEGAL (AKS)</option>
                                                <option value="ALSAR" {{ $representant->liste == "ALSAR" ? "selected" : "" }}>ALSAR</option>
                                                <option value="COALITION NAFOORE/SENEGAL" {{ $representant->liste == "COALITION NAFOORE/SENEGAL" ? "selected" : "" }}>COALITION NAFOORE/SENEGAL</option>
                                                <option value="UNION NATIONALE POUR L’INTEGRATION, LE TRAVAIL ET L’EQUITE (U.N.I.T.E)" {{ $representant->liste == "UNION NATIONALE POUR L’INTEGRATION, LE TRAVAIL ET L’EQUITE (U.N.I.T.E)" ? "selected" : "" }}>UNION NATIONALE POUR L’INTEGRATION, LE TRAVAIL ET L’EQUITE (U.N.I.T.E)</option>
                                                <option value="SAMM SA GAFAKA-SAMM SA ELLEG / ACSIF" {{ $representant->liste == "SAMM SA GAFAKA-SAMM SA ELLEG / ACSIF" ? "selected" : "" }}>SAMM SA GAFAKA-SAMM SA ELLEG / ACSIF</option>
                                                <option value="COALITION WAREEF" {{ $representant->liste == "COALITION WAREEF" ? "selected" : "" }}>COALITION WAREEF</option>
                                                <option value="COALITION ACTIONS" {{ $representant->liste == "COALITION ACTIONS" ? "selected" : "" }}>COALITION ACTIONS</option>
                                                <option value="UNION NAATALL KAAW-GUI (U.N.K)" {{ $representant->liste == "UNION NAATALL KAAW-GUI (U.N.K)" ? "selected" : "" }}>UNION NAATALL KAAW-GUI (U.N.K)</option>
                                                <option value="COALITION « DUNDU »" {{ $representant->liste == "COALITION « DUNDU »" ? "selected" : "" }}>COALITION « DUNDU »</option>
                                                <option value="LA MARCHE DES TERRITOIRES ANDU-NAWLE" {{ $representant->liste == "LA MARCHE DES TERRITOIRES ANDU-NAWLE" ? "selected" : "" }}>LA MARCHE DES TERRITOIRES ANDU-NAWLE</option>
                                                <option value="LES NATIONALISTES JEL LINU MOOM" {{ $representant->liste == "LES NATIONALISTES JEL LINU MOOM" ? "selected" : "" }}>LES NATIONALISTES JEL LINU MOOM</option>
                                                <option value="COALITION MANKOO LIGGEEYAL SENEGAAL (MLS)" {{ $representant->liste == "COALITION MANKOO LIGGEEYAL SENEGAAL (MLS)" ? "selected" : "" }}>COALITION MANKOO LIGGEEYAL SENEGAAL (MLS)</option>
                                                <option value="COALITION DEKKAL TERANGA" {{ $representant->liste == "COALITION DEKKAL TERANGA" ? "selected" : "" }}>COALITION DEKKAL TERANGA</option>
                                                <option value="AND DOOLEL LIGUEY KAT YI" {{ $representant->liste == "AND DOOLEL LIGUEY KAT YI" ? "selected" : "" }}>AND DOOLEL LIGUEY KAT YI</option>
                                                <option value="PARTI ENSEMBLE POUR LE SENEGAL (PEPS)" {{ $representant->liste == "PARTI ENSEMBLE POUR LE SENEGAL (PEPS)" ? "selected" : "" }}>PARTI ENSEMBLE POUR LE SENEGAL (PEPS)</option>
                                                <option value="ALLIANCE SAMM SUNU SENEGAAL (A3S)" {{ $representant->liste == "ALLIANCE SAMM SUNU SENEGAAL (A3S)" ? "selected" : "" }}>ALLIANCE SAMM SUNU SENEGAAL (A3S)</option>
                                                <option value="COALITION AND BEESAL SENEGAL-ABS" {{ $representant->liste == "COALITION AND BEESAL SENEGAL-ABS" ? "selected" : "" }}>COALITION AND BEESAL SENEGAL-ABS</option>
                                                <option value="PARTI GARAP-ADS" {{ $representant->liste == "PARTI GARAP-ADS" ? "selected" : "" }}>PARTI GARAP-ADS</option>
                                                <option value="COALITION GOX YU BEES" {{ $representant->liste == "COALITION GOX YU BEES" ? "selected" : "" }}>COALITION GOX YU BEES</option>
                                                <option value="COALITION REPUBLICAINE/SAMM SUNU REW JOTALI KADDU ASKANWI" {{ $representant->liste == "COALITION REPUBLICAINE/SAMM SUNU REW JOTALI KADDU ASKANWI" ? "selected" : "" }}>COALITION REPUBLICAINE/SAMM SUNU REW JOTALI KADDU ASKANWI</option>
                                                <option value="COALITION « DEFAR SA GOKH »" {{ $representant->liste == "COALITION « DEFAR SA GOKH »" ? "selected" : "" }}>COALITION « DEFAR SA GOKH »</option>
                                                <option value="COALITION FEDERATION DU RENOUVEAU" {{ $representant->liste == "COALITION FEDERATION DU RENOUVEAU" ? "selected" : "" }}>COALITION FEDERATION DU RENOUVEAU</option>
                                                <option value="PARTI ALLIANCE JEF JEL" {{ $representant->liste == "PARTI ALLIANCE JEF JEL" ? "selected" : "" }}>PARTI ALLIANCE JEF JEL</option>
                                                <option value="PASTEF" {{ $representant->liste == "PASTEF" ? "selected" : "" }}>PASTEF</option>
                                                <option value="ENTITE ALLIANCE NATIONALE POUR LA PATRIE" {{ $representant->liste == "ENTITE ALLIANCE NATIONALE POUR LA PATRIE" ? "selected" : "" }}>ENTITE ALLIANCE NATIONALE POUR LA PATRIE</option>
                                                <option value="COALITION FARLU" {{ $representant->liste == "COALITION FARLU" ? "selected" : "" }}>COALITION FARLU</option>
                                                <option value="AND SUXALI PRODUCTION,TRANSPORT AK COMMMERCE /LAAP FAL JIKKO" {{ $representant->liste == "AND SUXALI PRODUCTION,TRANSPORT AK COMMMERCE /LAAP FAL JIKKO" ? "selected" : "" }}>AND SUXALI PRODUCTION,TRANSPORT AK COMMMERCE /LAAP FAL JIKKO</option>
                                                <option value="SECTEUR PRIVE" {{ $representant->liste == "SECTEUR PRIVE" ? "selected" : "" }}>SECTEUR PRIVE</option>
                                                <option value="COALITION DIAM AK NJARIN" {{ $representant->liste == "COALITION DIAM AK NJARIN" ? "selected" : "" }}>COALITION DIAM AK NJARIN</option>
                                                <option value="COALITION SAMM SA KAADU" {{ $representant->liste == "COALITION SAMM SA KAADU" ? "selected" : "" }}>COALITION SAMM SA KAADU</option>
                                                <option value="PARTI BES DU NAKK" {{ $representant->liste == "PARTI BES DU NAKK" ? "selected" : "" }}>PARTI BES DU NAKK</option>
                                                <option value="TAKKU WALLU SENEGAL (TWS)" {{ $representant->liste == "TAKKU WALLU SENEGAL (TWS)" ? "selected" : "" }}>TAKKU WALLU SENEGAL (TWS)</option>
                                                <option value="GRAND RASSEMBLEMENT DES ARTISANTS DU SENEGAL" {{ $representant->liste == "GRAND RASSEMBLEMENT DES ARTISANTS DU SENEGAL" ? "selected" : "" }}>GRAND RASSEMBLEMENT DES ARTISANTS DU SENEGAL</option>
                                                <option value="COALITION SOPI SENEGAL" {{ $representant->liste == "COALITION SOPI SENEGAL" ? "selected" : "" }}>COALITION SOPI SENEGAL</option>
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="sexe"  id="sexe">
                             </div>
                                <div>
                                    <center>
                                        <button type="submit" class="btn btn-success btn btn-lg "> MODIFIER</button>
                                    </center>
                                </div>


                            </div>
                        </div>
    {!! Form::close() !!}


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