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
                            <h3>List Manage Static Text</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Static Text</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- list group button & badge start-->
                <section class="list-group-button-badge">
                    <div class="row match-height">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="list-group">
                                            <a href="{{ route('text_intro.index') }}" class="list-group-item list-group-item-action">
                                                Text Intro
                                            </a>
                                            <a href="{{ route('jasa.index') }}" class="list-group-item list-group-item-action">
                                                Jasa
                                            </a>
                                            <a href="{{ route('visi_misi.index') }}" class="list-group-item list-group-item-action">
                                                Visi Dan Misi
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- list group button & badge ends -->
            </div>
        </div>
    </div>
@include('dashboard.layouts.footer')
