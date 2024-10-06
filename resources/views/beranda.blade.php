<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    {{-- <link rel="stylesheet" href="css/hamburger.css">
    <link rel="stylesheet" href="css/navbarberanda.css"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/navbarberanda.css">
    <link rel="stylesheet" href="css/home.css">
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    <nav class="navbar navbar-expand-lg py-3 bg-dark"
        style="background-color: #414e64; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/Ruter.png" alt="logo" style="width: auto; height: 65px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navmenu"
                aria-controls="navmenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> <!-- Hamburger icon -->
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('beranda') ? 'active' : '' }}"
                            href="{{ route('beranda') }}#berita">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('login') ? 'active' : '' }}"
                            href="{{ route('login') }}">Login</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <section id="home" class="hero d-flex align-items-center text-center"
        style="background-image: url('img/backgroundheader.jpg'); background-size: cover; background-position: center; height: 100vh;">
        <div class="container text-white">
            <h1 class="display-3 mb-4 fw-bold">Selamat Datang di RT 19 Mendalo Darat</h1>
            <p class="lead mb-5">Layanan surat online untuk memudahkan warga dalam mengurus administrasi</p>
            <a href="#services" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">Ajukan Surat Sekarang</a>
        </div>
    </section>

    <section id="services" class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Layanan Kami</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 text-center p-4">
                        <div class="card-body">
                            <i class="fas fa-file-alt feature-icon mb-4"></i>
                            <h5 class="card-title mb-3">Surat Pengantar</h5>
                            <p class="card-text mb-4">Ajukan surat pengantar untuk berbagai keperluan administratif
                                dengan cepat dan mudah.</p>
                            <button class="btn btn-outline-primary rounded-pill px-4"
                                onclick="window.location.href='{{ route('pengajuan') }}'">Ajukan</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 text-center p-4">
                        <div class="card-body">
                            <i class="fas fa-house-user feature-icon mb-4"></i>
                            <h5 class="card-title mb-3">Surat Domisili</h5>
                            <p class="card-text mb-4">Dapatkan surat keterangan domisili secara online tanpa perlu antri
                                di kantor RT.</p>
                            <button class="btn btn-outline-primary rounded-pill px-4"
                                onclick="window.location.href='{{ route('pengajuan') }}'">Ajukan</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 text-center p-4">
                        <div class="card-body">
                            <i class="fas fa-clipboard-list feature-icon mb-4"></i>
                            <h5 class="card-title mb-3">Surat Keterangan</h5>
                            <p class="card-text mb-4">Urus berbagai jenis surat keterangan sesuai kebutuhan Anda dengan
                                sistem yang efisien.</p>
                            <button class="btn btn-outline-primary rounded-pill px-4"
                                onclick="window.location.href='{{ route('pengajuan') }}'">Ajukan</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="section-title">Tentang RT 19 Mendalo Darat</h2>
                    <p class="lead mb-4">RT 19 Mendalo Darat adalah rukun tetangga yang berkomitmen untuk memberikan
                        pelayanan terbaik bagi warganya.</p>
                    <p class="mb-4">Kami menghadirkan inovasi dalam pelayanan administrasi dengan sistem online yang
                        efisien dan mudah diakses. Dengan semangat gotong royong dan teknologi, kami berupaya
                        menciptakan lingkungan yang harmonis dan modern bagi seluruh warga.</p>

                </div>
                <div class="col-lg-6">
                    <img src="img/bawahome.jpg" alt="RT 19 Mendalo Darat" class="img-fluid rounded-3 shadow "
                        style="height: auto; width:100vh;">
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title">Pertanyaan Umum</h2>
            <div class="accordion" id="faqAccordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#faqOne"
                                aria-expanded="true" aria-controls="faqOne">
                                Bagaimana cara mengajukan surat online?
                                <i class="fas fa-chevron-down float-right"></i>
                            </button>
                        </h5>
                    </div>
                    <div id="faqOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#faqAccordion">
                        <div class="card-body">
                            Untuk mengajukan surat online, Anda cukup memilih jenis surat yang diinginkan pada halaman
                            Layanan, lalu ikuti petunjuk yang diberikan untuk melengkapi formulir pengajuan.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#faqTwo"
                                aria-expanded="false" aria-controls="faqTwo">
                                Berapa lama proses penerbitan surat?
                            </button>
                        </h5>
                    </div>
                    <div id="faqTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                        <div class="card-body">
                            Proses penerbitan surat biasanya memakan waktu 1-3 hari kerja, tergantung pada jenis surat
                            dan kelengkapan dokumen yang Anda ajukan.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#faqThree"
                                aria-expanded="false" aria-controls="faqThree">
                                Apakah saya perlu datang ke kantor RT untuk mengambil surat?
                            </button>
                        </h5>
                    </div>
                    <div id="faqThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                        <div class="card-body">
                            Tidak, Anda tidak perlu datang ke kantor RT. Surat yang telah selesai diproses akan
                            dikirimkan ke email Anda dalam bentuk dokumen digital yang sah.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Hubungi Kami</h2>
            <div class="row justify-content-center">
                
                
                <div class="col-lg-6">
                    <div class="p-4 bg-white rounded-3 shadow h-100">
                        <h5 class="mb-4">Informasi Kontak</h5>
                        <p class="mb-3"><i class="fas fa-map-marker-alt me-2 text-primary"></i> Jl. Mendalo Darat
                            No. 19, Jambi</p>
                        <p class="mb-3"><i class="fas fa-phone me-2 text-primary"></i> (0741) 123456</p>
                        <p class="mb-4"><i class="fas fa-envelope me-2 text-primary"></i> info@rt19mendalodarat.com
                        </p>
                        <h5 class="mb-3">Ikuti Kami</h5>
                        <div>
                            <a href="#" class="btn btn-outline-primary me-2"><i
                                    class="fab fa-facebook"></i></a>
                            <a href="#" class="btn btn-outline-primary me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-outline-primary"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <p id="berita"></p>



    <x-footer></x-footer>
    {{-- script statistik --}}
    <script>
        $(document).ready(function() {
            $('.animated-number').each(function() {
                var $this = $(this);
                // Mengambil nilai dari data-target
                var targetValue = $this.data('target');
                $({
                    someValue: 0
                }).animate({
                    someValue: targetValue
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this
                            .someValue)); // Update teks dengan nilai animasi
                    },
                    complete: function() {
                        // Pastikan nilai akhir ditampilkan tanpa desimal
                        $this.text(Math.floor(this.someValue));
                    }
                });
            });
        });
    </script>



    <script>
        $(document).ready(function() {
            $('.btn-link').click(function() {
                $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
            });
        });
    </script>


    <p id="berita"></p>



    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.navbar-toggler').on('click', function() {
                $('#navmenu').toggle();
            });
        });
    </script>

</body>

</html>
