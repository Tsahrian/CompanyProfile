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
                                    <li class="breadcrumb-item active" aria-current="page">Create Text Intro</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-8">
                    <form method="post" action="{{ route('text_intro.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="text_intro" class="form-label">Text Intro</label>
                            <input type="text" class="form-control @error('text_intros') is-invalid @enderror"
                                id="text_intros" name="title_intro">
                            @error('text_intros')
                                <div class=" invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="text_intro_en" class="form-label">Text Intro English</label>
                            <input type="text" class="form-control @error('text_intro_en') is-invalid @enderror"
                                id="text_intro_en" name="title_intro_en">
                            @error('text_intro_en')
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
                            <input id="body_intro" type="hidden" name="body_intro">
                            <trix-editor input="body_intro"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <label for="body_intro_en" class="form-label">Body English</label>
                            @error('body_intro_en')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="body_intro_en" type="hidden" name="body_intro_en">
                            <trix-editor input="body_intro_en"></trix-editor>
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
