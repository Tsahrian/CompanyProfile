<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Companny Profile</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
</head>

<body id="page-top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand d-flex" href="#page-top">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" />
                <h4 class="SolusiRumah ms-2">Solusi Rumah</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="langs">
                <a href="{{ route('language', ['lang' => 'id']) }}" language="indonesia"
                    class="link {{ session()->get('locale') == 'id' || !session()->has('locale') ? 'active' : '' }} text-decoration-none text-warning">Indonesia</a>
                <a href="{{ route('language', ['lang' => 'en']) }}" language="english"
                    class="link {{ session()->get('locale') == 'en' ? 'active' : '' }} text-decoration-none text-warning">English</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#beranda">{{ trans('message.home') }}</a></li>
                    <li class="nav-item"><a class="blog nav-link" href="#blog">{{ trans('message.blog') }}</a></li>
                    <li class="nav-item"><a class="galeri nav-link" href="#galeri">{{ trans('message.galeri') }}</a>
                    </li>
                    <li class="nav-item"><a class="visimisi nav-link"
                            href="#visimisi">{{ trans('message.visimisi') }}</a></li>
                    <li class="nav-item"><a class="mitra nav-link" href="#mitra">{{ trans('message.mitra') }}</a></li>
                    <li class="nav-item"><a class="kontak nav-link" href="#kontak">{{ trans('message.kontak') }}</a>
                    </li>
                </ul>

                <ul class=" navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dashboard"><i
                                            class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class=" dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                            Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class=" nav-item">
                            <a href="/login" class=" nav-link"><i class="bi bi-box-arrow-in-right"></i>Login</a>
                            <a href="/dashboard" class=" nav-link"><i class="bi bi-box-arrow-in-right"></i>Login 2</a>
                        </li>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>

    <!-- Masthead-->
    @foreach ($text_intros as $post)
        <header class="masthead">
            <div class="container">
                <div class="selamatdatang masthead-subheading">{{ $post->title_intro }}</div>
                <div class="bertemu textintro1 masthead-heading text-uppercase">{{ $post->body_intro }}</div>
            </div>
        </header>
    @endforeach

    <!-- image slider start -->
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide mt-5" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner shadow-lg">
                @foreach ($image_slider as $row)
                    <div class="carousel-item active">
                        <img src="{{ asset('storage/' . $row->images_slider) }}"
                            class="d-block w-100 h-100 img-thumbnail" alt="rumah-1" />
                        <div class="carousel-text carousel-caption d-md-block">
                            <h5 class="IRM">{{ $row->title_slider }}</h5>
                            <p class="IRM1">{{ $row->body }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- image slider end -->

    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="jasa section-heading text-uppercase">Jasa</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row text-center">
                @foreach ($jasas as $jasa)
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-house-circle-check fa-beat fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="properti my-3">{{ $jasa->title_jasa }}</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime
                            quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- galeri Grid-->
    <section class="page-section bg-light" id="galeri">
        <div class="container">
            <div class="text-center">
                <h2 class="galerihead section-heading text-uppercase">Galeri</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                @foreach ($photo_gallery as $gallery)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- galeri item -->
                        <div class="galeri-item">
                            <a class="galeri-link" data-bs-toggle="modal"
                                href="{{ '#imagegallery' . $gallery->id }}">
                                <div class="galeri-hover">
                                    <div class="galeri-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{ asset('storage/' . $gallery->image_gallery) }}"
                                    alt="..." />
                            </a>
                            <div class="galeri-caption">
                                <div class="CDRK galeri-caption-subheading text-muted">{{ $gallery->title_photo }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Embed youtube galerry start -->
    <section class="page-section">
        <h3 class="videogaleri text-center">Video Galeri</h3>
        <div class="container container-video">
            <div class="main-video">
                <iframe class="" width="560" height="315"
                    src="https://www.youtube.com/embed/eVLRYDl8StA?si=HRwbr5FNDaaM0xqx" title="YouTube video player"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
            <div class="video-list">
                @foreach ($youtubes as $vid)
                    <div class="vid active">
                        <iframe class="" width="100" height="100" src="{{ $vid->link }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                        <h5 class="rmhclusterpremium title">{{ $vid->title_video }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Embed youtube galerry end -->


    <!-- Embed youtube galerry start -->
    <h3 class="videogaleri text-center">Video Galeri</h3>
    <div class="container container-video">
        <div class="main-video">
            <iframe class="" width="560" height="315"
                src="https://www.youtube.com/embed/eVLRYDl8StA?si=oe6XPdEEmKG7rySF" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            <h3 class="clusterpremium">Rumah mewah di cluster premium</h3>
        </div>
        <div class="video-list">
            <h3>Playlist</h3>
            @foreach ($youtubes as $vid)
                <div class="vid">
                    <iframe class="" width="100" height="100" src="{{ $vid->link }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <h5 class="rmhclusterpremium title">{{ $vid->title_video }}</h5>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Embed youtube galerry end -->

    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">About</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <ul class="timeline">
                @foreach ($blog as $news)
                    <li class="{{ $news->class_inverted }}">
                        <div class="timeline-image"><img class="rounded-circle img-fluid"
                                src="{{ asset('storage/' . $news->image_blog) }}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="tgl">{{ $news->tanggal->format('F Y') }}</h4>
                                <h4 class="ptanggerang subheading">{{ $news->title }}</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">
                                    {{ $news->body }}
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Be Part
                            <br />
                            Of Our
                            <br />
                            Story!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Team-->
    <section class="page-section bg-light">
        <div id="visi-misi" class="container-fluid py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="vm text-bold">VISI DAN MISI</h1>
                    </div>
                </div>
                <div class="row py-4">
                    @foreach ($visi_misis as $vm)
                        <div class="col-sm-12 col-md-6">
                            <h3 class="visi text-muted">{{ $vm->title }}</h3>
                            <p class="visi1">{{ $vm->body }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Partners-->
    <div class="py-5">
        <div class="container">
            <h1 class="mitra1 text-center $grey-500">Mitra</h1>
            <div class="row align-items-center">
                @foreach ($partners as $mitra)
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                                src="{{ asset('storage/' . $mitra->logo) }}" alt="..."
                                aria-label="Microsoft Logo" /></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="kontakUs section-heading text-uppercase">Hubungi Kami</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <form action="/" method="post" id="contactForm" data-sb-form-api-token="API_TOKEN">
                @csrf
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" name="name" type="text"
                                placeholder="Nama *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="email" name="email" type="email"
                                placeholder="Email *" data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.
                            </div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" name="phone" type="tel"
                                placeholder="Phone *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is
                                required.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" name="pesan" placeholder="Pesan *" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" text-center">
                    <button class=" btn btn-primary btn-xl text-uppercase" id="submitButton"
                        type="submit">Kirim</button>
                </div>
                @foreach ($profiles as $profile)
                    <div class=" rounded rounded-3 text-light col-lg-3">
                        <i class="fa-solid fa-square-phone"></i><span class=" mx-2">{{ $profile->phone }}</span>
                        </p>
                        <i class="fa-solid fa-map-location-dot"></i><span
                            class=" mx-2">{{ $profile->address }}</span>
                        </p>
                        </p>
                        <i class="fa-solid fa-envelope"></i><span class=" mx-2">{{ $profile->email }}</span>
                        </p>
                    </div>
                @endforeach
            </form>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    @foreach ($sosmeds as $sosmed)
                        <a class="btn btn-social mx-2" href="{{ $sosmed->link }}" aria-label="Twitter">
                            <img src="{{ asset('storage/' . $sosmed->icon) }}" width="20" alt="">
                        </a>
                    @endforeach
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- galeri Modals-->
    <!-- galeri item 1 modal popup-->
    @foreach ($photo_gallery as $gallery)
        <div class="galeri-modal modal fade" id="{{ 'imagegallery' . $gallery->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                            alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Galeri details-->
                                    <h2 class="nameproyek text-uppercase">{{ $gallery->title_photo }}</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto"
                                        src="{{ asset('storage/' . $gallery->image_gallery) }}" alt="..." />
                                    <p>{{ $gallery->body }}</p>
                                    <ul class="list-inline">
                                        <li>
                                            <p class="subkategori">Desain Interior</p>
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                        type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    @include('sweetalert::alert')
</body>

</html>
