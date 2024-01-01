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
                                <li class="breadcrumb-item active" aria-current="page">Static Text</li>
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
                                    <h4 class="card-title">Manage Jasa</h4>
                                </div>
                                @if (session()->has('success'))
                                    <div class=" alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="card-content">
                                    <!-- table with dark -->
                                    <a href="/dashboard/static_text" class="btn btn-primary mb-3 mx-3">Back</a>
                                    <a href="{{ route('jasa.create') }}" class="btn btn-primary mb-3 mx-3">Create new post</a>
                                        <div class="table-responsive">
                                            <table class=" col-lg-2 table table-dark mb-0">
                                                <thead>
                                                    <tr class=" text-center">
                                                        <th>#</th>
                                                        <th>TITLE</th>
                                                        <th>DESCRIPTION</th>
                                                        <th>Category</th>
                                                        <th>AUTHOR</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ( $jasas as $row )
                                                        <tr class=" text-center">
                                                            <td class="text-bold-500">{{ $loop->iteration }}</td>
                                                            <td class="text-bold-500">{{ $row->title_jasa }}</td>
                                                            <td class=" w-50 text-bold-500">{{ $row->body_jasa }}</td>
                                                            <td class="text-bold-500">{{ $row->category->name }}</td>
                                                            <td class="text-bold-500">{{ $row->users->name }}</td>
                                                            <td class=" mb-2">
                                                                <a href="{{ route('jasa.edit', $row->id) }}" class=" mb-2 badge bg-warning"><span
                                                                    data-feather="edit"></span>
                                                                </a>
                                                                <form action="{{ route('jasa.destroy', $row->id) }}" method="post" class=" d-inline">
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
                                                            <td colspan="7" class=" text-center">Data Masih Kosong</td>
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

