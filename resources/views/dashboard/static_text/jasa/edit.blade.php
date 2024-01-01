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
                                    <li class="breadcrumb-item active" aria-current="page">Edit Text Jasa
                                        "<i>{{ $jasas->title_jasa }}</i>"</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-8">
                    <form method="post" action="{{ route('jasa.update', $jasas->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title_jasa" class="form-label">Title Jasa</label>
                            <input type="text" class="form-control @error('title_jasa') is-invalid @enderror"
                                id="title_jasa" name="title_jasa" value="{{ $jasas->title_jasa }}">
                            @error('title_jasa')
                                <div class=" invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title_jasa_en" class="form-label">Title Jasa English</label>
                            <input type="text" class="form-control @error('title_jasa_en') is-invalid @enderror"
                                id="title_jasa_en" name="title_jasa_en" value="{{ $jasas->title_jasa_en }}">
                            @error('title_jasa_en')
                                <div class=" invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="body_jasa" class="form-label">Body</label>
                            @error('body_jasa')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="body_jasa" type="hidden" name="body_jasa" value="{{ $jasas->body_jasa }}">
                            <trix-editor input="body_jasa"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <label for="body_jasa_en" class="form-label">Body English</label>
                            @error('body_jasa_en')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="body_jasa_en" type="hidden" name="body_jasa_en"
                                value="{{ $jasas->body_jasa_en }}">
                            <trix-editor input="body_jasa_en"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <label for="categori_id" class="form-label">Category</label>
                            <select class="form-select" name="category_id">
                                @foreach ($category as $row)
                                    @if ($row->id == $jasas->category_id)
                                        <option value={{ $row->id }} selected="selected">{{ $row->name }}
                                        </option>
                                    @else
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="is_active">
                                <option value="1" {{ $jasas->is_active == '1' ? 'selected' : '' }}>Publish
                                </option>
                                <option value="0" {{ $jasas->is_active == '0' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.layouts.footer')
