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
                        <li class="breadcrumb-item active"><a href="{{ route('representant.index') }}" role="button" class="btn btn-primary">RETOUR</a></li>

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
                                        <label>Numéro CNI </label>
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
         url_app = '{{ config('app.url') }}';
         $("#commune_id").change(function () {
            var commune_id =  $("#commune_id").children("option:selected").val();
                var centrevote = "<option value=''>Veuillez selectionner</option>";
                $.ajax({
                    type:'GET',
                    url:url_app+'/centrevote/by/commune/'+commune_id,
                //   url:'http://vmi435145.contaboserver.net:9000/commune/by/commune/'+commune_id,
                 //  url:'http://127.0.0.1/gestionmateriel/public/commune/by/commune/'+commune_id,
                //  url:'http://127.0.0.1:8000/commune/by/commune/'+commune_id,
                    vdata:'_token = <?php echo csrf_token() ?>',
                    success:function(data) {

                        $.each(data,function(index,row){
                            //alert(row.nomd);
                            centrevote +="<option value="+row.id+">"+row.nom+"</option>";

                        });
                        $("#centrevote_id").empty();
                        $("#centrevote_id").append(centrevote);
                    }
                });
            });

            $("#centrevote_id").change(function () {
                var centrevote_id =  $("#centrevote_id").children("option:selected").val();
                    var lieuvote = "<option value=''>Veuillez selectionner</option>";
                    $.ajax({
                        type:'GET',
                        url:url_app+'/lieuvote/by/centrevote/'+centrevote_id,
                        data:'_token = <?php echo csrf_token() ?>',
                        success:function(data) {

                            $.each(data,function(index,row){
                              //  alert(row.id);
                                lieuvote +="<option value="+row.id+">"+row.nom+"</option>";

                            });
                            $("#lieuvote_id").empty();
                            $("#lieuvote_id").append(lieuvote);
                        }
                    });
                });
                $("#lieuvote_id").change(function () {
                var lieuvote_id =  $("#lieuvote_id").children("option:selected").val();
                    $.ajax({
                        type:'GET',
                        url:url_app+'/electeur/by/lieuvote/'+lieuvote_id,
                        data:'_token = <?php echo csrf_token() ?>',
                        success:function(data) {
                         //   alert(data)

                            $('#electeur').empty()
                           $('#electeur').append("<h4> Nombre Electeurs : "+data.nb+"</h4>")
                           $('#nb_electeur').val(data.nb)

                        }
                    });
                });

    </script>
@endsection