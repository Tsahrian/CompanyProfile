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
                                    <li class="breadcrumb-item active" aria-current="page">Edit Image Slider</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-8">
                    <form method="post" action="{{ route('image_slider.update', $image_slider->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title_slider" class="form-label">Title Image Slider</label>
                            <input type="text" class="form-control @error('title_slider') is-invalid @enderror"
                                id="title_slider" name="title_slider" value="{{ $image_slider->title_slider }}">
                            @error('title_slider')
                                <div class=" invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title_slider_en" class="form-label">Title Image Slider English</label>
                            <input type="text" class="form-control @error('title_slider_en') is-invalid @enderror"
                                id="title_slider_en" name="title_slider_en"
                                value="{{ $image_slider->title_slider_en }}">
                            @error('title_slider_en')
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
                            <input id="body" type="hidden" name="body" value="{{ $image_slider->body }}">
                            <trix-editor input="body"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <label for="body_en" class="form-label">Body English</label>
                            @error('body_en')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="body_en" type="hidden" name="body_en" value="{{ $image_slider->body_en }}">
                            <trix-editor input="body_en"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <label for="categori_id" class="form-label">Category</label>
                            <select class="form-select" name="category_id">
                                @foreach ($category as $row)
                                    @if ($row->id == $image_slider->category_id)
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
                                <option value="1" {{ $image_slider->is_active == '1' ? 'selected' : '' }}>Publish
                                </option>
                                <option value="0" {{ $image_slider->is_active == '0' ? 'selected' : '' }}>Draft
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="images_slider" class="form-label">Post image</label>
                            <img src="{{ asset('storage/' . $image_slider->images_slider) }}"
                                class="img-preview img-fluid mb-3 col-sm-7" alt="">
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control @error('images_slider') is-invalid @enderror" type="file"
                                id="image" name="images_slider" onchange="previewImage()">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.layouts.footer')
