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
                        <h3 class="">Tabel Data Golongan</h3>
                        <p class="card-description">
                            Harap diperhatikan formulir tidak boleh kosong saat melakukan pengeditan data
                            <code>GOLONGAN</code>
                        </p>
                        <div class="table-responsive pt-3">
                            <table id="tabel-golongan" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Golongan</th>
                                        <th>Jumlah Data</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 30px;">1</td>
                                        <td>Herman Beck</td>
                                        <td>$ 77.99</td>
                                        <td class="text-center" style="width: 100px;">
                                            <button type="button" id="detail-data"
                                                class="btn btn-secondary btn-rounded btn-icon">
                                                <i class="fas fa-info"></i>
                                            </button>
                                            <button type="button" id="hapus-data"
                                                class="btn btn-danger btn-rounded btn-icon">
                                                <i style="margin-left: -2px;" class="fas fa-trash"></i>
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
                                <form class="form-sample" action="" method="POST">
                                    @csrf
                                    <p class="card-description">
                                        Detail
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row form-golongan">
                                                <label class="col-sm-3 col-form-label">Golongan</label>
                                                <div class="col-sm-9">
                                                    <select name="golongan" class="form-control form-control-sm mt-2">
                                                        <option selected disabled>- Select -</option>
                                                        @foreach ($data['golongan'] as $d)
                                                        <option value="{{$d->id}}">{{$d->golongan}}</option>
                                                        @endforeach
                                                    </select>
                                                    <small>Pilih data golongan</small>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" id="opt-add-golongan" value="false">

                                        <div class="col-md-6 text-left" style="margin-top: 5px;">
                                            <button type="button" id="add-data"
                                                class="btn btn-secondary btn-rounded btn-icon">
                                                <i id="add-golongan-btn" class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Unit</label>
                                                <div class="col-sm-9">
                                                    <select name="" class="form-control form-control-sm mt-2">
                                                        <option selected disabled>- Select -</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Blok Kosumsi</label>
                                                <div class="col-sm-9">
                                                    <select name="" class="form-control form-control-sm mt-2">
                                                        <option selected disabled>- Select -</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Sub Golongan</label>
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
                                                <label class="col-sm-3 col-form-label">Tarif Air</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control form-control-sm mt-2"
                                                        placeholder="Insert here">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Biaya Beban</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control form-control-sm mt-2"
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

        $('#tabel-golongan').DataTable();

        $(document).on('click', '#detail-data', function()
        {
            $('#univModal').modal('show');
        });

        $(document).on('click', '#add-data', function()
        {
            $('.form-golongan').html(`
            <label class="col-sm-3 col-form-label">Golongan</label>
            <div class="col-sm-9">
                <input type="text" name="golongan" class="form-control form-control-sm mt-2"
                    placeholder="Insert here">
            </div>
            `);
            $('#add-golongan-btn').removeClass('fa-plus');
            $('#add-golongan-btn').addClass('fa-minus');
            $('#add-data').attr('id', 'remove-data');
            $('#opt-add-golongan').val(true);
        });

        $(document).on('click', '#remove-data', function()
        {
            $('.form-golongan').html(`
            <label class="col-sm-3 col-form-label">Golongan</label>
            <div class="col-sm-9">
                <select name="golongan" class="form-control form-control-sm mt-2">
                    <option selected disabled>- Select -</option>
                    @foreach ($data['golongan'] as $d)
                    <option value="{{$d->id}}">{{$d->golongan}}</option>
                    @endforeach
                </select>
                <small>Pilih data golongan</small>
            </div>
            `);
            $('#add-golongan-btn').removeClass('fa-minus');
            $('#add-golongan-btn').addClass('fa-plus');
            $('#remove-data').attr('id', 'add-data');
            $('#opt-add-golongan').val(false);
        });
    });
</script>
@endsection