@extends('Layout.Base')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome Aamir</h3>
                    <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span
                            class="text-primary">3 unread alerts!</span></h6>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button classA="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                <a class="dropdown-item" href="#">January - March</a>
                                <a class="dropdown-item" href="#">March - June</a>
                                <a class="dropdown-item" href="#">June - August</a>
                                <a class="dropdown-item" href="#">August - November</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card position-relative">
                <div class="card-body">
                    <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2"
                        data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                        <div class="ml-xl-12 mt-12">
                                            <img src="{{ asset('assets/img/logo.png') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <p class="card-title">KETENTUAN UMUM</p>
                        <p>1. PDAM adalah Perusahaan Daerah Air Minum selanjutnya disingkat PDAM merupakan Badan Usaha
                            milik Pemerintahan Kabupaten Donggala yang bergerak dibidang pelayanan air minum.</p>
                        <p>2. Air minum adalah air yang diproduksi oleh PDAM</p>
                        <p>3. Pelanggan adalah perorangan atau Badan yang memanfaatkan air produksi PDAM dan terdaftar
                            sebagai pelanggan.</p>
                        <p>4. Biaya usaha adalah total biaya untuk menghasilkan air minum yang mencakup biaya sumber
                            air, biaya pengolah air, biaya transmisi dan distribusi, biaya kemitraan, biaya umum dan
                            administrasi.</p>
                        <p>5. Biaya Dasar adalah biaya usaha dibagi volume air terproduksi dikurangi volume kehilangan
                            air standar.</p>
                        <p>6. Tarif air minum PDAM yang selanjutnya disebut tarif adalah kebijakan biaya jasa layanan
                            air minum yang ditetapkan Kepala Daerah untuk pemakaian setiap meter kubik (M3) atau satuan
                            volume lainnya yang diberikan PDAM yang wajib dibayar oleh pelanggan.</p>
                        <p>7. tarif rendah adalah tarif bersubsidi yang nilainya lebih rendah dibandingkan biaya dasar.
                        </p>
                        <p>8. Tarif dasar adalah tarif yang nilainya sama atau ekuivalen dengan biaya dasar.</p>
                        <p>9. Tarif penuh adalah Tarif yang nilainya lebih tinggi dibandingkan biaya dasar.</p>
                        <p>10. Tarif kesepakatan adalah tarif yang nilainya dihitung berdasarkan kesepakatan antara PDAM
                            dan pelanggan.</p>
                        <p>11. Tarif rata-rata adalah total pendapatan tarif dibagi total volume air terjual.</p>
                        <p>12. Golongan pelanggan adalah klasifikasi pelanggan yang disesuiakan dengan struktur ekonomi
                            masyarakat pengguna air.</p>
                        <p>13. wilayah pelayanan adalah daerah-daerah yang dilayani oleh PDAM kabupaten Donggala,
                            meliputi:</p>
                        <p>a. Wilayah Kota Palu dan Sekitarnya</p>
                        <p>b. Wilayah Kabupaten Donggola</p>
                        <p>c. Wilayah Kab. Parigi Moutong, Meliputi: Kota raya/Kota agung serta Tolai dan Sausu</p>
                        <p>d. Wilayah Kabupaten Sigi, Meliputi Biromaru, marawola, Sambo.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <p class="card-title">DASAR KEBIJAKAN PENETAPAN TARIF</p>
                        <p>Penetapan tarif didasarkan pada prinsip:</p>
                        <p>a. Keterjangkauan dan keadilan, yang dimaksud adalah penetapan tarif untuk standar kebutuhan
                            pokok air minum disesuiakan dengan kemapuan membayar pelanggan yang berpenghasilan sama
                            dengan upah minimum Provinsi, serta tidak melampaui 4% (empat perseratus) dari pendapatan
                            masyarakat pelanggan dan keadilan dalam pengenaan tarif diferesiasi dengan subside silang
                            antar kelompok pelanggan</p>
                        <p>b. Mutu pelayanan; yang menjadi dasar pertimbangan tarif adalah kualitas air, kontinuitas
                            pengaliran air, dan kinerja pelayanan administrasi yang diterima oleh pelanggan dan
                            ditentukan oleh komponen biaya pokok sumber air dan pengolahan, biaya pokok system transmisi
                            / distribusi dan biaya administrasi dalam tarif air minum.</p>
                        <p>c. Pemulihan biaya, secara penuh (full cost recovery) dicapai dari hasil perhitungan tarif
                            rata-rata minimal sama dengan biaya dasar.</p>
                        <p>d. efisiensi pemakaian air, dicapai antara lain melalui penerapan tarif progresif yang
                            diperhitungkan melalui penetapan blok konsumsi</p><br>
                        <p class="card-title">SANKSI</p>
                        <p>1. Denda</p>
                        <p>a. Keterlambatan membayar rekening air dan non air dari jadwal yang telah ditetapkan
                            dikenakan denda sebesar Rp. 4.000; (Empat ribu rupiah) perlembar rekening.</p>
                        <p>b. Dengan sengaja merusak/ memutus segel pengaman water meter atau merubah posisi Water yang
                            terpasang dikenakan denda sebesar Rp. 30.000,</p>
                        <p>c. Pelanggan yang terkena pemutusan sementara dikenakan denda pemutusan sebesar Rp. 25.000.
                        </p>
                        <p>d. Dengan sengaja mencuri atau menyedot langsung air ari pipa PDAM atau menyambung langsung
                            tanpa melalui water meter dikenakan denda sebesar 5 x 50m3 x tarif menurut golongan x bulan
                            selama pemakaian.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection