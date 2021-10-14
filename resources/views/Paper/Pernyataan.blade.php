<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id=halaman>
        <h3 id=judul>SURAT PERNYATAAN CALON PELANGGAN <BR> PDAM KABUPATEN DONGGALA</BR></h3>
        <HR>
        </HR>
        <p>Yang bertanda tangan di bawah ini :</p>

        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$data->nama}}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{$data->alamat}}</td>
            </tr>
        </table>

        <p>Dengan ini menyatakan bahwa kami menjadi pelanggan PDAM Kabupaten Donggala maka kami bersedia dan sanggup:
        </p>
        <p>
            1. mematuhi segala peraturan pelaksanaan tarif yang ditetapkan oleh PDAM, termasuk denda, penyegelan dan
            pembongkaran instalasi air PDAM apabila menunggak pembayaran rekening air maupun (non air). <br>
            2. Menjaga keamanan instalasi milik PDAM yang terpasang dirumah kami. <br>
            3. Tidak akan menggunakan pompa pengisap air (dap/sanyo/alkon, dll) untuk menyedot langsung dari pipa PDAM.
            Apabila dikemudian hari ditemukan hal demikian, kami bersedia dikenakan sanksi sesuai ketentuan PDAM dan
            atau PDAM berhak membongkar sambungan air kami, baik dengan ataupun tanpa pemberitahuan. <br>
            4. Jika terjadi pelonjakan pemakaian air akibat kebocoran instalasi air kami, adalah menjadi tanggung jawab
            kami sebagai pelanggan. <br>
            5. mengganti sesuai standard PDAM terhadap peralatan instalasi air/ meter air yang hilang ataupun rusak
            sebelum umur teknis habis. <br>
            6. Jika dikemudian hari terjadi sengketa lahan yang mengakibatkan pipa PDAM dibongkar, maka hal tersebut
            diluar tanggung jawab PDAM. <br>
            7. Setuju bila tertier atau pipa dinas yang kami biayai menjadi milik PDAM dan PDAM berhak mengembangkat
            untuk SR. <br>
            8. Tidak keberatan atau menuntut apabila dikemudian hari terjadi gangguan/kemacetan pada jaringan pipa yang
            mensuplay air sambungan rumah kami yang disebabkan karena gangguan teknis maupun karena debit air yang
            kecil/berkurang. <br>
            9. Menyiapkan/membuat bak penampung air, dan menampung air guna mengantisipasi jika terjadi gangguan suplay
            air.
        </p>

        <div style="width: 40%; text-align: left; float: right;">Ogogamas, {{date('d-M-Y')}}</div><br>
        <div style="width: 40%; text-align: left; float: right;">Yang bertanda tangan,</div><br><br><br><br><br>
        <div style="width: 40%; text-align: left; float: right;">{{$data->nama}}</div>

    </div>
</body>


</body>

</html>