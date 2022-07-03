<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon/lungo.png') }}" type="image/png">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="{{ asset('./vendor/depan/assets/css/swiper-bundle.min.css') }}">

        <!--=============== CSS ===============-->
        <script src="https://kit.fontawesome.com/ad6395cc9e.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('./vendor/depan/assets/css/styles.css') }}">
        <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">
        {{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script src="{{asset('assets/js/toastr.min.js')}}"></script>

        <title>Lungo.</title>
    </head>
    <body>

        <header class="header" id="header">
            <nav class="nav container">
                <a href="{{ url('/') }}" class="nav__logo">Lungo.</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="{{ url('/') }}" class="nav__link ">Home</a>
                        </li>
                              <li class="nav__item">
                            <a href=" #video" class="nav__link ">Video</a>
                        </li>
                       

                        @guest
                        <li class="nav__item">
                            <a href="{{ route('login') }}" class="nav__link">Login</a>
                        </li>
                        @else
                        @if(auth()->check()&& auth()->user()->role->id != 5)
                        <li class="nav__item">
                            <a href="{{ route('dashboard') }}" class="nav__link">Dashboard</a>
                        </li>
                        @else
                        <li class="nav__item">
                            <a href="{{ route('pesananku') }}" class="nav__link">Pesananku</a>
                        </li>
                        @endif
                        <li class="nav__item">
                            <a href="{{ url('/profile') }}" class="nav__link">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ route('logout') }}" class="nav__link"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();" >
                              <i class="fas fa-power-off"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf

                            </form>

                        </li>
                        @endguest
                    </ul>

                    <div class="nav__dark">
                        <!-- Theme change button -->
                        <span class="change-theme-name">Dark mode</span>
                        <i class="ri-moon-line change-theme" id="theme-button"></i>
                    </div>

                    <i class="ri-close-line nav__close" id="nav-close"></i>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-function-line"></i>
                </div>
            </nav>
        </header>

        <main class="main">
            {!! Toastr::message() !!}
            <!--==================== HOME ====================-->
            <section class="home" id="home">
                @if($tempat->image2==null)
                <img src=" {{ asset('./vendor/depan/assets/img/213.jpg') }}" alt="" class="home__img">
                @else
                <img src="{{asset('images')}}/{{$tempat->image2}}" alt="" class="home__img">
                @endif
                <div class="home__container container grid">
                    <div class="home__data">
                        <span class="home__data-subtitle">Temukan liburan Anda di</span>
                        <h1 class="home__data-title">{{ $tempat->name }}<br> <b>{{ $tempat->alamat }}</b></h1>
                        @if(count($wahana)>0)
                        <a href="#wahana" class="button">Wahana</a>
                        @endif
                        @if(count($camp1)>0)
                        <a href="#camp" class="button">Camping</a>
                        @endif
                        @if(count($ez)>0)
                        {{-- <a href="#place" class="button">Disekitar</a> --}}
                        @endif
                    </div>

                    <div class="home__social">
                        <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                            <i class="ri-facebook-box-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                            <i class="ri-instagram-fill"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="home__social-link">
                            <i class="ri-twitter-fill"></i>
                        </a>
                    </div>
                    <?php
                    $kegi = App\Models\Kegiatan::where('tempat_id',$tempat->id)->where('status',1)->count();
                    ?>
                    @if($kegi>0)
                    <div class="home__info">
                        <div>
                            <?php
                            $keg= App\Models\Kegiatan::where('tempat_id',$tempat->id)->where('status',1)->first();
                            ?>
                            <span class="home__info-title">Event di {{ $tempat->name }} </span>

                            <a href="{{ url('/event',[$tempat->name]) }}" class="button button--flex button--link home__info-button">
                                More <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>

                        <div class="home__info-overlay">
                            <img src="{{asset('images')}}/{{$keg->image}}" alt="" class="home__info-img">
                        </div>
                    </div>
                    @endif


                </div>
            </section>

            <!--==================== EXPERIENCE ====================-->
                <section class="experience section">
                {{-- <h2 class="section__title"> {{ $tempat->name }}  <br> </h2> --}}
                @if($tempat->htm==0 || $tempat->htm==null)

                @else
                <form action="{{url('/cart/tambah/tiket/'.$tempat->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tempat_id"  value="{{  $tempat->id }}">
                    <input type="hidden" name="kategori"  value="tiket">
                    <h2 class="section__title">Beli berapa tiket ?</h2>

                    <h2 class="section__title"><input name="jml_orang" type="number" class="form-control" id="jml_orang" placeholder="Jumlah Orang"  min="1" required>  Rp. {{ number_format($tempat->htm)}}/tiket</h2>

                    <h5 class="section__title">
                        <button  class="button" type="submit">
                       {{-- Reserve Place --}}
                       Pesan Tiket
                    </button>
                    </h5>






                </form>
                @endif
                <div class="experience__container container grid">
                    <div class="experience__content grid">
                        <div class="experience__data">
                            <h2 class="experience__number">{{App\Models\Tempat::where('induk_id', $tempat->id)->where('kategori','wisata')->count()}}+</h2>
                            <span class="experience__description">Tempat <br> Wisata</span>
                        </div>
                        <div class="experience__data">
                            <h2 class="experience__number">{{App\Models\Tempat::where('induk_id', $tempat->id)->where('kategori','kuliner')->count()}}+</h2>
                            <span class="experience__description">Tempat <br> Kuliner</span>
                        </div>

                        <div class="experience__data">
                            <h2 class="experience__number">{{App\Models\Tempat::where('induk_id', $tempat->id)->where('kategori','hotel')->count()}}+</h2>
                            <span class="experience__description">Tempat <br> Penginapan</span>
                        </div>


                    </div>


                </div>
            </section>



            <!--==================== ABOUT ====================-->
            <!--<section class="about section" id="camp">-->
            <!--    <div class="about__container container grid">-->
            <!--        <div class="about__data">-->
            <!--            <h2 class="section__title about__title">  {{ $tempat->name }}<br> </h2>-->
            <!--            <p class="about__description"> {{ $tempat->deskripsi }}-->
            <!--            </p>-->
            <!--            <a href="#place" class="button">Disekitar</a>-->

            <!--        </div>-->

            <!--        <div class="about__img">-->

            <!--            {{-- <div class="about__img-overlay">-->
            <!--                <img src="{{ asset('./vendor/depan/assets/img/camping.jpg') }}" alt="" class="about__img-one">-->
            <!--            </div> --}}-->

            <!--            <div class="about__img-overlay">-->
            <!--                <img src="{{ asset('./vendor/depan/assets/img/camping.jpg') }}" alt="" class="about__img-two">-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</section>-->





            @if(!$tempat->video == null)
            <!--==================== VIDEO ====================-->
            <section class="video section" id="video">
                <h2 class="section__title">Video Tour</h2>

                <div class="video__container container">
                    <p class="video__description">Cari tahu lebih lanjut dengan video kami ini dan cari
                        tempat yang menyenangkan untuk Anda dan keluarga.
                    </p>

                    <div class="video__content">
                        <video id="video-file">

                            {{-- <source src="https://www.youtube.com/watch?v=zJNIFyVAmQw" type="video/mp4"> --}}
                            <source src="{{ asset('videos') }}/{{$tempat->video}}" type="video/mp4">
                            {{-- <source src="{{ asset('./vendor/depan/assets/video/video.mp4') }}" type="video/mp4"> --}}
                        </video>

                        <button class="button button--flex video__button" id="video-button">
                            <i class="ri-play-line video__button-icon" id="video-icon"></i>
                        </button>
                    </div>
                </div>
            </section>
            @else
            <section class="video section" id="video">
                {{-- <h2 class="section__title">Video Tour</h2> --}}

                <div class="video__container container">
                    {{-- <p class="video__description">Cari tahu lebih lanjut dengan video kami ini dan cari
                        tempat yang menyenangkan untuk Anda dan keluarga.
                    </p> --}}

                    <div class="video__content">
                        <video id="video-file">
                            {{-- <source src="{{ asset('./vendor/depan/assets/video/video.mp4') }}" type="video/mp4"> --}}
                        </video>

                        <button class="button button--flex video__button" id="video-button" type="hidden">

                        </button>
                    </div>
                </div>
            </section>
            @endif






            <!--==================== KULINER ====================-->
          
            @if(count($ez)>0)
            <section class="place section" id="place">
                <h2 class="section__title">Tempat di {{ $tempat->name }}</h2>
                <div class="place__container container grid">

                    @foreach($ez as $key=>$tempat2)
                    <!--==================== PLACES CARD 1 ====================-->
                    <div class="place__card">
                        <img src="{{asset('images')}}/{{$tempat2->image}}" alt="" class="place__img">

                        <div class="place__content">
                            <span class="place__rating">
                                <i class="ri-star-line place__rating-icon"></i>
                                <!--<span class="place__rating-number">4,8</span>-->
                            </span>

                            <div class="place__data">
                                <h3 class="place__title">{{ $tempat2->name }}</h3>
                                {{-- <span class="place__subtitle">{{ $tempat2->kategori }}</span> --}}
                                <span class="place__price">{{ $tempat2->kategori }}</span>
                            </div>
                        </div>
                        <a href="{{ url('./'.$tempat2->kategori.'/'.$tempat2->slug) }}">
                            <button  class="button button--flex place__button">
                                   <i class="ri-arrow-right-line"></i>
                            </button>
                            </a>

                    </div>
                    @endforeach

                </div>
            </section>
            @endif
            <!--==================== HOTEL ====================-->
            {{-- <section class="place section" id="penginapan">
                <h2 class="section__title">Penginapan Disekitar {{ $tempat->name }}</h2>
                <div class="place__container container grid">
                    @if(count($penginapan)>0)
                    @foreach($penginapan as $key=>$penginapan)
                    <!--==================== PLACES CARD 1 ====================-->
                    <div class="place__card">
                        <img src="{{asset('images')}}/{{$penginapan->image}}" alt="" class="place__img">

                        <div class="place__content">
                            <span class="place__rating">
                                <i class="ri-star-line place__rating-icon"></i>
                                <span class="place__rating-number">4,8</span>
                            </span>

                            <div class="place__data">
                                <h3 class="place__title">Bali</h3>
                                <span class="place__subtitle">Indonesia</span>
                                <span class="place__price">$2499</span>
                            </div>
                        </div>

                        <button class="button button--flex place__button">
                            <i class="ri-arrow-right-line"></i>
                        </button>
                    </div>
                    @endforeach
                    @endif
                </div>
            </section> --}}

            <!--==================== SUBSCRIBE ====================-->
            {{-- <section class="subscribe section">
                <div class="subscribe__bg">
                    <div class="subscribe__container container">
                        <h2 class="section__title subscribe__title">Subscribe Our <br> Newsletter</h2>
                        <p class="subscribe__description">Subscribe to our newsletter and get a
                            special 30% discount.
                        </p>

                        <form action="" class="subscribe__form">
                            <input type="text" placeholder="Enter email" class="subscribe__input">

                            <button class="button">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </section> --}}
            {{-- <section>

                <div class="about__container container grid">
                    <div class="about__data" >
                {!! $tempat->gmaps !!}
                    </div>
            </div>
            </section> --}}
            <!--==================== SPONSORS ====================-->
            <section class="sponsor section">
                <div class="sponsor__container container grid">
                    <div class="sponsor__content">
                        <img src="{{ asset('./vendor/depan/assets/img/sponsors1.png') }}" alt="" class="sponsor__img">
                    </div>
                    <div class="sponsor__content">
                        <img src="{{ asset('./vendor/depan/assets/img/sponsors4.png') }}" alt="" class="sponsor__img">
                    </div>
                    <div class="sponsor__content">
                        <img src="{{ asset('./vendor/depan/assets/img/sponsors3.png') }}" alt="" class="sponsor__img">
                    </div>
                    <div class="sponsor__content">
                        <img src="{{ asset('./vendor/depan/assets/img/sponsors2.png') }}" alt="" class="sponsor__img">
                    </div>
                </div>


            </section>
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <div class="footer__content grid">
                    <div class="footer__data">
                        <h3 class="footer__title">Lungo.</h3>
                        <p class="footer__description">Kami Membantu <br> wisata anda,
                            dimanapun <br> dan kapanpun.
                        </p>
                        <div>
                            <a href="https://www.facebook.com/" target="_blank" class="footer__social">
                                <i class="ri-facebook-box-fill"></i>
                            </a>
                            <a href="https://twitter.com/" target="_blank" class="footer__social">
                                <i class="ri-twitter-fill"></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" class="footer__social">
                                <i class="ri-instagram-fill"></i>
                            </a>
                            <a href="https://www.youtube.com/" target="_blank" class="footer__social">
                                <i class="ri-youtube-fill"></i>
                            </a>
                        </div>
                    </div>

                    <div class="footer__data">
                        <h3 class="footer__subtitle">Kontak</h3>
                        <ul>
                            <!--<li class="footer__item">-->
                            <!--    <a href="" class="footer__link">+6285882218939</a>-->
                            <!--</li>-->
                            <li class="footer__item">
                                <a href="mailto:emailwatugambir@gmail.com" class="footer__link">emailwatugambir@gmail.com</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Indonesia</a>
                            </li>
                        </ul>
                    </div>




                </div>

                <div class="footer__rights">
                    <p class="footer__copy">&#169; 2021 Lungo. All rigths reserved.</p>
                    <div class="footer__terms">
                        <a href="#" class="footer__terms-link">Terms & Agreements</a>
                        <a href="#" class="footer__terms-link">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>

         <!--========== SCROLL UP ==========-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line scrollup__icon"></i>
        </a>

        <!--=============== SCROLL REVEAL===============-->
        <script src="{{ asset('./vendor/depan/assets/js/scrollreveal.min.js') }}"></script>

        <!--=============== SWIPER JS ===============-->
        <script src="{{ asset('./vendor/depan/assets/js/swiper-bundle.min.js') }}"></script>

        <!--=============== MAIN JS ===============-->
        <script src="{{ asset('./vendor/depan/assets/js/main.js') }}"></script>
    </body>
</html>
