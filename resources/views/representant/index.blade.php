@extends('welcome')
@section('title', '| representant')


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" >ACCUEIL</a></li>
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
        <div class="card-header  text-center">LISTE D'ENREGISTREMENT DES representants</div>
            <div class="card-body">
              
                <table id="datatable" class="table table-bordered datatable table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Liste </th>
                            <th>Nom </th>
                            <th>Numéro Carte /récepissé </th>
                            <th>Profession </th>
                            <th>Representant de vote </th>
                            <th>Centre de vote </th>
                            <th>Commune</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($representants as $representant)
                        <tr>
                            <td>{{ $representant->id }}</td>
                            <td>{{ $representant->liste }}</td>
                            <td>{{ $representant->nom }}</td>
                            <td>{{ $representant->nin }}</td>
                            <td>{{ $representant->profession }}</td>
                            <td>{{ $representant->lieuvote }}</td>
                            <td>{{ $representant->centrevote }}</td>
                            <td>{{ $representant->commune }}</td>
                            <td>
                                <a href="{{ route('representant.edit', $representant->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['representant.destroy', $representant->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                {!! Form::close() !!}



                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>



            </div>

    </div>
</div>

@endsection
