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
                        <h3 class="">Data Pelanggan</h3>
                        <p class="card-description">
                            Harap diperhatikan formulir tidak boleh kosong saat melakukan pengeditan data
                            <code>PELANGGAN</code>
                        </p>
                        <div class="table-responsive pt-3">
                            <table id="tabel-daftar" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            No.
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Alamat
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Tindakan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 30px;">
                                            1
                                        </td>
                                        <td>
                                            Herman Beck
                                        </td>
                                        <td>
                                            $ 77.99
                                        </td>
                                        <td>
                                            Baru
                                        </td>
                                        <td class="text-center" style="width: 100px;">
                                            <button type="button" class="btn btn-secondary btn-rounded btn-icon">
                                                <i class="fas fa-info"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon ml-1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
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
                                <form class="form-sample">
                                    <p class="card-description">
                                        Data Pelanggan
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        placeholder="Insert Here">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        placeholder="Insert Here">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">RT / RW</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        placeholder="Insert Here">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kecamatan</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control form-control-sm mt-2" id="">
                                                        <option selected disabled>- Select -</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kabupaten</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control form-control-sm mt-2" id="">
                                                        <option selected disabled>- Select -</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">No. Pendaftaran</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        placeholder="Insert Here">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Alamat Sambungan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        placeholder="Insert Here">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jumlah Penghuni</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        placeholder="Insert Here">
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
                                                    <select class="form-control form-control-sm mt-2" id="">
                                                        <option selected disabled>- Select -</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label"><code>Sub Golongan</code></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control form-control-sm mt-2" id="">
                                                        <option selected disabled>- Select -</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Harga Rata-rata</label>
                                                <div class="col-sm-9">
                                                    <input type="text" readonly
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert Here">
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
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        placeholder="Insert here">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Luas Tanah M <sup>3</sup></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        placeholder="Insert here">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jenis Bangunan</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control form-control-sm mt-2" id="">
                                                        <option selected disabled>- Select -</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Status Bangunan</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control form-control-sm mt-2" id="">
                                                        <option selected disabled>- Select -</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Perumahan Sambungan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        placeholder="Insert here">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Sumber Air</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm mt-2"
                                                        placeholder="Insert here">
                                                </div>
                                            </div>
                                        </div>
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
    });
</script>
@endsection