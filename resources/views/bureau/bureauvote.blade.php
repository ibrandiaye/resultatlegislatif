@extends('welcome')
@section('title', '| lieuvote')


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
        <div class="card-header  text-center">LISTE D'ENREGISTREMENT DES lieuvotes</div>
            <div class="card-body">
                
                <table  id="datatable-buttons" class="table table-bordered table-responsive-md table-striped text-center datatable-buttons">
                    <thead>
                        <tr>
                            <th>Commune</th>
                            <th>Centre de vote</th>
                            <th>Bureau</th>
                            <th>Electeurs</th>
                            <th>Etat</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($lieuvotes as $lieuvote)
                       
                            <tr>

                                <td>{{ $lieuvote->centrevote->commune->nom }}</td>
                                <td>{{ $lieuvote->centrevote->nom }}</td>
                                <td>{{ $lieuvote->nom }}</td>
                                <td>{{ $lieuvote->nb }}</td>
                                <td> 
                                    @if (count($lieuvote->bureaus)<3)
                                        <span class="badge badge-danger">Incompléte</span>
                                    @else
                                    <span class="badge badge-success">compléte</span>
                                    @endif
                                  </td>
                                <td>
                                    <a href="{{ route('doc.bureau', $lieuvote->id) }}" role="button" class="btn btn-primary"><i class="fas fa-eye"></i></a>

                                </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>



            </div>

    </div>
</div>





@endsection