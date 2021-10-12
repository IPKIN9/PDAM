<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Selamat Datang</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('web/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('web/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/templatemo-onix-digital.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/owl.css') }}">
    <!--

TemplateMo 565 Onix Digital

https://templatemo.com/tm-565-onix-digital

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="" class="logo">
                            <img src="{{ asset('web/assets/images/logo.png') }}">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#services">Layanan</a></li>
                            <li class="scroll-to-section"><a href="#about">Tentang</a></li>
                            <li class="scroll-to-section"><a href="#contact-sec">Pengaduan</a></li>
                            <li class="scroll-to-section">
                                <div class="main-red-button-hover"><a href="#regist">DAFTAR</a></div>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="owl-carousel owl-banner">
                                <div class="item header-text">
                                    <h6>Selamat Datang Di Website PDAM</h6>
                                    <h2>Perusahaan Daerah<em> Air</em><span> Minum</span></h2>
                                    <small>Cabang OGOAMAS</small>
                                    <p>Air minum berkualitas langsung dari mata air pilihan. Disempurnakan dengan
                                        teknologi terbaru agar dapat menghasilkan air yang siap pakai</p>
                                    <div class="down-buttons">
                                        <div class="main-blue-button-hover">
                                            <a href="#regist" style="color: white;">Pemasangan Baru</a>
                                        </div>
                                        <div class="call-button">
                                            <a href="#"><i class="fa fa-phone"></i> @if ($data['tentang'] == null)
                                                Data kosong
                                                @else
                                                {{$data['tentang']->hp}}
                                                @endif</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="our-services section">
        <div class="services-right-dec">
            <img src="{{ asset('web/assets/images/services-right-dec.png') }}" alt="">
        </div>
        <div class="container">
            <div class="services-left-dec">
                <img src="{{ asset('web/assets/images/services-left-dec.png') }}" alt="">
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Kami <em>Mengutamakan</em> Pelanggan Dengan <span>Pelayanan Maksimal</span></h2>
                        <span>Pelayanan Kami</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-services">
                        <div class="item">
                            <h4>Paket Lengkap dan Murah</h4>
                            <div class="icon"><img src="{{ asset('web/assets/images/service-icon-01.png') }}" alt="">
                            </div>
                            <p>Berbagai paket yang tersedia dengan harga yang terjangkau</p>
                        </div>
                        <div class="item">
                            <h4>Pelayanan Lebih Cepat</h4>
                            <div class="icon"><img src="{{ asset('web/assets/images/service-icon-02.png') }}" alt="">
                            </div>
                            <p>Pelanggan adalah hal yang utama. Kami memprioritaskan pelanggan</p>
                        </div>
                        <div class="item">
                            <h4>Layanan Dengan Website</h4>
                            <div class="icon"><img src="{{ asset('web/assets/images/service-icon-03.png') }}" alt="">
                            </div>
                            <p>Pelayanan melalui website kini telah dibuka. Daftar sekarang</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-image">
                        <img src="{{ asset('web/assets/images/about-left-image.png') }}"
                            alt="Two Girls working together">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Tetap sehat dengan memperhatikan penggunaan <em>AIR</em> <span>BERSIH</span></h2>
                        <p>@if ($data['tentang'] == null)
                            Data kosong
                            @else
                            {{$data['tentang']->des}}
                            @endif.</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="fact-item">
                                    <div class="count-area-content">
                                        <div class="icon">
                                            <img src="{{ asset('web/assets/images/service-icon-01.png') }}" alt="">
                                        </div>
                                        @if ($data['c_bangunan'] == null)
                                        <div class="count-digit">0</div>
                                        @else
                                        <div class="count-digit">{{$data['c_bangunan']}}</div>
                                        @endif
                                        <div class="count-title">Rumah</div>
                                        <p>Jumlah rumah yang menggunakan PDAM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="fact-item">
                                    <div class="count-area-content">
                                        <div class="icon">
                                            <img src="{{ asset('web/assets/images/service-icon-03.png') }}" alt="">
                                        </div>
                                        @if ($data['c_pelanggan'] == null)
                                        <div class="count-digit">0</div>
                                        @else
                                        <div class="count-digit">{{$data['c_pelanggan']}}</div>
                                        @endif
                                        <div class="count-title">Pelanggan</div>
                                        <p>Jumlah warga yang berlangganan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="pricing" class="pricing-tables">
        <div class="tables-left-dec">
            <img src="{{ asset('web/assets/images/tables-left-dec.png') }}" alt="">
        </div>
        <div class="tables-right-dec">
            <img src="{{ asset('web/assets/images/tables-right-dec.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Pilih Paket Yang <em>Anda</em> Inginkan</h2>
                        <span>Paket Kami</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="item first-item">
                        <h4>Peket</h4>
                        <span>STANDAR</span>
                        <ul>
                            <li>Pemasangan 1 Hari</li>
                            <li>Air Mengalir Lancar</li>
                            <li>Kuota Hingga 20 Kubik Air</li>
                            <li>Layanan Penuh</li>
                        </ul>
                        <div class="main-blue-button-hover">

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="item second-item">
                        <h4>Paket</h4>
                        <span>MEDIUM</span>
                        <ul>
                            <li>Pemasangan 1-2 Hari</li>
                            <li>Air Mengalir Lancar</li>
                            <li>Kuota Hingga 30 Kubik Air</li>
                            <li>Layanan Penuh</li>
                        </ul>
                        <div class="main-blue-button-hover">

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="item third-item">
                        <h4>Paket</h4>
                        <span>KHUSUS</span>
                        <ul>
                            <li>Pemasangan Cukup Lama</li>
                            <li>Air Mengalir Lancar</li>
                            <li>Kuota Hingga 100 Kubik Air</li>
                            <li>Layanan Penuh</li>
                        </ul>
                        <div class="main-blue-button-hover">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="regist">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-11">
                        <form id="contact" action="{{route('permintaan.insert')}}" method="post">
                            @csrf
                            <div class="row ml-5">
                                @if (session('status'))
                                <div class="alert alert-primary">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <h4 class="mb-2">Formulir Pendaftaran</h4>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="name" name="nama" id="nama" placeholder="Nama Lengkap"
                                            autocomplete="off" required>
                                        @error('nama')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="text" name="alamat" id="alamat" placeholder="Alamat"
                                            autocomplete="off" required>
                                        @error('alamat')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Kirim
                                            Permintaan</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="subscribe" class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <h2>Cek Informasi Tagihan</h2>
                                <form id="subscribe" action="" method="get">
                                    <input type="text" name="nama" id="website" placeholder="Masukan Nama" required="">
                                    <input type="text" name="kode_bangunan" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Kode Bangunan" required="">
                                    <button type="submit" id="form-submit" class="main-button ">Periksa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="contact-trd"></div>
    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-heading">
                        <h2>Punya Kendala? <em>Masukan</em> Pengaduan Anda pada <span>FORMULIR</span></h2>
                        <div id="map">
                            <iframe width="600" height="400" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=Pdam%20ogoamas&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                            </iframe>
                        </div>
                        <div class="info">
                            @if ($data['tentang'] == null)
                            <span><i class="fa fa-phone"></i> <a href="#">Whatsapp<br></a></span>
                            <span><i class="fa fa-envelope"></i> <a href="#">Email<br></a></span>
                            @else
                            <span><i class="fa fa-phone"></i> <a
                                    href="#">Whatsapp<br>{{$data['tentang']->wa}}</a></span>
                            <span><i class="fa fa-envelope"></i> <a
                                    href="#">Email<br>{{$data['tentang']->email}}</a></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <form id="contact" action="{{route('pengaduan.insert')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                @if (session('status'))
                                <div class="alert alert-primary">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <fieldset>
                                    <input type="text" name="nama" placeholder="Nama Lengkap" autocomplete="off"
                                        required>
                                    @error('nama')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="no_telpon" placeholder="Nomor Telepon" autocomplete="off"
                                        required>
                                    @error('no_telpon')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <select name="kerusakan" id="kerusakan">
                                        <option value="" selected disabled style="color: #afafaf;">-- Jenis Keluhan --
                                        </option>
                                        <option value="Pipa Bocor">Pipa Bocor</option>
                                        <option value="Air Kecil">Air Kecil</option>
                                        <option value="Air Kotor">Air Kotor</option>
                                        <option value="Air Keruh">Air Keruh</option>
                                        <option value="Meter Bocor">Meter Bocor</option>
                                        <option value="Air Tidak Keluar">Air Tidak Keluar</option>
                                        <option value="Segel Rusak/Tidak ada">Segel Rusak/Tidak ada</option>
                                        <option value="Angka Meter bacaan tidak sesuai">Angka Meter bacaan tidak sesuai
                                        </option>
                                        <option value="Meter air macet">Meter air macet</option>
                                        <option value="Meter air rusak">Meter air rusak</option>
                                        <option value="Meter air lumut">Meter air lumut</option>
                                        <option value="Meter air pecah">Meter air pecah</option>
                                        <option value="Meter air buram">Meter air buram</option>
                                        <option value="Stop keran rusak">Stop keran rusak</option>
                                        <option value="Instalasi Persil bocor">Instalasi Persil bocor</option>
                                        <option value="Instalasi Persil terseumbat">Instalasi Persil terseumbat</option>
                                        <option value="Pipa Hydrant">Pipa Hydrant</option>
                                        <option value="Valve">Valve</option>
                                        <option value="Pipa dinas bocor">Pipa dinas bocor</option>
                                        @error('kerusakan')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <p>Keluhan Anda</p>
                                    <textarea name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
                                    @error('keterangan')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-button">Kirim Formulir</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="contact-dec">
            <img src="{{ asset('web/assets/images/contact-dec.png') }}" alt="">
        </div>
        <div class="contact-left-dec">
            <img src="{{ asset('web/assets/images/contact-left-dec.png') }}" alt="">
        </div>
    </div>

    <div class="footer-dec">
        <img src="{{ asset('web/assets/images/footer-dec.png') }}" alt="">
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="about footer-item">
                        <div class="logo">
                            <a href="#"><img src="{{ asset('web/assets/images/logo.png') }}"
                                    alt="Onix Digital TemplateMo"></a>
                        </div>
                        <a href="#">@if ($data['tentang'] == null)
                            Data kosong
                            @else
                            {{$data['tentang']->email}}
                            @endif</a>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6" style="margin-top: -50px; margin-bottom: 50px;">
                    <div class="copyright">
                        <p>Copyright © 2021 Onix Digital Co., Ltd. All Rights Reserved.
                            <br>
                            Designed by <a rel="nofollow" href="https://templatemo.com"
                                title="free CSS templates">TemplateMo</a><br>
                            Distributed by <a href="https://themewagon.com">Themewagon</a>
                            <br>
                            use by <code>MASSOGIS TEAM</code>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3" style="text-align: right;">
                    <div class="services footer-item">
                        <h4>Services</h4>
                        <ul>
                            <li><a href="#">SEO Development</a></li>
                            <li><a href="#">Business Growth</a></li>
                            <li><a href="#">Social Media Managment</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('web/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('web/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('web/assets/js/animation.js') }}"></script>
    <script src="{{ asset('web/assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('web/assets/js/custom.js') }}"></script>

    <script>
        // Acc
    $(document).on("click", ".naccs .menu div", function() {
      var numberIndex = $(this).index();

      if (!$(this).is("active")) {
          $(".naccs .menu div").removeClass("active");
          $(".naccs ul li").removeClass("active");

          $(this).addClass("active");
          $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

          var listItemHeight = $(".naccs ul")
            .find("li:eq(" + numberIndex + ")")
            .innerHeight();
          $(".naccs ul").height(listItemHeight + "px");
        }
    });
    </script>
</body>

</html>