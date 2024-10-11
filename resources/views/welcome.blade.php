<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Election 2024</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{asset('images/favicon.ico') }}">

        <link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/style.css') }}" rel="stylesheet" type="text/css">
        <script src="{{asset('js/jquery.min.js') }}"></script>
        <!-- DataTables -->
        <link href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        @yield("css")

    </head>


    <body class="fixed-left">

        <!-- Loader -->
       {{--   <div id="preloader"><div id="status"><div class="spinner"></div></div></div>  --}}

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <!--<a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Zoter</a>-->
                      {{--    <a href="index.html" class="logo">
                            <img src="{{ asset('images/logo-lg.png') }}" alt="" class="logo-large">
                        </a>  --}}
                    </div>
                </div>

                <div class="sidebar-inner niceScrollleft">

                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">
                                <li>
                                    <a href="{{ route('home') }}">
                                    <i class="mdi mdi-airplay"></i> NATIONAL
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-map-marker-multiple"></i><span>Taux de Participation </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('participation.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('participation.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-map-marker-multiple"></i><span>Resultat Bureau de vote Temoin </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('rtstemoin.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('rtstemoin.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span>Collect par Centre de vote </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('rtscentre.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('rtscentre.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span>Collect par Bureau de vote </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('rtslieu.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('rtslieu.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span>Collect par commune </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('rtscommune.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('rtscommune.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span>Collect par Departement </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('rtsdepartement.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('rtsdepartement.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="menu-title">
                                <li>
                                    <a href="{{ route('home') }}">
                                    <i class="mdi mdi-airplay"></i> DIASPORA
                                </a>
                            </li>

                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span>Collect par Centre de Vote</span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="{{ route('rtscentree.create') }}"> Ajouter</a></li>
                                        <li><a href="{{ route('rtscentree.index') }}">Lister</a></li>
                                    </ul>
                                </li>
                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span>Collect Par Bureau de Vote </span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="{{ route('rtslieue.create') }}"> Ajouter</a></li>
                                        <li><a href="{{ route('rtslieue.index') }}">Lister</a></li>
                                    </ul>
                                </li>
                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span>Collect Par Pays </span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="{{ route('rtspays.create') }}"> Ajouter</a></li>
                                        <li><a href="{{ route('rtspays.index') }}">Lister</a></li>
                                    </ul>
                                </li>

                            <li class="menu-title">Menu</li>
                                <li>
                                    <a href="{{ route('home') }}">
                                    <i class="mdi mdi-airplay"></i> Configuration
                                </a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span>Candidat </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('candidat.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('candidat.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-map-marker-multiple"></i><span>Region </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('region.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('region.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-map-marker-multiple"></i><span>Departement </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('departement.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('departement.index') }}"> Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-map-marker-multiple"></i><span>Arrondissement </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('arrondissement.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('arrondissement.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-map-marker-multiple"></i><span>Commune </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('commune.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('commune.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span>Collecteur </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('collecteur.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('collecteur.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-map-marker-multiple"></i><span>Juridiction </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('juridiction.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('juridiction.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-map-marker-multiple"></i><span>Pays </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('pays.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('pays.index') }}"> Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-map-marker-multiple"></i><span>Localite </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('localite.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('localite.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span>Centre de Vote National</span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('centrevote.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('centrevote.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span>Bureau de vote National</span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('lieuvote.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('lieuvote.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span>Centre de Vote Etrangers </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('centrevotee.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('centrevotee.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span>Bureau de vote Etrangers </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('lieuvotee.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('lieuvotee.index') }}">Lister</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span>Heure de collecte </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('heure.create') }}"> Ajouter</a></li>
                                    <li><a href="{{ route('heure.index') }}">Lister</a></li>
                                </ul>
                            </li>


                        </li>




                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom">

                            <ul class="list-inline float-right mb-0">
                                <!-- language-->

                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <img src="{{ asset('images/users/avatar-1.jpg') }}" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5>Bienvenue</h5>
                                        </div>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="mdi mdi-logout m-r-5 text-muted"></i>{{ __('Deconnexion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </div>
                                </li>

                            </ul>

                            <ul class="list-inline menu-left mb-0">
                                <li class="float-left">
                                    <button class="button-menu-mobile open-left waves-light waves-effect">
                                        <i class="mdi mdi-menu"></i>
                                    </button>
                                </li>
                            </ul>

                            <div class="clearfix"></div>

                        </nav>

                    </div>
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">

                           @yield("content")


                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                    © 2023 DIGI 221.
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="{{asset('js/popper.min.js') }}"></script>
        <script src="{{asset('js/bootstrap.min.js') }}"></script>
        <script src="{{asset('js/modernizr.min.js') }}"></script>
        <script src="{{asset('js/detect.js') }}"></script>
        <script src="{{asset('js/fastclick.js') }}"></script>
        <script src="{{asset('js/jquery.blockUI.js') }}"></script>
        <script src="{{asset('js/waves.js') }}"></script>
        <script src="{{asset('js/jquery.nicescroll.js') }}"></script>
        <!-- Required datatable js -->
        <script src="{{asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{asset('plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{asset('plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{asset('plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{asset('plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{asset('plugins/datatables/buttons.print.min.js') }}"></script>
        <script src="{{asset('plugins/datatables/buttons.colVis.min.js') }}"></script>
        <!-- Responsive examples -->
        <script src="{{asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

        <!-- Datatable init js -->
        <script src="{{asset('pages/datatables.init.js') }}"></script>
        @yield("script")

        <!-- App js -->
        <script src="{{asset('js/app.js') }}"></script>
        <script src="{{asset('plugins/parsleyjs/parsley.min.js') }}"></script>
        <script src="{{asset('plugins/parsleyjs/fr.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
                window.Parsley.setLocale("fr");
            });

        </script>


    </body>
</html>
