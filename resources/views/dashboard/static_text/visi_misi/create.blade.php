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
                                    <li class="breadcrumb-item active" aria-current="page">Create Visi Dan Misi</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-8">
                    <form method="post" action="{{ route('visi_misi.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                id="title" name="title">
                            @error('title')
                                <div class=" invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title_en" class="form-label">Title English </label>
                            <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                id="title" name="title_en">
                            @error('title_en')
                                <div class=" invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            @error('body')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="body" type="hidden" name="body">
                            <trix-editor input="body"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <label for="body_en" class="form-label">Body English</label>
                            @error('body_en')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="body_en" type="hidden" name="body_en">
                            <trix-editor input="body_en"></trix-editor>
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
