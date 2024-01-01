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
                                    <li class="breadcrumb-item active" aria-current="page">Create YouTube Video</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-8">
                    <form method="post" action="{{ route('youtube.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="youtube" class="form-label">Title Video</label>
                            <input type="text" class="form-control @error('youtube') is-invalid @enderror"
                                id="youtube" name="title_video">
                            @error('youtube')
                                <div class=" invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title_video_en" class="form-label">Title Video English</label>
                            <input type="text" class="form-control @error('title_video_en') is-invalid @enderror"
                                id="title_video_en" name="title_video_en">
                            @error('title_video_en')
                                <div class=" invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link Video</label>
                            <input type="text" class="form-control @error('link') is-invalid @enderror"
                                id="link" name="link">
                            @error('link')
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
                            <label for="cover" class="form-label">Post cover</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control @error('cover') is-invalid @enderror" type="file"
                                id="image" name="cover" onchange="previewImage()">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="is_active">
                                {{-- @foreach ($categories as $category) --}}
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                                {{-- @endforeach --}}
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.layouts.footer')
