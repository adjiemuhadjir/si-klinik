<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $judul }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('/back/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('/back/vendors/base/vendor.bundle.base.css') }}">
    <link href="{{ url('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/back/css/trix.css') }}">
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ url('/back/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('/back/css/style.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('/assets/img/pkblebah.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">

                    <a class="navbar-brand brand-logo" href="index.html"><b class="text-success">KLINIK</b> ABC</a>
                    {{-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="back/images/logo-mini.svg"
                            alt="logo" /></a> --}}
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-sort-variant"></span>
                    </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <!-- <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul> -->
                <ul class="navbar-nav navbar-nav-right">
                    <!-- <li class="nav-item dropdown mr-1">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-message-text mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal">David Grey
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal">Tim Cook
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal"> Johnson
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li> -->

                    <!-- Pemberitahuan -->
                    <li class="nav-item dropdown mr-4">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown"
                            id="notificationDropdown" href="#" data-toggle="dropdown">
                            {{-- @if (auth()->user()->verifikasi != 'belum_valid')
                                <i class="mdi mdi-bell mx-0"></i>
                                <span class="count"></span>
                            @endif --}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Pemberitahuan</p>
                        </div>
                    </li>
                    <!-- End Pemberitahuan -->

                    <!-- Profile -->
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            {{-- <img src="/foto_user/{{ auth()->user()->foto == '' ? 'default.png' : auth()->user()->foto }}"
                                alt="profile" />
                            <span class="nav-profile-name">{{ auth()->user()->nama }}</span> --}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="/profile">
                                <i class="mdi mdi-account
                                menu-icon text-primary"></i>
                                Profile
                            </a>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item"><i
                                        class="mdi mdi-logout text-primary"></i>
                                    Logout</button>
                            </form>
                        </div>
                    </li>
                    <!-- End Profile -->

                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    {{-- @if (auth()->user()->lvl == '1') --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="/dashboard">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="/pegawai">
                            <i class="mdi mdi-account
                            menu-icon"></i>
                            <span class="menu-title">Pegawai</span>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="/berita">
                            <i class="mdi mdi-newspaper menu-icon"></i>
                            <span class="menu-title">Berita</span>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="mdi mdi-account-card-details menu-icon"></i>
                        <span class="menu-title">Anggota</span>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="/verifikasi">
                            <i class="mdi mdi-account-search menu-icon"></i>
                            <span class="menu-title">Verifikasi Pendaftar</span>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('referal.index') }}">
                        <i class="mdi mdi-account-network
                            menu-icon"></i>
                        <span class="menu-title">Referal</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="mdi mdi-circle-outline menu-icon"></i>
                            <span class="menu-title">Master</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('wilayah.index') }}">Wilayah</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('poli.index') }}">Poli</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('tindakan.index') }}">Tindakan</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('pegawai.index') }}">Pegawai</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('user.index') }}">User</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('obat.index') }}">Obat</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="mdi mdi-square-outline menu-icon"></i>
                            <span class="menu-title">Transaksi</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('pasien.index') }}">Pasien</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('pendaftaran.index') }}">Pendaftaran Pasien</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('pemeriksaan.index') }}">Pemeriksaan Pasien</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('pembayaran.index') }}">Pembayaran</a></li>
                            </ul>
                        </div>
                    </li>
                    {{-- @endif --}}
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @yield('container')

                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © KLINIK
                            ABC | Create With Love By <a
                                href="https://www.instagram.com/adjiempandi/">Mpandi</a></span>-->
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ url('/back/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ url('/back/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ url('/back/js/off-canvas.js') }}"></script>
    <script src="{{ url('/back/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('/back/js/template.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ url('/back/js/dashboard.js') }}"></script>
    <script src="{{ url('/back/js/data-table.js') }}"></script>
    {{-- <script src="back/js/jquery.dataTables.js"></script> --}}
    <script src="{{ url('/back/js/dataTables.bootstrap4.js') }}"></script>
    <!-- End custom js for this page-->
    {{-- <script src="back/js/jquery.cookie.js" type="text/javascript"></script> --}}
    <script src="{{ url('/assets/js/modal.js') }}"></script>
    <script type="text/javascript" src="{{ url('/back/js/trix.js') }}"></script>
    {{-- <script src="assets/js/login.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script src="{{ url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/back/js/file-upload.js') }}"></script>
    <script>
        $("#anggota-partai").DataTable({
            dom: "Bfrtip",
            buttons: [{
                    extend: 'excelHtml5',
                    autoFilter: true,
                    exportOptions: {
                        columns: [0, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    }
                },
                // {
                //     extend: 'pdfHtml5',
                //     exportOptions: {
                //         columns: [0, 1, 2, 5]
                //     }
                // },
                'colvis'
            ],
            // aLengthMenu: [
            //   [5, 10, 15, -1],
            //   [5, 10, 15, "All"],
            // ],
            // iDisplayLength: 10,
            // language: {
            //   search: "Search",
            // },
            searching: true,
            paging: true,
            ordering: true,
            // info: false,
        });
        $("#anggota-referal").DataTable({
            dom: "Bfrtip",
            buttons: [{
                    extend: 'excelHtml5',
                    autoFilter: true,
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                // {
                //     extend: 'pdfHtml5',
                //     exportOptions: {
                //         columns: [0, 1, 2, 5]
                //     }
                // },
                'colvis'
            ],
            // aLengthMenu: [
            //   [5, 10, 15, -1],
            //   [5, 10, 15, "All"],
            // ],
            // iDisplayLength: 10,
            // language: {
            //   search: "Search",
            // },
            searching: true,
            paging: true,
            ordering: true,
            // info: false,
        });
        $("#verif-anggota-partai").DataTable({
            // dom: "Bfrtip",
            // buttons: ["excel", "pdf", "print"],
            // aLengthMenu: [
            //   [5, 10, 15, -1],
            //   [5, 10, 15, "All"],
            // ],
            // iDisplayLength: 10,
            // language: {
            //   search: "Search",
            // },
            searching: true,
            paging: true,
            ordering: true,
            // info: false,
        });
        $("#agenda").DataTable({
            // dom: "Bfrtip",
            // buttons: ["excel", "pdf", "print"],
            // aLengthMenu: [
            //   [5, 10, 15, -1],
            //   [5, 10, 15, "All"],
            // ],
            // iDisplayLength: 10,
            // language: {
            //   search: "Search",
            // },
            searching: true,
            paging: true,
            ordering: true,
            // info: false,
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
    {{-- //grafik per wilayah
        $.ajax({
            type: "GET",
            url: "/chartWilayah",
            // data: data,
            success: function(data) {
                var barChartCanvas;
                console.log(data);
                var datas = {
                    labels: data.label,
                    // legend: "ok",
                    datasets: [{
                        // legend: false,
                        label: "Jumlah Kader",
                        data: data.data,
                        id_data: data.id_wilayah,
                        backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                        ],
                        borderColor: [
                            "rgba(255,99,132,1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)",
                        ],
                        borderWidth: 1,
                        fill: true,
                    }, ],
                };

                var canvas = document.getElementById("barChartwilayah");
                var ctx = canvas.getContext("2d");
                // var myNewChart = new Chart(ctx, {
                //   type: "bar",
                //   data: data,
                // });

                if ($("#barChartwilayah").length) {
                    // var barChartCanvas = $("#barChartwilayah").get(0).getContext("2d");
                    // This will get the first returned node in the jQuery collection.
                    var myNewChart = new Chart(ctx, {
                        // var barChart = new Chart(barChartCanvas, {
                        type: "bar",
                        data: datas,
                        options: {
                            scales: {
                                yAxes: [{
                                    display: true,
                                    ticks: {
                                        display: true,
                                        min: 0,
                                        // max: 100,
                                        stepSize: 1,
                                        fontColor: "#6c7383",
                                        fontSize: 12,
                                        fontStyle: 500,
                                        padding: 15,
                                    },
                                }, ],
                            },
                            legend: {
                                display: false,
                            },
                        },
                    });
                }

                canvas.onclick = function(evt) {
                    var activePoints = myNewChart.getElementsAtEvent(evt);
                    if (activePoints[0]) {
                        var chartData = activePoints[0]["_chart"].config.data;
                        var idx = activePoints[0]["_index"];

                        // var label = chartData.labels[idx];
                        var value = chartData.datasets[0].id_data[idx];

                        // var url = "{{ route('dashboard.show', '') }}" + "/" + value;
                        // var url = "http://example.com/?label=" + label + "&value=" + value;
                        // console.log(url);
                        // window.location.href = "{{ URL::to('dashboard/" + value + "') }}";

                        var url = '{{ route('dashboard.show', ':slug') }}';

                        url = url.replace(':slug', value);

                        window.location.href = url;

                        // window.location.href = '{{ route('dashboard.index') }}';
                        // var url = '{{ route('dashboard.show', ':slug') }}';

                        // url = url.replace(":slug", value);

                        // window.location.href = url;

                        // window.location.href =
                        //   "{{ route('dashboard.show', '') }}" + "/" + value;
                    }
                };
            },
        });
        //End grafik per wilayah
    </script> --}}
</body>

<script></script>

</html>
