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
            <h4 class="page-title">@if(  Auth::user()->role=='sous_prefet' && !empty(Auth::user()->arrondissement) ) {{  Auth::user()->arrondissement->nom}}  @elseif(Auth::user()->role=='prefet' && !empty(Auth::user()->departement))  {{  Auth::user()->departement->nom}} @endif</h4>
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
        <div class="card-header  text-center">LISTE PARTI ET COALITION</div>
            <div class="card-body">
              
                <table id="datatable-buttons" class="table table-bordered table-responsive-md table-striped text-center datatable-buttons">
                    <thead>
                        <tr>
                            <th>Liste</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>AND LIGUEY SUNU REW</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'AND LIGUEY SUNU REW') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>SENEGAL KESE</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'SENEGAL KESE') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>RV NAATANGE</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'RV NAATANGE') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>UNION DES GROUPES PATRIOTIQUES</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'UNION DES GROUPES PATRIOTIQUES') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION POLE ALTERNATIF KIRAAY AK NATANGUE 3EME VOIE</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION POLE ALTERNATIF KIRAAY AK NATANGUE 3EME VOIE') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION XAAL YOON</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION XAAL YOON') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>UNION CITOYENNE BUNT-BI</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'UNION CITOYENNE BUNT-BI') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>JUBANTI SENEGAL</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'JUBANTI SENEGAL') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>AND CI KOOLUTE NGUIR SENEGAL (AKS)</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'AND CI KOOLUTE NGUIR SENEGAL (AKS)') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>ALSAR</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'ALSAR') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION NAFOORE/SENEGAL</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION NAFOORE/SENEGAL') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>UNION NATIONALE POUR L’INTEGRATION, LE TRAVAIL ET L’EQUITE (U.N.I.T.E)</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'UNION NATIONALE POUR L’INTEGRATION, LE TRAVAIL ET L’EQUITE (U.N.I.T.E)') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>SAMM SA GAFAKA-SAMM SA ELLEG / ACSIF</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'SAMM SA GAFAKA-SAMM SA ELLEG / ACSIF') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION WAREEF</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION WAREEF') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION ACTIONS</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION ACTIONS') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>UNION NAATALL KAAW-GUI (U.N.K)</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'UNION NAATALL KAAW-GUI (U.N.K)') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION « DUNDU »</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION « DUNDU »') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>LA MARCHE DES TERRITOIRES ANDU-NAWLE</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'LA MARCHE DES TERRITOIRES ANDU-NAWLE') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>LES NATIONALISTES JEL LINU MOOM</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'LES NATIONALISTES JEL LINU MOOM') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION MANKOO LIGGEEYAL SENEGAAL (MLS)</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION MANKOO LIGGEEYAL SENEGAAL (MLS)') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION DEKKAL TERANGA</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION DEKKAL TERANGA') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>AND DOOLEL LIGUEY KAT YI</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'AND DOOLEL LIGUEY KAT YI') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>PARTI ENSEMBLE POUR LE SENEGAL (PEPS)</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'PARTI ENSEMBLE POUR LE SENEGAL (PEPS)') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>ALLIANCE SAMM SUNU SENEGAAL (A3S)</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'ALLIANCE SAMM SUNU SENEGAAL (A3S)') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION AND BEESAL SENEGAL-ABS</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION AND BEESAL SENEGAL-ABS') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>PARTI GARAP-ADS</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'PARTI GARAP-ADS') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION GOX YU BEES</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION GOX YU BEES') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION REPUBLICAINE/SAMM SUNU REW JOTALI KADDU ASKANWI</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION REPUBLICAINE/SAMM SUNU REW JOTALI KADDU ASKANWI') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION « DEFAR SA GOKH »</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION « DEFAR SA GOKH »') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION FEDERATION DU RENOUVEAU</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION FEDERATION DU RENOUVEAU') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>PARTI ALLIANCE JEF JEL</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'PARTI ALLIANCE JEF JEL') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>PASTEF</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'PASTEF') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>ENTITE ALLIANCE NATIONALE POUR LA PATRIE</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'ENTITE ALLIANCE NATIONALE POUR LA PATRIE') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION FARLU</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION FARLU') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>AND SUXALI PRODUCTION, TRANSPORT AK COMMMERCE /LAAP FAL JIKKO</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'AND SUXALI PRODUCTION, TRANSPORT AK COMMMERCE /LAAP FAL JIKKO') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>SECTEUR PRIVE</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'SECTEUR PRIVE') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION DIAM AK NJARIN</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION DIAM AK NJARIN') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION SAMM SA KAADU</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION SAMM SA KAADU') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>PARTI BES DU NAKK</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'PARTI BES DU NAKK') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>TAKKU WALLU SENEGAL (TWS)</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'TAKKU WALLU SENEGAL (TWS)') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>GRAND RASSEMBLEMENT DES ARTISANTS DU SENEGAL</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'GRAND RASSEMBLEMENT DES ARTISANTS DU SENEGAL') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>COALITION SOPI SENEGAL</td>
                            <td>
                                <a href="{{ route('liste.imprimer', 'COALITION SOPI SENEGAL') }}" role="button" class="btn btn-primary"><i class="fas fa-file"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                            </div>

    </div>
</div>

@endsection
