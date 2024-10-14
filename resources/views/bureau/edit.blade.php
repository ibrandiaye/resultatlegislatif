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
                        <li class="breadcrumb-item active"><a href="{{ route('bureau.index') }}" role="button" class="btn btn-primary">RETOUR</a></li>

                        </ol>

                    </div>
                    <h4 class="page-title">Starter</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        {!! Form::model($bureau, ['method'=>'PATCH','route'=>['bureau.update', $bureau->id],'enctype'=>'multipart/form-data']) !!}
            @csrf
             <div class="card ">
                        <div class="card-header text-center">FORMULAIRE DE MODIFICATION D'une bureau</div>
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

                            <div class="row">
                                <div class="col">
                                    <label>Commune</label>
                                    <select class="form-control" id="commune_id" name="commune_id" required>
                                        @foreach ($communes as $commune)
                                        <option value="{{$commune->id}}">{{$commune->nom}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Centre de Vote</label>
                                    <select class="form-control" name="centrevote_id" required="">
                                        @foreach ($centrevotes as $centrevote)
                                        <option {{$bureau->centrevote_id == $centrevote->id ? 'selected' : ''}}
                                            value="{{$centrevote->id}}">{{$centrevote->nom}}</option>
                                            @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Lieu de vote</label>
                                    <select class="form-control" name="lieuvote_id" required="">
                                        @foreach ($lieuvotes as $lieuvote)
                                        <option {{$bureau->lieuvote_id == $lieuvote->id ? 'selected' : ''}}
                                            value="{{$lieuvote->id}}">{{$lieuvote->nom}}</option>
                                            @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Prenom </label>
                                        <input type="text" name="prenom"  value="{{ $bureau->prenom }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Nom </label>
                                        <input type="text" name="nom"  value="{{ $bureau->nom }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Numéro Tel </label>
                                        <input type="number" name="tel"  value="{{ $bureau->tel }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Fonction </label>
                                        <select class="form-control" id="fonction" name="fonction" required>
                                            <option value="">Selectionner</option>
                                            <option value="president" {{$bureau->fonction=='president' ? 'selected' : ''}}>Président</option>
                                            <option value="asceseur" {{$bureau->fonction=='asceseur' ? 'selected' : ''}}>Asceseur</option>
                                            <option value="secretaire" {{$bureau->fonction=='secretaire' ? 'selected' : ''}}>Secretaire </option>
                                              
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Profession </label>
                                    <input type="text" name="profession"  value="{{ $bureau->profession }}" class="form-control"  >
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
         $("#commune_id").change(function () {
            var commune_id =  $("#commune_id").children("option:selected").val();
                var centrevote = "<option value=''>Veuillez selectionner</option>";
                $.ajax({
                    type:'GET',
                    url:'/centrevote/by/commune/'+commune_id,
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
                        url:'/lieuvote/by/centrevote/'+centrevote_id,
                        vdata:'_token = <?php echo csrf_token() ?>',
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
                        url:'/electeur/by/lieuvote/'+lieuvote_id,
                        vdata:'_token = <?php echo csrf_token() ?>',
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