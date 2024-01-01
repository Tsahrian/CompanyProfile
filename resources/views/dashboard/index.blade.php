@include('dashboard.layouts.head')
<body>
    <script src="{{ asset('dist/assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        @include('dashboard.layouts.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Selamat Datang Di Dashboard Rumah Solusi</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-1 order-last text-end text-bold">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class=" dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('dashboard.layouts.footer')
