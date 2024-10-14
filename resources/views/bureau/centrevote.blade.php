@extends('welcome')
@section('title', '| centrevote')


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">


                                <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}" >ACCUEIL</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('centrevote.create') }}" >Liste des centrevotes</a></li>
                                </ol>
                            </div>
                            <h4 class="page-title">Starter</h4>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

<div class="col-12">
    <div class="card ">
        <div class="card-header  text-center">LISTE D'ENREGISTREMENT DES centrevotes</div>
            <div class="card-body">
              
                <table id="datatable" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom centrevote</th>
                            <th>Commune</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($centrevotes as $centrevote)
                        <tr>
                            <td>{{ $centrevote->id }}</td>
                            <td>{{ $centrevote->nom }}</td>
                            <td>{{ $centrevote->commune }}</td>
                            <td>
                                <a href="{{ route('lieu.vote.by.centre', $centrevote->id) }}" role="button" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                             {{--    {!! Form::open(['method' => 'DELETE', 'route'=>['centrevote.destroy', $centrevote->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                {!! Form::close() !!} --}}
                                <a href="{{ route('doc.centre', $centrevote->id) }}" role="button" class="btn btn-warning"><i class="fas fa-file"></i></a>

                              

                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>



            </div>

    </div>
</div>
@endsection
