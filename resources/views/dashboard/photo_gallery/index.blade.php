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
                            <h3>Table</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Table</li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                @if (session()->has('success'))
                                    <div class=" alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="card-header">
                                    <h5 class="card-title">Our Gallery</h5>
                                    <a href="{{ route('photo_gallery.create') }}" class="btn btn-primary mx-3">Create new post</a>
                                </div>
                                <div class="card-body py-3">
                                    <div class="row gallery">
                                        @forelse ( $image_gallery as $row )
                                        <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-3 pb-5">
                                            <a href="">
                                                <img class="w-100 active" src="{{ asset('storage/' . $row->image_gallery) }}" data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                                            </a>
                                            <div class=" my-2">
                                                <p class=" font-bold">Title : <span class=" text-sm">{{ $row->title_photo }}</span></p>
                                                <p class=" font-bold">Content : <span class=" text-sm">{{ $row->body }}</span></p>
                                            </div>
                                            <a href="{{ route('photo_gallery.edit', $row->id) }}" class="badge bg-warning my-2"><span
                                                data-feather="edit"></span>
                                            </a>
                                            <form action="{{ route('photo_gallery.destroy', $row->id) }}" method="post" class=" d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure ?')">
                                                    <span data-feather="x-circle">
                                                </button>
                                            </form>
                                        </div>
                                        @empty
                                            <h1>Data Masih Kosong</h1>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@include('dashboard.layouts.footer')

