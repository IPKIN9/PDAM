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
                                        <th>Unit</th>
                                        <th>Blok Konsumsi</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($data['golongan'] as $d)
                                    <tr>
                                        <td style="width: 30px;">{{$no++}}</td>
                                        <td>{{$d->golongan}}</td>
                                        <td>{{$d->unit}}</td>
                                        <td>{{$d->blok_konsumsi}}</td>
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
                                <form class="form-sample" action="{{route('golongan.create')}}" method="POST">
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
                                                    @error('golongan')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="confir" id="opt-add-golongan" value="false">

                                        <div class="col-md-6 text-left" style="margin-top: 5px;">
                                            <button type="button" id="add-data"
                                                class="btn btn-secondary btn-rounded btn-icon">
                                                <i id="add-golongan-btn" class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row new-data-form">
                                    </div>
                                    <hr>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Sub Golongan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="sub_golongan"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert here">
                                                    @error('sub_golongan')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tarif Air</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="tarif_air"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert here">
                                                    @error('tarif_air')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Biaya Beban</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="biaya_beban"
                                                        class="form-control form-control-sm mt-2"
                                                        placeholder="Insert here">
                                                    @error('biaya_beban')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
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
<div class="row">

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
            let dataId = $(this).data('id');
            let url = "getSpecData/"+dataId;

            $.get(url, function(data){
                $('.modal-title').html('Detail Data');
                $('.form-insert-div').html('');
                $('.form-insert-div').append(`
                    <div class="row card mr-5 ml-5">
                        <input type="hidden" value="`+ data.golongan.id +`" name="id">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Golongan</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="golongan" class="form-control form-control-sm mt-2"
                                            placeholder="Insert here" value="`+ data.golongan.golongan +`">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Unit</label>
                                        <div class="col-sm-8">
                                            <select required name="unit" id="id-unit" class="form-control form-control-sm mt-2">
                                                <option selected disabled>- Select -</option>
                                                <option value="unit a">Unit A</option>
                                                <option value="unit b">Unit B</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Blok Konsumsi</label>
                                        <div class="col-sm-8">
                                            <select required name="blok_konsumsi" id="id-blok-konsumsi"
                                                class="form-control form-control-sm mt-2">
                                                <option selected disabled>- Select -</option>
                                                <option value="blok 1 - 10">Blok 1 - 10</option>
                                                <option value="blok > 10">Blok > 10</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Sub</th>
                                        <th>Tarif Air</th>
                                        <th>Beban Biaya</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tb-body-detail">
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                `);
                $('#univModal').modal('show');
                $('#id-unit').val(data.golongan.unit);
                $('#id-blok-konsumsi').val(data.golongan.blok_konsumsi);
                $('#tb-body-detail').html('');
                $.each(data.detail, function(i,d){
                    $('#tb-body-detail').append(`
                    <tr>
                        <td>
                            <input type="hidden" name="id-detail[]" value="`+ d.id +`">
                            <input type="text" name="sub_golongan[]" value="`+ d.sub_golongan +`" class="form-control form-control-sm mt-2"
                            placeholder="Insert here">
                        </td>
                        <td>
                            <input type="number" name="tarif_air[]" value="`+ d.tarif_air +`" class="form-control form-control-sm mt-2"
                            placeholder="Insert here">
                        </td>
                        <td>
                            <input type="number" name="biaya_beban[]" value="`+ d.biaya_beban +`" class="form-control form-control-sm mt-2"
                            placeholder="Insert here">
                        </td>
                        <td style="width:50px;">
                            <button type="button" id="delete-detail-btn`+d.id+`" data-id="`+ d.id +`"
                                class="btn btn-danger btn-rounded btn-icon">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    `);
                    $(document).on('click', `#delete-detail-btn`+d.id+``, function(){
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
                                    url: "deleteDetailData/" + dataId,
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
                $('#form-insert').attr('action', `{{route('golongan.update')}}`);
            });
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
            $('.new-data-form').html(`
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Unit</label>
                    <div class="col-sm-9">
                        <select required name="unit" class="form-control form-control-sm mt-2">
                            <option selected disabled>- Select -</option>
                            <option value="unit a">Unit A</option>
                            <option value="unit b">Unit B</option>
                        </select>
                        @error('unit')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Blok Kosumsi</label>
                    <div class="col-sm-9">
                        <select required name="blok_konsumsi"
                            class="form-control form-control-sm mt-2">
                            <option selected disabled>- Select -</option>
                            <option value="blok 1 - 10">Blok 1 - 10</option>
                            <option value="blok > 10">Blok > 10</option>
                        </select>
                        @error('blok_konsumsi')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
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
            $('.new-data-form').html('');
            $('#add-golongan-btn').removeClass('fa-minus');
            $('#add-golongan-btn').addClass('fa-plus');
            $('#remove-data').attr('id', 'add-data');
            $('#opt-add-golongan').val(false);
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