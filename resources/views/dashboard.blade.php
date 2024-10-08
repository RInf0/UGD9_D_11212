<?php
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Atma Library</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <style>
            .dropdown-menu{
                background: rgba(255, 255, 255, 0.8); /* Mengatur latar belakang transparan */
                border: 1px solid #ccc; /* Garis tepi */
                border-radius: 10px; /* Sudut membulat */
                padding: 15px;
            }
            .carousel-caption {
                position: absolute;
                top: 20%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: rgba(255, 255, 255, 0.5);
                border: 1px solid #ccc;
                border-radius: 10px;
                padding: 15px;
                height: 90px;
                text-align: center;
            }
            .text-black {
                color: black;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="text-center">
                <h4><b>Atma Library</b></h4>
                <h6>{{ date('Y-m-d') }}</h6>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul></ul>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('buku') }}">Buku Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('pinjamBuku') }}">Pinjam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kembalikan</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a>210711212</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-circle mb-3" style="width: 100px;" alt="Avatar" />
                                <h5 class="mb-2"><strong>{{ Auth::user()->username }}</strong></h5>
                                <p class="text-muted">{{ Auth::user()->email}}</p>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-user"></i> 
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{route('actionLogout') }}">
                                    <i class="fa fa-user"></i> 
                                    Logout
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        
        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            window.onload = function() {
                // Menghapus riwayat perambanan
                window.history.pushState({}, '', '/'); // Mengganti URL ke halaman login
            }
        </script>
    </body>
</html>