<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GIS Situs Budaya | {{ $titel }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('tamplate/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('tamplate/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <link rel="stylesheet" href="{{ asset('tamplate/dist/css/adminlte.min.css?v=3.2.0') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

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

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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

    <script>
        var map = L.map('map').setView([-6.7488, 108.5595], 11);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Mendefinisikan batas-batas geografis Kabupaten Cirebon
        var bounds = [
        [-6.9818, 108.2693], // Koordinat sudut barat laut
        [-6.6661, 108.8244]  // Koordinat sudut tenggara
        ];

        // Menampilkan polygon Kabupaten Cirebon
        L.polygon([
        bounds,
        [[-6.8158, 108.6808], [-6.6693, 108.6121], [-6.6709, 108.7408], [-6.7939, 108.8068], [-6.8645, 108.7268], [-6.8158, 108.6808]]
        ]).addTo(map);

        // Menampilkan batas-batas geografis Kabupaten Cirebon pada peta
        map.fitBounds(bounds);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <script src="{{ asset('tamplate/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('tamplate/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('tamplate/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.j') }}s"></script>

    <script src="{{ asset('tamplate/dist/js/adminlte.js?v=3.2.0') }}"></script>


    <script src="{{ asset('tamplate/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('tamplate/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>

    <script src="{{ asset('tamplate/plugins/chart.js/Chart.min.js') }}"></script>

    {{-- <script src="dist/js/demo.js"></script> --}}

    <script src="{{ asset('tamplate/dist/js/pages/dashboard2.js') }}"></script>
</body>

</html>
