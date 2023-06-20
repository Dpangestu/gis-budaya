<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GIS Situs Budaya | {{ $titel }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    {{-- css costume --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <link rel="stylesheet" href="{{ asset('tamplate/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('tamplate/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <link rel="stylesheet" href="{{ asset('tamplate/dist/css/adminlte.min.css?v=3.2.0') }}">

    {{-- FULLCALENDAR --}}
    <link rel="stylesheet" href="{{ asset('tamplate/plugins/fullcalendar/main.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('fullcalendar/fullcalendar.css') }}"> --}}

    {{-- DATATABLES --}}
    <link rel="stylesheet" href="{{ asset('tamplate/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('tamplate/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tamplate/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Include CSS FullCalendar -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css"> --}}

    <script nonce="5082becc-93ea-4fad-9871-bb21608831d6">
        (function(w, d) {
            ! function(bv, bw, bx, by) {
                bv[bx] = bv[bx] || {};
                bv[bx].executed = [];
                bv.zaraz = {
                    deferred: [],
                    listeners: []
                };
                bv.zaraz.q = [];
                bv.zaraz._f = function(bz) {
                    return function() {
                        var bA = Array.prototype.slice.call(arguments);
                        bv.zaraz.q.push({
                            m: bz,
                            a: bA
                        })
                    }
                };
                for (const bB of ["track", "set", "debug"]) bv.zaraz[bB] = bv.zaraz._f(bB);
                bv.zaraz.init = () => {
                    var bC = bw.getElementsByTagName(by)[0],
                        bD = bw.createElement(by),
                        bE = bw.getElementsByTagName("title")[0];
                    bE && (bv[bx].t = bw.getElementsByTagName("title")[0].text);
                    bv[bx].x = Math.random();
                    bv[bx].w = bv.screen.width;
                    bv[bx].h = bv.screen.height;
                    bv[bx].j = bv.innerHeight;
                    bv[bx].e = bv.innerWidth;
                    bv[bx].l = bv.location.href;
                    bv[bx].r = bw.referrer;
                    bv[bx].k = bv.screen.colorDepth;
                    bv[bx].n = bw.characterSet;
                    bv[bx].o = (new Date).getTimezoneOffset();
                    if (bv.dataLayer)
                        for (const bI of Object.entries(Object.entries(dataLayer).reduce(((bJ, bK) => ({
                                ...bJ[1],
                                ...bK[1]
                            }))))) zaraz.set(bI[0], bI[1], {
                            scope: "page"
                        });
                    bv[bx].q = [];
                    for (; bv.zaraz.q.length;) {
                        const bL = bv.zaraz.q.shift();
                        bv[bx].q.push(bL)
                    }
                    bD.defer = !0;
                    for (const bM of [localStorage, sessionStorage]) Object.keys(bM || {}).filter((bO => bO
                        .startsWith("_zaraz_"))).forEach((bN => {
                        try {
                            bv[bx]["z_" + bN.slice(7)] = JSON.parse(bM.getItem(bN))
                        } catch {
                            bv[bx]["z_" + bN.slice(7)] = bM.getItem(bN)
                        }
                    }));
                    bD.referrerPolicy = "origin";
                    bD.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bv[bx])));
                    bC.parentNode.insertBefore(bD, bC)
                };
                ["complete", "interactive"].includes(bw.readyState) ? zaraz.init() : bv.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div> --}}

        {{-- header --}}
        @include('layouts.partial.header')
        {{-- Sidebar --}}
        @include('layouts.partial.sidebar')

        <div class="content-wrapper">
            {{-- Content --}}
            @yield('content')
        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>

        {{-- Footer --}}
        @include('layouts.partial.footer')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <!-- Include JavaScript dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script> --}}

    <script src="{{ asset('tamplate/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('tamplate/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('tamplate/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <script src="{{ asset('tamplate/dist/js/adminlte.js?v=3.2.0') }}"></script>

    {{-- <script src="../plugins/moment/moment.min.js"></script> --}}

    {{-- FULLCALENDAR --}}
    <script src="{{ asset('tamplate/plugins/fullcalendar/main.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/moment/moment.min.js') }}"></script>
    {{-- <script src="{{ asset('tamplate/dist/js/demo.js') }}"></script> --}}
    {{-- END FULLCALNDAR --}}

    <script src="{{ asset('tamplate/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>

    {{-- <script src="{{ asset('tamplate/plugins/chart.js/Chart.min.js') }}"></script> --}}

    @include ('layouts.script')

    {{-- DATATABLES --}}
    <script src="{{ asset('tamplate/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    {{-- <script src="{{ asset('tamplate/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/pdfmake/vfs_fonts.js') }}"></script> --}}
    {{-- <script src="{{ asset('tamplate/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script> --}}

    {{-- Fullcalendar --}}
    {{-- <script src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script> --}}

    <script src="{{ asset('tamplate/dist/js/pages/dashboard2.js') }}"></script>

    <script>
        setTimeout(function() {
            var hapusFlash = document.getElementById('hapus-flash');
            if (hapusFlash) {
                hapusFlash.style.display = 'none';
            }

            var successFlash = document.getElementById('success-flash');
            if (successFlash) {
                successFlash.style.display = 'none';
            }

            var errorFlash = document.getElementById('error-flash');
            if (errorFlash) {
                errorFlash.style.display = 'none';
            }
        }, 3000);
    </script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    {{-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

    // <script>
    //     document.addEventListener('DOMContentLoaded', function() {
    //         var calendarEl = document.getElementById('calendar');
    //         var calendar = new FullCalendar.Calendar(calendarEl, {
    //             initialView: 'dayGridMonth'
    //         });
    //         calendar.render();
    //     });
    // </script> --}}


</body>

</html>
