<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengajuan Surat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/hamburger.css">
    <!-- Link ke Bootstrap -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="flex-column min-vh-100">

    <x-navbar></x-navbar>
    <!-- Navbar (sudah ada) -->

    <div class="container mt-5 flex-fill">
        <h1 class="mb-4 align-item-center">Riwayat Pengajuan Surat</h1>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Nama Surat</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($permohonans as $permohonan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $permohonan->jenis_surat }}</td>
                        <td>{{ $permohonan->created_at->format('Y-m-d') }}</td>
                        <td>{{ $permohonan->status }}</td>
                        <td>
                            @if ($permohonan->status === 'Selesai')
                                <a href="{{ route('download', $permohonan->id) }}" class="btn btn-primary"
                                    target="_blank">Unduh Surat (PDF)</a>
                            @else
                                <span class="text-muted">Dalam Proses</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada riwayat pengajuan surat</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
