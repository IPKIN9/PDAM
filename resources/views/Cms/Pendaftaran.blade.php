@extends('Layout.Base')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#table">Tabel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#form">Formulir</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="table" class="tab-pane active card"><br>
                    <div class="card-body">
                        @if ($errors->any())
                        <p class="text-danger">Periksa apakah formulir terisi semua</p>
                        @endif
                        <h3 class="">Data Pelanggan</h3>
                        <p class="card-description">
                            Harap diperhatikan formulir tidak boleh kosong saat melakukan pengeditan data
                            <code>PELANGGAN</code>
                        </p>
                        <div class="table-responsive pt-3">
                            <table id="tabel-daftar" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Pernyataan</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no =1;
                                    @endphp
                                    @foreach ($data['pelanggan'] as $d)
                                    <tr>
                                        <td style="width: 30px;">{{$no++}}</td>
                                        <td>{{$d->nama}}</td>
                                        <td>{{$d->alamat}}</td>
                                        <td>{{$d->status}}</td>
                                        <td style="width: 15px;">
                                            <a href="printDataPernyataan/{{$d->id}}"
                                                class="btn btn-info btn-rounded btn-icon">
                                                <i style="margin-left: -3px; padding-top: 11px;"
                                                    class="fas fa-print"></i>
                                            </a>
                                        </td>
                                        <td class="text-center" style="width: 100px;">
                                            <button data-id="{{$d->id}}" type="button" id="detail-data"
                                                class="btn btn-secondary btn-rounded btn-icon">
                                                <i class="fas fa-info"></i>
                                            </button>
                                            <button data-id="{{$d->id}}" type="button" id="hapus-data"
                                                class="btn btn-danger btn-rounded btn-icon">
                                                <i style="margin-left: -2px;" class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="form" class="tab-pane fade card"><br>
                    <div class="card-body mt-2">
                        <div class="row ml-3 mr-3">
                            <h4 class="card-title">Formulir Penambahan Data Baru</h4>
                        </div>
                        <div class="row ml-3 mr-3">
                            <div class="col-md-12">
                                <form class="form-sample" action="{{route('daftar.create')}}" method="POST">
                                    @csrf
                                    <p class="card-description">
                                        Data Pelanggan
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-9">
                                                    <input name="nama" type="text"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert Here">
                                                    @error('nama')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input name="alamat" type="text"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert Here">
                                                    @error('alamat')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">RT / RW</label>
                                                <div class="col-sm-9">
                                                    <input name="rt_rw" type="text"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert Here">
                                                    @error('rt_rw')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kecamatan</label>
                                                <div class="col-sm-9">
                                                    <input name="kecamatan" type="text"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert Here">
                                                    @error('kecamatan')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kabupaten</label>
                                                <div class="col-sm-9">
                                                    <input name="kabupaten" type="text"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert Here">
                                                    @error('kabupaten')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">No. Pendaftaran</label>
                                                <div class="col-sm-9">
                                                    <input name="no_pendaftaran" type="text"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert Here">
                                                    @error('no_pendaftaran')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Alamat Sambungan</label>
                                                <div class="col-sm-9">
                                                    <input name="alamat_sambungan" type="text"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert Here">
                                                    @error('alamat_sambungan')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jumlah Penghuni</label>
                                                <div class="col-sm-9">
                                                    <input name="jumlah_penghuni" type="number"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert Here">
                                                    @error('jumlah_penghuni')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-description mt-5">
                                        Pilih Paket Langganan
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label"><code>Golongan</code></label>
                                                <div class="col-sm-9">
                                                    <select name="id_golongan" class="form-control form-control-sm mt-2"
                                                        id="id-golongan">
                                                        <option selected disabled>- Select -</option>
                                                        @foreach ($data['golongan'] as $d)
                                                        <option value="{{$d->id}}">{{$d->golongan}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_golongan')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label"><code>Sub Golongan</code></label>
                                                <div class="col-sm-9">
                                                    <select name="id_detail_golongan"
                                                        class="form-control form-control-sm mt-2" id="id-sub-golongan">
                                                        <option selected disabled>- Select -</option>
                                                    </select>
                                                    @error('id_detail_golongan')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="card-description mt-5">
                                        Detail Bangunan
                                    </p>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">No. Sambungan</label>
                                                <div class="col-sm-9">
                                                    <input name="no_sambungan" type="text"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert here">
                                                    @error('no_sambungan')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Luas Tanah M <sup>3</sup></label>
                                                <div class="col-sm-9">
                                                    <input name="luas_tanah" type="text"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert here">
                                                    @error('luas_tanah')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jenis Bangunan</label>
                                                <div class="col-sm-9">
                                                    <input name="jenis_bangunan" type="text"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert here">
                                                    @error('jenis_bangunan')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Status Bangunan</label>
                                                <div class="col-sm-9">
                                                    <input name="status_bangunan" type="text"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert here">
                                                    @error('status_bangunan')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Perumahan Sambungan</label>
                                                <div class="col-sm-9">
                                                    <input name="perumahan_sambungan" type="text"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert here">
                                                    @error('perumahan_sambungan')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Sumber Air</label>
                                                <div class="col-sm-9">
                                                    <input name="sumber_air" type="text"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert here">
                                                    @error('sumber_air')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Pernah Jadi Pelanggan
                                                    Sebelumnya?</label>
                                                <div class="form-check mr-5 mt-3">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="pmj"
                                                            id="pmj-true" value="true">
                                                        Ya
                                                        <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check mt-3">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="pmj"
                                                            id="pmj-false" checked="" value="false">
                                                        Tidak
                                                        <i class="input-helper"></i></label>
                                                </div>
                                                @error('pmj')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-pmj">
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12 ml-1">
                                            <button type="submit" class="btn btn-primary mr-2">Proses</button>
                                            <button class="btn btn-light">Batal</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#tabel-daftar').DataTable();

        $('#id-golongan').on('change', function()
        {
            let dataId = $('#id-golongan').val();
            let url = "getDetailGolongan/" + dataId;
            $.get(url, function(data)
            {
                $('#id-sub-golongan').html('');
                $.each(data, function(i,d)
                {
                    $('#id-sub-golongan').append(`
                        <option value="`+ d.id +`">`+ d.sub_golongan +`</option>
                    `);
                });
            });
        });

        $('#pmj-true').on('click', function()
        {
            $('.form-pmj').html(`
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Sebelumnya</label>
                    <div class="col-sm-9">
                        <input required name="nama_sebelumnya" type="text"
                            class="form-control form-control-sm mt-2"
                            placeholder="Insert here">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">No Sebelumnya</label>
                    <div class="col-sm-9">
                        <input required name="no_sebelumnya" type="text"
                            class="form-control form-control-sm mt-2"
                            placeholder="Insert here">
                    </div>
                </div>
            </div>
            `);
        });

        $('#pmj-false').on('click', function()
        {
            $('.form-pmj').html('');
        });

        $(document).on('click', '#detail-data', function()
        {
            let dataId = $(this).data('id');
            let url = "getSpecData/"+dataId;
            $.get(url, function(data)
            {
                let bangunan = data.pelanggan.bangunan_role;
                $('.modal-title').html('Detail Data');
                $('.form-insert-div').html('');
                $('.form-insert-div').append(`
                <input type="hidden" name="id_pelanggan" value="`+ data.pelanggan.id +`">
                <input type="hidden" name="id_bangunan" value="`+ bangunan.id +`">
                <div class="row card mr-4 ml-4">
                    <div class="col-12">
                        <p class="card-description mt-5">
                            Data Pelanggan
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Golongan</label>
                                    <div class="col-sm-9">
                                        <select name="id_golongan" class="form-control form-control-sm mt-2" id="id-golongan2">
                                            <option selected disabled>- Select -</option>
                                            @foreach ($data['golongan'] as $d)
                                            <option value="{{$d->id}}">{{$d->golongan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sub Golongan</label>
                                    <div class="col-sm-9">
                                        <select name="id_detail_golongan" class="form-control form-control-sm mt-2"
                                            id="id-sub-golongan2">
                                            <option selected disabled>- Select -</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input name="nama" value="`+ data.pelanggan.nama +`" type="text" class="form-control form-control-sm mt-2" placeholder="Insert here">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input name="alamat" value="`+ data.pelanggan.alamat +`" type="text" class="form-control form-control-sm mt-2" placeholder="Insert here">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Rt / Rw</label>
                                    <div class="col-sm-9">
                                        <input name="rt_rw" value="`+ data.pelanggan.rt_rw +`" type="text" class="form-control form-control-sm mt-2" placeholder="Insert here">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kecamatan</label>
                                    <div class="col-sm-9">
                                        <input name="kecamatan" value="`+ data.pelanggan.kecamatan +`" type="text"
                                        class="form-control form-control-sm mt-2"
                                        placeholder="Insert Here">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kabupaten</label>
                                    <div class="col-sm-9">
                                        <input name="kabupaten" value="`+ data.pelanggan.kabupaten +`" type="text"
                                        class="form-control form-control-sm mt-2"
                                        placeholder="Insert Here">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No. Pendaftaran</label>
                                    <div class="col-sm-9">
                                        <input name="no_pendaftaran" value="`+ data.pelanggan.no_pendaftaran +`" type="text" class="form-control form-control-sm mt-2" placeholder="Insert here">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat Sambungan</label>
                                    <div class="col-sm-9">
                                        <input name="alamat_sambungan" value="`+ data.pelanggan.alamat_sambungan +`" type="text" class="form-control form-control-sm mt-2" placeholder="Insert here">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jumlah Penghuni</label>
                                    <div class="col-sm-9">
                                        <input name="jumlah_penghuni" value="`+ data.pelanggan.jumlah_penghuni +`" type="text" class="form-control form-control-sm mt-2" placeholder="Insert here">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p class="card-description mt-2">
                            Detail Bangunan
                        </p>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No. Sambungan</label>
                                    <div class="col-sm-9">
                                        <input name="no_sambungan" value="`+ bangunan.no_sambungan +`" type="text" class="form-control form-control-sm mt-2" placeholder="Insert here">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Luas Tanah M <sup>3</sup></label>
                                    <div class="col-sm-9">
                                        <input name="luas_tanah" value="`+ bangunan.luas_tanah +`" type="number" class="form-control form-control-sm mt-2" placeholder="Insert here">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Bangunan</label>
                                    <div class="col-sm-9">
                                        <input value="`+ bangunan.jenis_bangunan +`" name="jenis_bangunan" type="text"
                                        class="form-control form-control-sm mt-2"
                                        placeholder="Insert here">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status Bangunan</label>
                                    <div class="col-sm-9">
                                        <input value="`+ bangunan.status_bangunan +`"  name="status_bangunan" type="text"
                                        class="form-control form-control-sm mt-2"
                                        placeholder="Insert here">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Perumahan Sambungan</label>
                                    <div class="col-sm-9">
                                        <input name="perumahan_sambungan" value="`+ bangunan.perumahan_sambungan +`" type="text" class="form-control form-control-sm mt-2" placeholder="Insert here">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sumber Air</label>
                                    <div class="col-sm-9">
                                        <input name="sumber_air" value="`+ bangunan.sumber_air +`" type="text" class="form-control form-control-sm mt-2" placeholder="Insert here">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `);
                $('#univModal').modal('show');
                $('#id-golongan2').val(data.pelanggan.id_golongan);
                $('#id-sub-golongan2').html('');
                $.each(data.detail_golongan, function(i, d)
                {
                    $('#id-sub-golongan2').append(`
                    <option value="`+ d.id +`">`+ d.sub_golongan +`</option>
                    `);
                    $('#id-golongan2').on('change', function()
                    {
                        let dataId = $('#id-golongan2').val();
                        let url = "getDetailGolongan/" + dataId;
                        $.get(url, function(data)
                        {
                            $('#id-sub-golongan2').html('');
                            $.each(data, function(i,d)
                            {
                                $('#id-sub-golongan2').append(`
                                    <option value="`+ d.id +`">`+ d.sub_golongan +`</option>
                                `);
                            });
                        });
                    });
                });
                $('#id-sub-golongan2').val(data.pelanggan.id_detail_golongan);
                $('#form-insert').attr('action', `{{route('daftar.update')}}`);
            });
        });

        $(document).on('click', '#hapus-data', function()
        {
            let dataId = $(this).data('id');
            Swal.fire({
            title: 'Anda Yakin?',
            text: "Data ini mungkin terhubung ke tabel yang lain!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "deleteSpecData/" + dataId,
                        type: 'delete',
                        success: function () {
                            Swal.fire({
                                title: 'Hapus!',
                                text: 'Data berhasl di hapus.',
                                icon: 'success',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Oke'
                            }).then((result) => {
                                location.reload();
                            });
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Ada yang salah!',
                            });
                        }
                    })
                }
            })
        });
    });
</script>
@endsection