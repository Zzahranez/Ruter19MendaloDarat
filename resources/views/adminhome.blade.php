<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>AdminManageSurat</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Logo RUTER -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="img/Ruter.png" alt="Logo RT 19" style="height: 40px; width: auto;">
                </div>

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

          
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kelola Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ route('adminhome.index') }}">Data Surat</a>
                        <a class="collapse-item" href="{{ route('adminkelolauser.index') }}">User</a>

                    </div>
                </div>
            </li>



         

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                  

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Permohonan Surat</h1>

                    <div class="container">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">nama</th>
                                    <th scope="col">alamat</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Jenis-Kelamin</th>
                                    <th scope="col">jenis_surat</th>
                                    <th scope="col">status</th>

                                    <th scope="col">aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permohonan_surats as $indexs => $item)
                                    <tr>
                                        <th scope="row">{{ $indexs + 1 }}</th>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->tanggal_lahir }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->jenis_surat }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="#" role="button"
                                                data-toggle="modal"
                                                data-target="#ModalUpdate{{ $item->id }}"><i class="fas fa-edit"></i>Update</a>

                                            <!-- Tombol Delete -->
                                            <a class="btn btn-danger"
                                                href="{{ route('adminhome.destroy', $item->id) }}"
                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();"
                                                ><i class="fas fa-trash"></i>Delete</a>

                                            <!-- Form Delete -->
                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('adminhome.destroy', $item->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>


                                    {{-- Modal update data surat --}}
                                    <div class="modal fade" id="ModalUpdate{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalUpdate" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Kelola Permohonan Surat</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('adminhome.update', [$item->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="form-group">
                                                            <label for="nama">Nama</label>
                                                            <input type="text" class="form-control" id="nama"
                                                                name="nama" value="{{ $item->nama }}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="alamat">Alamat</label>
                                                            <input type="text" class="form-control" id="alamat"
                                                                name="alamat" value="{{ $item->alamat }}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" value="{{ $item->email }}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="jenis_surat">Jenis Surat</label>
                                                            <select class="form-control" id="jenis_surat"
                                                                name="jenis_surat" required>
                                                                <option value="Surat Keterangan Tidak Mampu"
                                                                    @if ($item->jenis_surat == 'Surat Keterangan Tidak Mampu') selected @endif>
                                                                    SKTM</option>
                                                                <option value="Surat Pengantar Pembuatan KK"
                                                                    @if ($item->jenis_surat == 'Surat Pengantar Pembuatan KK') selected @endif>
                                                                    SPPK</option>
                                                                <option value="Surat Keterangan Berkelakuan Baik"
                                                                    @if ($item->jenis_surat == 'Surat Keterangan Berkelakuan Baik') selected @endif>
                                                                    SKKB</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select class="form-control" id="status"
                                                                name="status" required>
                                                                <option value="Diproses"
                                                                    @if ($item->status == 'Diproses') selected @endif>
                                                                    Diproses</option>
                                                                <option value="Selesai"
                                                                    @if ($item->status == 'Selesai') selected @endif>
                                                                    Selesai</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                                            <input type="date" class="form-control"
                                                                id="tanggal_lahir" name="tanggal_lahir"
                                                                value="{{ $item->tanggal_lahir }}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                                            <select class="form-control" id="jenis_kelamin"
                                                                name="jenis_kelamin" required>
                                                                <option value="Laki-laki"
                                                                    @if ($item->jenis_kelamin == 'Laki-laki') selected @endif>
                                                                    Laki-laki</option>
                                                                <option value="Perempuan"
                                                                    @if ($item->jenis_kelamin == 'Perempuan') selected @endif>
                                                                    Perempuan</option>
                                                            </select>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Simpan
                                                            Perubahan</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </tbody>
                        </table>

                    </div>



                </div>


                <div class="container">




                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModalScrollable">
                        Kelola Surat
                    </button>




                    <!-- Modal surat masuk -->
                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Kelola Permohonan Surat
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">nama</th>
                                                    <th scope="col">alamat</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">jenis_surat</th>
                                                    <th scope="col">status</th>
                                                    <th scope="col">aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($permohonan_surats->isEmpty())
                                                    <p>Belum ada permohonan surat.</p>
                                                @else
                                                    @foreach ($permohonan_surats as $indexs => $item)
                                                        <tr>
                                                            <th scope="row">{{ $indexs + 1 }}</th>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ $item->alamat }}</td>
                                                            <td>{{ $item->email }}</td>
                                                            <td>{{ $item->jenis_surat }}</td>
                                                            <td>{{ $item->status }}</td>
                                                            <td>
                                                                <a class="btn btn-success" href="#"
                                                                    role="button" data-toggle="modal"
                                                                    data-target="#exampleModal">Selesai</a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif

                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Klik logout jika anda sudah yakin ingin keluar?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-primary" type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


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

        {{-- ndok footer --}}
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>



</html>
