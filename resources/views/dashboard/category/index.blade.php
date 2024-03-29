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
                                <li class="breadcrumb-item active" aria-current="page">Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="row" id="table-inverse">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Manage Category</h4>
                                </div>
                                @if (session()->has('success'))
                                    <div class=" alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="card-content">
                                    <!-- table with dark -->
                                    <a href="{{ route('category.create') }}" class="btn btn-primary mb-3 mx-3">Create new post</a>
                                        <div class="table-responsive">
                                            <table class="table table-dark mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ID</th>
                                                        <th>NAME CATEGORY</th>
                                                        <th>SLUG</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ( $category as $row )
                                                        <tr>
                                                            <td class="text-bold-500">{{ $loop->iteration }}</td>
                                                            <td>{{ $row->id }}</td>
                                                            <td class=" w-25 text-bold-500">{{ $row->name }}</td>
                                                            <td class=" w-25 text-bold-500">{{ $row->slug }}</td>
                                                            <td class=" col-lg-3">
                                                                <a href="{{ route('category.edit', $row->id) }}" class="badge bg-warning"><span
                                                                    data-feather="edit"></span>
                                                                </a>
                                                                <form action="{{ route('category.destroy', $row->id) }}" method="post" class=" d-inline">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure ?')">
                                                                        <span data-feather="x-circle">
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td>Data Masih Kosong</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
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
