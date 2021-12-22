<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>PPDB</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark a sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="img/logo.png" width="230px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <form class="d-flex">
                    <button class="main-btn" type="submit"> <a href="{{ route('login') }}">Masuk</a></button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid top-banner">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="jarak">PPDB</h2>
                    <p class="jarak2">Penerimaan Peserta Didik baru</p>
                    <h3 class="jarak3">SMAN 3 TASIKMALAYA</h3>
                </div>
                <div class="col">
                    <div class="card jarakcard shadow-lg">
                        <div class="card-body colcard">
                            <h3 class="text-center">FORM PENDAFTARAN</h3>
                            @if (session()->has('loginError'))
                                <div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
                                    {{ session('loginError') }}
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form action="{{ route('register.store') }}" method="POST">
                                @csrf
                                <div class="mt-5 mb-2 ms-3 row">
                                    <label class="col-sm-4 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="mb-2 ms-3 row">
                                    <label class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="mb-2 ms-3 row">
                                    <label class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="mb-2 mt-4 row ">
                                    <label class="col-sm-8 col-form-label"></label>
                                    <div class="col-sm-4">
                                        <button class="main-btn2" type="submit">Daftar</button>
                                    </div>
                                </div>
                            </form>
                            <div class="mb-2 ms-3 row">
                                <label class="col-sm-7 col-form-label">Sudah Mendaftar? <a
                                        href="{{ route('login') }}">Masuk</a></label>
                                <div class="col-sm-5">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>



</body>

</html>
