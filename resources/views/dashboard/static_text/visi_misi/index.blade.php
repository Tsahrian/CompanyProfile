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
                                    <li class="breadcrumb-item active" aria-current="page">Visi Dan Misi</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <a href="/dashboard/static_text" class="btn btn-primary mb-3 mx-3 mt-5">Back</a>
                <a href="{{ route('visi_misi.create') }}" class="btn btn-primary mb-3 mx-3 mt-5">Create new post</a>
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Visi Dan Misi</h3>
                </div>
                @forelse ( $visi_misis as $row )
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ $row->title }}</h4>
                            </div>
                            <div class="card-body">{{ $row->body }}</div>
                            <div class=" mx-3">
                                <a href="{{ route('visi_misi.edit', $row->id) }}" class=" mb-2 badge bg-warning">
                                    <span data-feather="edit"></span>
                                </a>
                                <form action="{{ route('visi_misi.destroy', $row->id) }}" method="post" class=" d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure ?')">
                                        <span data-feather="x-circle">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </section>
                    @empty
                    <tr>
                        <td colspan="7" class=" text-center">Data Masih Kosong</td>
                    </tr>
                @endforelse
            </div>
        </div>
    </div>
@include('dashboard.layouts.footer')
