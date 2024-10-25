<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>DGE </title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        {{--<link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css"> --}}
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

    </head>
    <body style="background: white;">
        <style>
            .page-break{
                page-break-after: always;
            }
            td{
                font-size: 18px;
            }
                #sa-params{
                    display: none;
                }
                html{
                    background: white;
                }
                div
                {
                    text-align: center;
                    margin-top: 0px !important;
                    margin-bottom: 0px !important;
                }
                table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align:  center;
}
table{
    width: 100%;
}

        </style>

<div class="container">



    <!-- Begin page -->
    @foreach ($centrevote->lieuvotes as $lieuvote)
    @foreach ($lieuvote->representants as  $key =>  $representant)
        


<div class="row text-center" >

            <h4><strong><u>NOTIFICATION DE REPRESENTANT DE LISTE DE CANDIDAT DANS LES BUREAUX DE VOTE
                POUR LES ELECTIONS LEGISLATIVES ANTICIPEES DU 17 NOVEMBRE 2024</u></strong>
                 </h4>
</div>
<div class="row ">
    <div class="col-12">
       <p style="font-size: 23px;"> M.  <strong>  {{$representant->nom}} </strong> numéro carte électeur ou numéro récépissé <strong>{{$representant->nin}}</strong> profession 
        <strong>{{$representant->profession}}</strong> est  @if( $representant->sexe=="M") le  représentant @elseif($representant->sexe=="F") la représentante @else le (la) représentant (e) @endif  de la liste <strong>{{$representant->liste }}</strong> au bureau de vote 
        numéro <strong>{{ $lieuvote->nom}}</strong> du lieu de vote  <strong>{{ $centrevote->nom }}</strong> de la commune de   <strong>{{ $centrevote->commune->nom }}</strong>


    </p>

    </div>
</div>
<div class="row">
    <div class="col-2  text-left">
        <h6><u>CEDA        </u></h6>
    </div>
    <div class="col-8"></div>
    <div class="col-2  text-right">
        <h6><u>Le sous-préfet        </u></h6>
    </div>
</div>
@if($key > 0 && $key%2!=0)
<div class="page-break"></div>
@endif
@if( $key%2==0)
   
    <br><br><br><br><br><br><br><br>
----------------------------------------------------------------------------------------------------------------------------------------------
<br><br><br><br><br><br><br><br>
@endif
@endforeach
@endforeach

</div>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>


    </body>
</html>
