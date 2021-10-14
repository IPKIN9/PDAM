<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        @media print {
            @page {
                size: landscape
            }
        }

        body {
            font-family: "Lucida Console", "Courier New", monospace;
        }

        .page {
            height: 410px;
            width: 100%;
            border: 1px solid black;
        }

        .center {
            margin: auto;
            padding: 10px;
        }

        .column {
            float: left;
            width: 50%;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* batas */
        .row h1 {
            font-size: 14pt;
            font-weight: bold;
            color: rgb(107, 107, 107);
        }

        h3 {
            color: rgb(107, 107, 107);
            font-weight: bold;
            text-align: center;
            letter-spacing: 1px;
            width: 100%;
        }

        .center-text {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .mt-1 {
            margin-top: 5px;
        }

        .mt-2 {
            margin-top: 15px;
        }

        .mt-5 {
            margin-top: 50px;
        }

        .mr-2 {
            margin-right: 5px;
        }

        .col-2 {
            float: left;
            width: 12%;
        }

        .col-1 {
            float: left;
            width: 10%;
        }

        .col-4 {
            float: left;
            width: 30%;
        }

        .bold {
            font-weight: bold;
            color: rgb(107, 107, 107);
        }
    </style>
    <title>Struk printing</title>
</head>

<body>
    <div class="page center">
        <div class="row">
            <div style="width: 5%; float: left; margin-left: 5px; margin-right: 10px;">
                <img src="paper/image/logo.png" alt="" style="height: 50px; margin-top: 8px;">
            </div>
            <div style="width: 80%; float: left;">
                <h1>
                    PERUSAHAAN DAERAH AIR MINUM (PDAM) <br> KABUPATEN DONGGALA
                </h1>
            </div>
        </div>
        <hr>
        <div class="row bold" style="margin-top: 20px;">
            <h3>
                BUKTI PELUNASAN REKENING AIR PDAM
            </h3>
            <div class="row center-text">
                <div class="column text-right bold" style="margin-left: -25px;">
                    <div>LOKET</div>
                    <div>UNIT</div>
                </div>
                <div class="column text-left">
                    <div>: OGOAMAS</div>
                    <div>: OGOAMAS</div>
                </div>
            </div>
        </div>
        <hr class="mt-2">
        <div class="row mt-2 bold" style="margin-left: 50px; font-size: 10pt;">
            <div class="col-2">
                <div class="mt-1">NO.SAMBUNGAN</div>
                <div class="mt-1">NAMA</div>
                <div class="mt-1">ALAMAT</div>
                <div class="mt-1">GOLONGAN</div>
                <div class="mt-1">PEMAKAIAN</div>
            </div>
            <div class="col-4">
                <div class="mt-1">: {{$data->pelanggan_role->bangunan_role->no_sambungan}} | {{$data->periode}}</div>
                <div class="mt-1">: {{$data->pelanggan_role->nama}}</div>
                <div class="mt-1">: {{$data->pelanggan_role->alamat}}</div>
                <div class="mt-1">: {{$data->pelanggan_role->golongan_role->golongan}}</div>
                <div class="mt-1">: {{$data->pemakaian_role->jumlah_pemakaian}} M<sup>3</sup></div>
            </div>
            <div class="col-2" style="margin-left: -25px; margin-top: 8px;">
                <div class="mt-1">1 - 10 M<sup>3</sup></div>
                <div class="mt-1">> 10 M<sup>3</sup></div>
            </div>
            <div class="col-2" style="border-right: 3px solid rgb(107, 107, 107); margin-right: 30px; margin-top: 8px;">
                <div class="mt-1">: @currency($data->pelanggan_role->detail_role->blok_1)</div>
                <div class="mt-1">: @currency($data->pelanggan_role->detail_role->blok_2)</div>
            </div>
            <div class="col-1">
                <div class="mt-1">HARGA AIR</div>
                <div class="mt-1">ADM</div>
                <div class="mt-1">DENDA</div>
                <div class="mt-1">PPA</div>
            </div>
            <div class="col-2" style="margin-left: 15px;">
                <div class="mt-1">: @currency($data->tarif_air)</div>
                <div class="mt-1">: @currency($data->adm)</div>
                <div class="mt-1">: @currency($data->denda)</div>
                <div class="mt-1">: @currency($data->ppa)</div>
            </div>
        </div>
        <div class="row center-text mt-5 bold" style="margin-left: 50px; font-size: 10pt;">
            <div class="column text-left" style="width: 25%;">TANGGAL BAYAR : {{$data->tgl_pembayaran}}</div>
            <div class="column text-left" style="width: 45%;">PETUGAS LOKET : {{$data->user_role->name}}</div>
            <div class="column text-left" style="width: 30%;">JUMLAH : @currency($data->total)</div>
        </div>
    </div>
</body>

</html>