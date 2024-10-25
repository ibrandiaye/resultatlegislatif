{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Modifier Région')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">

                        <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>

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
                                            <option value="SAM SA KADDU"  {{ $representant->liste== "SAM SA KADDU" ? "selected" : ""}}>SAM SA KADDU</option>
                                            <option value="PASTEF" {{ $representant->liste== "PASTEF" ? "selected" : ""}}>PASTEF</option>
                                            <option value="Nouvelle Responsabilite" {{ $representant->liste== "Nouvelle Responsabilite" ? "selected" : ""}}>Nouvelle Responsabilite </option>

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