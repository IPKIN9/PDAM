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
                        <p class="text-danger">Periksa apakah formulir terisi semua!</p>
                        @endif
                        <h3 class="">Tabel Data Pemakaian</h3>
                        <p class="card-description">
                            Harap diperhatikan formulir tidak boleh kosong saat melakukan pengeditan data
                            <code>Pemakaian</code>
                        </p>
                        <div class="table-responsive pt-3">
                            <table id="tabel-karyawan" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pelanggan</th>
                                        <th>Kode Pemakaian</th>
                                        <th>Periode</th>
                                        <th>Jumlah Pemakaian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($data ['all'] as $d)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$d->pelanggan_role->nama}}</td>
                                        <td>{{$d->kode_pemakaian}}</td>
                                        <td>{{$d->periode}}</td>
                                        <td>{{$d->jumlah_pemakaian}}</td>
                                        <td class="text-center" style="width: 100px;">
                                            <button type="button" class="btn btn-secondary btn-rounded btn-icon"
                                                data-id="{{$d->id}}" id="btn-edit">
                                                <i class="fas fa-info"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon"
                                                data-id="{{$d->id}}" id="btn-del">
                                                <i class="fas fa-trash"></i>
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
                                <form class="form-sample" method="POST" action="{{route('pemakaian.insert')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Pelanggan</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="id_pelanggan">
                                                        <option disabled selected>Pilih Pelanggan</option>
                                                        @foreach ($data ['pelngn'] as $d)
                                                        <option value="{{$d->id}}">{{$d->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_pelanggan')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Kode Pemakaian</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="kode_pemakaian">
                                                    @error('kode_pemakaian')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Periode</label>
                                                <div class="col-sm-8">
                                                    <select name="periode" id="periode"
                                                        class="form-control form-control-sm">
                                                        <option selected disabled>- Select -</option>
                                                        <option value="Januari-{{date('Y')}}">Januari-{{date('Y')}}
                                                        </option>
                                                        <option value="Februari-{{date('Y')}}">Februari-{{date('Y')}}
                                                        </option>
                                                        <option value="Maret-{{date('Y')}}">Maret-{{date('Y')}}</option>
                                                        <option value="April-{{date('Y')}}">April-{{date('Y')}}</option>
                                                        <option value="Mei-{{date('Y')}}">Mei-{{date('Y')}}</option>
                                                        <option value="Juni-{{date('Y')}}">Juni-{{date('Y')}}</option>
                                                        <option value="Juli-{{date('Y')}}">Juli-{{date('Y')}}</option>
                                                        <option value="Agustus-{{date('Y')}}">Agustus-{{date('Y')}}
                                                        </option>
                                                        <option value="Oktober-{{date('Y')}}">Oktober-{{date('Y')}}
                                                        </option>
                                                        <option value="November-{{date('Y')}}">November-{{date('Y')}}
                                                        </option>
                                                        <option value="Desember-{{date('Y')}}">Desember-{{date('Y')}}
                                                        </option>
                                                    </select>
                                                    @error('periode')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Jumlah Pemakaian</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="jumlah_pemakaian">
                                                    @error('jumlah_pemakaian')
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

        $('#tabel-karyawan').DataTable();
        $(document).on('click', '#btn-edit', function() {
            let dataId = $(this).data('id');
            let url = "getspecdata/" + dataId;
            $.get(url, function(data){
                $('.modal-title').html('Perubahan Data');
                $('.modal-body').html('');
                $('.modal-body').append(`
                <div class="row">
                    <input type="hidden" class="form-control" name="id" id="id" value="`+data.id+`">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Pelanggan</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="id_pelanggan" id="id_pelanggan">
                                    <option disabled selected>Pilih Pelanggan</option>
                                    @foreach ($data ['pelngn'] as $d)
                                    <option value="{{$d->id}}">{{$d->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Kode Pemakaian</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kode_pemakaian" id="kode_pemakaian" value="`+data.kode_pemakaian+`">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jumlah Pemakaian</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_pemakaian" id="jumlah_pemakaian" value="`+data.jumlah_pemakaian+`">
                            </div>
                        </div>
                    </div>
                </div>
                `);
                $('#id_user').val(data.id_user);
                $('#id_pelanggan').val(data.id_pelanggan);
                $('#univModal').modal('show');
                $('#form-insert').attr('action',`{{route('pemakaian.update')}}`);
            });
        });

        $(document).on('click','#btn-del',function(){
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
                        url: "deletespecdata/" + dataId,
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