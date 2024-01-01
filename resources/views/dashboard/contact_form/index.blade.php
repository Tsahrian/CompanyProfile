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
                                <li class="breadcrumb-item active" aria-current="page">Message</li>
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
                                    <h4 class="card-title">Message</h4>
                                </div>
                                @if (session()->has('success'))
                                    <div class=" alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="card-content">
                                    <!-- table with dark -->
                                        <div class="table-responsive">
                                            <table class="table table-dark mb-0">
                                                <thead>
                                                    <tr class="">
                                                        <th>#</th>
                                                        <th>NAME</th>
                                                        <th>EMAIL</th>
                                                        <th>PHONE</th>
                                                        <th>MESSAGE</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="border border-1">
                                                    @forelse ( $messages as $row )
                                                        <tr class=" border border-1 border-opacity-25">
                                                            <td class="text-bold-500">{{ $loop->iteration }}</td>
                                                            <td class="text-bold-500">{{ $row->name }}</td>
                                                            <td class="text-bold-500">{{ $row->email }}</td>
                                                            <td class="text-bold-500">{{ $row->phone }}</td>
                                                            <td class="text-bold-500">{{ $row->pesan }}</td>
                                                            <td class="">
                                                                <a href="https://mail.google.com/" class="badge-circle badge-circle-light-secondary font-medium-1"><span
                                                                    data-feather="mail"></span>
                                                                </a>
                                                                <form action="{{ route('contact_form.destroy', $row->id) }}" method="post" class=" d-inline">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class=" bg-transparent text-primary border-0" onclick="return confirm('Are you sure ?')">
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

