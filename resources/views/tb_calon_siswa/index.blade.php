<!DOCTYPE html>
<html>

<head>
    <title>App</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <!-- plugin css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- end plugin css -->

    <!-- css for page -->
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">


    <!-- end css for page -->
    @stack('plugin-styles')

    <!-- common css -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <!-- end common css -->

    @stack('style')
</head>

<body data-base-url="{{ url('/') }}">
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            @include('layouts.header')
            <div class="sidebar sidebar-offcanvas" id="sidebar">
                @include('layouts.sidebar')
            </div>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Siswa</h4>
                                <p class="card-description">
                                    Data Pendaftar siswa
                                </p>
                                <a href="{{ route('tb_calon_siswa.create') }}" class='mb-5 btn btn-primary'> <span
                                        class='fa fa-plus'></span> Tambah Siswa</a>
                                <a href="{{ route('tb_calon_siswa.print') }}" class='mb-5 btn btn-primary'> <span
                                        class='mdi mdi-printer'></span> Print</a>
                                <br>
                                <table class="display nowrap table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NISN</th>
                                            <th>Nama lengkap </th>
                                            <th>Asal Sekolah</th>
                                            <th>Tempat Tanggal Lahir</th>
                                            <th>jenis Kelamin</th>
                                            <th>agama</th>
                                            <th>kewaganegaraan</th>
                                            <th>action</th>

                                        </tr>

                                    </thead>
                                    @foreach ($tb_calon_siswa as $p)
                                        <tbody>
                                            <tr>
                                                <td>{{ $p->nama }}</td>
                                                <td>{{ $p->email }}</td>
                                                <td>{{ $p->no_hp }}</td>
                                                <td>{{ $p->jenis_kelamin }}</td>
                                                <td>{{ $p->city }}</td>
                                                <td>{{ $p->city }}</td>
                                                <td>{{ $p->city }}</td>
                                                <td>
                                                    <form action="{{ route('tb_calon_siswa.destroy', $p->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="tooltip" data-placement="bottom"
                                                            title="Edit Data">
                                                            <a href="{{ route('tb_calon_siswa.edit', $p->id) }}"
                                                                class="btn btn-primary"><span
                                                                    class="mdi mdi-pencil-outline"></span>
                                                            </a>
                                                        </span>
                                                        <span data-toggle="tooltip" data-placement="bottom"
                                                            title="Delete Data">
                                                            <button type="submit" class="btn btn-danger">
                                                                <span class="mdi mdi-trash-can-outline"></span>
                                                            </button>
                                                        </span>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>anak ke</th>
                                            <th>jumlah saudara</th>
                                            <th>golongan darah</th>
                                            <th>telepon</th>
                                            <th>nama ayah</th>
                                            <th>pekerjaan ayah</th>
                                            <th>action</th>


                                        </tr>
                                    </thead>
                                    @foreach ($tb_calon_siswa as $p)
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>{{ $p->nama }}</td>
                                                <td>{{ $p->email }}</td>
                                                <td>{{ $p->no_hp }}</td>
                                                <td>{{ $p->jenis_kelamin }}</td>
                                                <td>{{ $p->city }}</td>
                                                <td>{{ $p->city }}</td>
                                                <td>
                                                    <form action="{{ route('tb_calon_siswa.destroy', $p->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="tooltip" data-placement="bottom"
                                                            title="Edit Data">
                                                            <a href="{{ route('tb_calon_siswa.edit', $p->id) }}"
                                                                class="btn btn-primary"><span
                                                                    class="mdi mdi-pencil-outline"></span>
                                                            </a>
                                                        </span>
                                                        <span data-toggle="tooltip" data-placement="bottom"
                                                            title="Delete Data">
                                                            <button type="submit" class="btn btn-danger">
                                                                <span class="mdi mdi-trash-can-outline"></span>
                                                            </button>
                                                        </span>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>alamat ayah</th>
                                            <th>telepon ayah</th>
                                            <th>nama ibu</th>
                                            <th>pekerjaan ibu</th>
                                            <th>alamat ibu</th>
                                            <th>telepon ibu</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($tb_calon_siswa as $p)
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>{{ $p->nama }}</td>
                                                <td>{{ $p->email }}</td>
                                                <td>{{ $p->no_hp }}</td>
                                                <td>{{ $p->jenis_kelamin }}</td>
                                                <td>{{ $p->city }}</td>
                                                <td>{{ $p->city }}</td>
                                                <td>
                                                    <form action="{{ route('tb_calon_siswa.destroy', $p->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="tooltip" data-placement="bottom"
                                                            title="Edit Data">
                                                            <a href="{{ route('tb_calon_siswa.edit', $p->id) }}"
                                                                class="btn btn-primary"><span
                                                                    class="mdi mdi-pencil-outline"></span>
                                                            </a>
                                                        </span>
                                                        <span data-toggle="tooltip" data-placement="bottom"
                                                            title="Delete Data">
                                                            <button type="submit" class="btn btn-danger">
                                                                <span class="mdi mdi-trash-can-outline"></span>
                                                            </button>
                                                        </span>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>

    <!-- base js -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- end common js -->
    <!-- plugin js this page -->
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/dataTables.select.min.js') }}"></script>

    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>

    <!-- Custom js for this page-->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>

    @stack('custom-scripts')
</body>

</html>
