<!DOCTYPE html>
<html lang="en">

<head>

    <title>{{ config('app.nombre_completo') }}</title>
    <!--

Eatery Cafe Template

http://www.templatemo.com/tm-515-eatery

-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/templatemo-style.css">

</head>

<body>

    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif

    @error('title')
        <script>
            alert('{{ $message }}');
        </script>
    @enderror

    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">

            <span class="spinner-rotate"></span>

        </div>
    </section>


    <!-- MENU -->
    <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>

                <!-- lOGO TEXT HERE -->
                <a href="index.html" class="navbar-brand">{{ config('app.nombre_principal') }}
                    @if (config('app.nombre_secundario'))
                        <span>.</span>
                        {{ config('app.nombre_secundario') }}
                    @endif
                </a>
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-nav-first">
                    @if (config('app.nav_chk1'))
                        <li><a href="#home" class="smoothScroll">{{ config('app.nav_section1') }}</a></li>
                    @endif
                    @if (config('app.nav_chk2'))
                        <li><a href="#about" class="smoothScroll">{{ config('app.nav_section2') }}</a></li>
                    @endif
                    @if (config('app.nav_chk3'))
                        <li><a href="#team" class="smoothScroll">{{ config('app.nav_section3') }}</a></li>
                    @endif
                    @if (config('app.nav_chk4'))
                        <li><a href="#menu" class="smoothScroll">{{ config('app.nav_section4') }}</a></li>
                    @endif
                    @if (config('app.nav_chk5'))
                        <li><a href="#contact" class="smoothScroll">{{ config('app.nav_section5') }}</a></li>
                    @endif
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (config('app.nav_chk6'))
                        <li><a href="#">{{ config('app.nav_section6') }} &nbsp;&nbsp;<i
                                    class="fa fa-phone"></i>&nbsp;&nbsp;{{ $section6->phone_number }}</a>
                        </li>
                    @endif
                    @if (config('app.nav_chk7'))
                        <a href="#footer" class="section-btn">{{ config('app.nav_section7') }}</a>
                    @endif
                </ul>
            </div>
        </div>
    </section>

    <!-- Section 1: HOME -->
    @if (config('app.nav_chk1'))
        <section id="home" class="slider" data-stellar-background-ratio="0.5">
            <div class="row">

                <div class="owl-carousel owl-theme">
                    @foreach ($section1s as $section1)
                        <div class="item"
                            style="background:url({{ '"' . URL::asset('/images/' . $section1->image) . '"' }})">
                            <div class="caption">
                                <div class="container">
                                    <div class="col-md-8 col-sm-12">
                                        <h3>{{ $section1->small_text }}</h3>
                                        <h1>{{ $section1->large_text }}</h1>
                                        <a href="#{{ $section1->link_button }}"
                                            class="section-btn btn btn-default smoothScroll">{{ $section1->lb_button }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (config('app.nav_chk2'))
        <!-- Section 2: ABOUT -->
        <section id="about" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-12">
                        <div class="about-info">
                            <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
                                <h4>{{ $section2->small_text }}</h4>
                                <h2>{{ $section2->large_text }}</h2>
                            </div>

                            <div class="wow fadeInUp" data-wow-delay="0.4s">
                                {{ $section2->description }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="wow fadeInUp about-image" data-wow-delay="0.6s">
                            <img src="{{ URL::asset('/images/' . $section2->image) }}" class="img-responsive"
                                alt="">
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

    @if (config('app.nav_chk3'))
        <!-- Section 3: TEAM CHEF -->
        <section id="team" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                            <h2>{{ $section3->title }}</h2>
                            <h4>{{ $section3->description }}</h4>
                        </div>
                    </div>

                    @foreach ($section3_imgs as $section3_img)
                        <div class="col-md-4 col-s m-4">
                            <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                                <img src="{{ URL::asset('/images/' . $section3_img->image) }}" class="img-responsive"
                                    alt="">
                                <div class="team-hover">
                                    <div class="team-item">
                                        <h4>{{ $section3_img->text_social_networks }}</h4>

                                        <ul class="social-icon">
                                            @foreach ($section3_imgs_social_networks as $scl_ntwrk)
                                                @if ($section3_img->id == $scl_ntwrk->section3_imgs_id)
                                                    <li>
                                                        <a href="{{ $scl_ntwrk->link }}" target="_blank"
                                                            style="background: #ce3232;">
                                                            <img class='img-circle img-responsive'
                                                                src="{{ URL::asset('/images/' . $scl_ntwrk->image) }}" />
                                                        </a>
                                                    </li>
                                                    <li>&nbsp;&nbsp;&nbsp;</li>
                                                    {{-- img-sm img-responsive social-icon img-thumbnail img-circle a-hover-footer --}}
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="team-info">
                                <h3>{{ $section3_img->name }}</h3>
                                <p>{{ $section3_img->role }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (config('app.nav_chk4'))
        <!-- Section 4: MENU-->
        <section id="menu" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                            <h2>{{ $section4->title }}</h2>
                            <h4>{{ $section4->description }}</h4>
                        </div>
                    </div>

                    {{-- Codigo para el menu --}}

                    @foreach ($section4_images as $section4_image)
                        <div class="col-md-4 col-sm-6">
                            <!-- MENU THUMB -->
                            <div class="menu-thumb">
                                {{-- @php $all_text_popup = $section4_image->text_popup . ' Price: $' . $section4_image->price @endphp --}}

                                <a href="{{ URL::asset('/images/' . $section4_image->image) }}" class="image-popup"
                                    title="{{ $section4_image->text_popup . ' - Price: $' . $section4_image->price }}">
                                    <img src="{{ URL::asset('/images/' . $section4_image->image) }}"
                                        class="img-responsive" alt="">

                                    <div class="menu-info">
                                        <div class="menu-item">
                                            <h3>{{ $section4_image->title }}</h3>
                                            <p>{{ $section4_image->description }}</p>
                                        </div>
                                        <div class="menu-price">
                                            <span>${{ $section4_image->price }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- TESTIMONIAL -->
        <section id="testimonial" data-stellar-background-ratio="0.5"
            style="background:url({{ '"' . URL::asset('/images/' . $section4->bg_testimonials_image) . '"' }})">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                            <h2>Testimonios</h2>
                        </div>
                    </div>

                    <div class="col-md-offset-2 col-md-8 col-sm-12">
                        <div class="owl-carousel owl-theme">
                            @foreach ($section4_testimonials as $testimonial)
                                <div class="item">
                                    <p>{{ $testimonial->testimonial_text }}</p>
                                    <div class="tst-author">
                                        <h4>{{ $testimonial->name }}</h4>
                                        <span>{{ $testimonial->name_description }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

    @if (config('app.nav_chk5'))
        <!-- Section 5: CONTACT -->
        <section id="contact" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">
                    <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
 -->
                    <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="0.4s">
                        <div id="google-map">
                            <iframe src="{{ $section5->map_parameters }}" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">

                        <div class="col-md-12 col-sm-12">
                            <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                                <h2>Contáctenos</h2>
                            </div>
                        </div>

                        <!-- CONTACT FORM -->
                        <form id="email_form" action="{{ route('send_contact_email') }}" method="POST"
                            class="wow fadeInUp" role="form" data-wow-delay="0.8s">
                            @method('POST')
                            @csrf
                            <!-- IF MAIL SENT SUCCESSFUL  // connect this with custom JS -->
                            <h6 class="text-success">Su mensaje fue enviado exitosamente.</h6>

                            <!-- IF MAIL NOT SENT -->
                            <h6 class="text-danger">El correo electrónico y el mensaje deben tener más de un carácter.
                            </h6>

                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nombre completo">
                                @error('name')
                                    <script>
                                        document.location.href = "#contact"
                                    </script>
                                    <div class="text-danger text-center">Valor requerido</div>
                                @enderror
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Dirección de correo electrónico">
                                @error('email')
                                    <script>
                                        document.location.href = "#contact"
                                    </script>
                                    <div class="text-danger text-center">Valor requerido</div>
                                @enderror

                            </div>

                            <div class="col-md-12 col-sm-12">
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Asunto">
                                @error('subject')
                                    <script>
                                        document.location.href = "#contact"
                                    </script>
                                    <div class="text-danger text-center">Valor requerido</div>
                                @enderror

                                <textarea class="form-control" rows="6" id="message" name="message" placeholder="Háblenos de su proyecto"></textarea>
                                @error('message')
                                    <script>
                                        document.location.href = "#contact"
                                    </script>
                                    <div class="text-danger text-center">Valor requerido</div>
                                @enderror
                                <button type="submit" class="form-control">Enviar mensaje</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    @endif

    @if (config('app.nav_chk7'))
        <!-- FOOTER -->
        <footer id="footer" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 col-sm-8">
                        <div class="footer-info">
                            <div class="section-title">
                                <h2 class="wow fadeInUp" data-wow-delay="0.2s">Encuéntrenos</h2>
                            </div>
                            <address class="wow fadeInUp" data-wow-delay="0.4s">
                                {{ $section7->fu_description }}
                            </address>
                        </div>

                        <div class="footer-info">
                            <div class="section-title">
                                <h2 class="wow fadeInUp" data-wow-delay="0.2s">Reservación</h2>
                            </div>
                            <address class="wow fadeInUp" data-wow-delay="0.4s">
                                <p>{{ $section7->rv_number1 }}
                                    @if ($section7->rv_number2)
                                        | {{ $section7->rv_number2 }}
                                    @endif
                                </p>
                                <p><a href="mailto:{{ $section7->rv_email }}">{{ $section7->rv_email }}</a></p>
                                <p>{{ $section7->rv_text }} </p>
                            </address>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-8">
                        <div class="footer-info footer-open-hour"
                            style="background:url({{ '"' . URL::asset('/images/' . $section7->oh_bg_image) . '"' }})">
                            <div class="section-title">
                                <h2 class="wow fadeInUp" data-wow-delay="0.2s">Horario de Apertura</h2>
                            </div>
                            <div class="wow fadeInUp" data-wow-delay="0.4s">
                                <p>{{ $section7->oh_closed }}: Cerrado</p>
                                <div>
                                    <strong>{{ $section7->oh_days1 }}</strong>
                                    <p>{{ $section7->oh_hours1 }}</p>
                                </div>
                                <div>
                                    <strong>{{ $section7->oh_days2 }}</strong>
                                    <p>{{ $section7->oh_hours2 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-8" id="reservation">
                        <h4>Reserve una mesa</h4>
                        <form id="reservation_form" action="{{ route('reservation.store') }}" method="POST">
                            @method('POST')
                            @csrf
                            <input type="text" class="form-control" id="rsv_name" name="rsv_name"
                                placeholder="Nombre">
                            @error('rsv_name')
                                <script>
                                    document.location.href = "#reservation"
                                </script>
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                            <br />

                            <input type="email" class="form-control" id="rsv_email" name="rsv_email"
                                placeholder="correo electrónico">
                            @error('rsv_email')
                                <script>
                                    document.location.href = "#reservation"
                                </script>
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                            <br />

                            <caption>Clientes:</caption>
                            <div class="input-group">
                                <input type="number" name="rsv_quantity" id="rsv_quantity" min="1"
                                    step="1" value="1" style="width: 4.5em;" class="form-control">
                                <input type="date" id="rsv_date" class="form-control" name="rsv_date"
                                    min={{ date('Y-m-d') }} value={{ date('Y-m-d') }} style="width: 8em;">
                                <input type="time" id="rsv_time" class="form-control" name="rsv_time"
                                    value={{ date('H:i') }} style="width: 6em;">
                            </div>
                            <br />
                            <input type="submit" class="btn-danger form-control" value="Reservar">
                        </form>
                    </div>
    @endif


    <div class="col-md-2 col-sm-4">
        <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
            @foreach ($social_networks as $scl_ntwrk)
                <li>
                    <a href="{{ $scl_ntwrk->url }}" target="_blank">
                        <img class='img-sm img-responsive img-thumbnail img-circle wow fadeInUp p-3' width="30"
                            height="30" src="{{ URL::asset('/images/' . $scl_ntwrk->image) }}" />
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="wow fadeInUp copyright-text" data-wow-delay="0.8s">
            <p><br>{{ $footer->symbol }} {{ $footer->year }} <br>{{ $footer->owner }}

                <br><br>{{ $footer->other_details }}<a rel="nofollow" href={{ $footer->link }}
                    target="_parent">{{ $footer->name_link }}</a>
            </p>
        </div>
    </div>

    </div>
    </div>
    </footer>


    <!-- SCRIPTS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/custom.js"></script>

    {{-- Valida formulario de contacto --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("email_form").addEventListener('submit', validarFormulario);
        });

        function validarFormulario(evento) {
            evento.preventDefault();

            if (document.getElementById('name').value.length == 0) {
                document.getElementById('name').className = 'form-control border border-danger';
                document.getElementById('name').placeholder = '--- Valor requerido ---';
                document.getElementById('name').focus();
                return;
            }

            /*valida formato de email*/
            var exp_email = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if ((document.getElementById('email').value.length == 0) || !((
                    exp_email.test(document.getElementById(
                            'email')
                        .value)))) {
                document.getElementById('email').className = 'form-control border border-danger';
                document.getElementById('email').placeholder = '--- Correo electrónico válido requerido ---';
                document.getElementById('email').focus();
                return;
            }

            if (document.getElementById('subject').value.length == 0) {
                document.getElementById('subject').className = 'form-control border border-danger';
                document.getElementById('subject').placeholder = '--- Valor requerido ---';
                document.getElementById('subject').focus();
                return;
            }

            if (document.getElementById('message').value.length == 0) {
                document.getElementById('message').className = 'form-control border border-danger';
                document.getElementById('message').placeholder = '--- Valor requerido ---';
                document.getElementById('message').focus();
                return;
            }

            this.submit();
        }
    </script>

</body>

</html>
