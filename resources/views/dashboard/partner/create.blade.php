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
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Table</li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Partner</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-8">
                    <form method="post" action="{{ route('partner.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="partner" class="form-label">Name Partner</label>
                            <input type="text" class="form-control @error('partner') is-invalid @enderror" id="partner" name="name_partner">
                            @error('partner')
                                <div class=" invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="categori_id" class="form-label">Category</label>
                            <select class="form-select" name="category_id">
                              @foreach ($category as $row)
                                  <option value="{{ $row->id }}">{{ $row->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control @error('logo') is-invalid @enderror" type="file"
                                id="image" name="logo" onchange="previewImage()">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="is_active">
                                  <option value="1">Publish</option>
                                  <option value="0">Draft</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.layouts.footer')
