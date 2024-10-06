<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/pengajuan.css">
    <link rel="stylesheet" href="css/hamburger.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <x-navbar></x-navbar>

    <div class="container mt-1 col-md-8 col-lg-6 flex-fill">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="mt-4 ms-3 animate__animated animate__fadeInLeft" style="font-size: 3rem; font-weight: bold; color: #324254;">
                    Lakukan permohonan surat
                </h1>
                <p class="mt-2 ms-3 animate__animated animate__fadeInLeft" style="font-family: 'Roboto'; font-size: 1.1rem;">
                    Untuk melakukan permohonan surat, silahkan isi form di bawah ini...
                </p>
            </div>
            <div class="col-md-6 ps-5 text-center">
                <img src="img/undraw_posting_photo.svg" alt="Deskripsi Gambar" class="img-fluid img-hover animate__animated animate__fadeInRight" style="max-width: 80%; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            </div>
        </div>

        {{-- alert --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Menampilkan Email Pengguna yang Login --}}
        @if (Auth::check())
            <div class="alert alert-info">
                Email Anda: {{ Auth::user()->email }}
            </div>
        @else
            <div class="alert alert-warning">
                Anda belum login. Silakan login untuk mengajukan surat.
            </div>
        @endif

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-15"> 
                    <div class="card shadow-lg p-4 w-100 mb-5" style="border-radius: 15px;">
                        {{-- Form --}}
                        <form action="{{ route('pengajuan.submit') }}" method="POST" class="mb-5">
                            @csrf
                            <!-- Input Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control shadow-sm" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                            </div>
                            <!-- Input Alamat -->
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control shadow-sm" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat" required></textarea>
                            </div>
                            <!-- Input Tanggal Lahir -->
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control shadow-sm" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                            <!-- Input Jenis Kelamin -->
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select shadow-sm" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="" selected>Pilih jenis kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <!-- Input Jenis Surat -->
                            <div class="mb-3">
                                <label for="jenis_surat" class="form-label">Jenis Surat</label>
                                <select class="form-select shadow-sm" id="jenis_surat" name="jenis_surat" required>
                                    <option value="" selected>Pilih jenis surat</option>
                                    <option value="Surat Keterangan Tidak Mampu">SKTM</option>
                                    <option value="Surat Pengantar Pembuatan KK">SPPK</option>
                                    <option value="Surat Keterangan Berkelakuan Baik">SKKB</option>
                                </select>
                            </div>
                            <!-- Tombol Submit -->
                            <button type="submit" class="btn btn-primary btn-hover">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer></x-footer>

    {{-- ndok footer --}}
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

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
