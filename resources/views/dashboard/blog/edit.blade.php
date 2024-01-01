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
                                    <li class="breadcrumb-item active" aria-current="page">Edit Blog
                                        "<i>{{ $blog->title }}</i>"</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-8">
                    <form method="post" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="blog" class="form-label">Title Blog / News</label>
                            <input type="text" class="form-control @error('blog') is-invalid @enderror"
                                id="blog" name="title" value="{{ $blog->title }}">
                            @error('blog')
                                <div class=" invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="blog" class="form-label">Title Blog / News English</label>
                            <input type="text" class="form-control @error('blog') is-invalid @enderror"
                                id="blog" name="title_en" value="{{ $blog->title_en }}">
                            @error('blog')
                                <div class=" invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal" name="tanggal" value="{{ $blog->tanggal }}">
                            @error('tanggal')
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
                            <input id="body" type="hidden" name="body" value="{{ $blog->body }}">
                            <trix-editor input="body"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <label for="body_en" class="form-label">Body_en</label>
                            @error('body_en')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="body_en" type="hidden" name="body_en" value="{{ $blog->body_en }}">
                            <trix-editor input="body_en"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <label for="categori_id" class="form-label">Category</label>
                            <select class="form-select" name="category_id">
                                @foreach ($category as $row)
                                    @if ($row->id == $blog->category_id)
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
                                <option value="1" {{ $blog->is_active == '1' ? 'selected' : '' }}>Publish</option>
                                <option value="0" {{ $blog->is_active == '0' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image_blog" class="form-label">Post image</label>
                            <img src="{{ asset('storage/' . $blog->image_blog) }}"
                                class="img-preview img-fluid mb-3 col-sm-7" alt="">
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control @error('image_blog') is-invalid @enderror" type="file"
                                id="image_blog" name="image_blog" onchange="previewImage()">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.layouts.footer')
