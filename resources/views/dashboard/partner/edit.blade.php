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
                                    <li class="breadcrumb-item active" aria-current="page">Edit Partner Logo</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-8">
                    <form method="post" action="{{ route('partner.update', $partners->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name_partner" class="form-label">Name Partner</label>
                            <input type="text" class="form-control @error('name_partner') is-invalid @enderror" id="name_partner" name="name_partner" value="{{ $partners->name_partner }}">
                            @error('name_partner')
                                <div class=" invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="categori_id" class="form-label">Category</label>
                            <select class="form-select" name="category_id">
                              @foreach ($category as $row)
                              @if ($row->id == $partners->category_id)
                                <option value={{ $row->id }} selected="selected">{{ $row->name }}</option>
                                @else
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                              @endif

                              @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="is_active">
                                  <option value="1" {{ $partners->is_active == '1' ? 'selected' : '' }}>Publish</option>
                                  <option value="0" {{ $partners->is_active == '0' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cover" class="form-label">Logo</label>
                            <img src="{{ asset('storage/' . $partners->logo) }}" class="img-preview img-fluid mb-3 col-sm-7" alt="">
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control @error('cover') is-invalid @enderror" type="file"
                                id="image" name="logo" onchange="previewImage()">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.layouts.footer')
