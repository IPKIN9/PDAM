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
                        <h3 class="">Tabel Data User</h3>
                        <p class="card-description">
                            Harap diperhatikan formulir tidak boleh kosong saat melakukan pengeditan data
                            <code>User</code>
                        </p>
                        <div class="table-responsive pt-3">
                            <table id="tabel-user" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Password</th>
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
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->username}}</td>
                                        <td>{{$d->password}}</td>
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
                                <form class="form-sample" method="POST" action="{{route('user.insert')}}">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="name">
                                                    @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Username</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="username">
                                                    @error('username')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" name="password">
                                                    @error('password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Confirmation Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control"
                                                        name="password_confirmation">
                                                    @error('password_confirmation')
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

        $('#tabel-user').DataTable();
        $(document).on('click', '#btn-edit', function() {
            let dataId = $(this).data('id');
            let url = "getspecdata/" + dataId;
            $.get(url, function(data){
                $('.modal-title').html('Perubahan Data');
                $('.modal-body').html('');
                $('.modal-body').append(`
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-8">
                                <input type="hidden" value="`+ data.id +`" name="id">
                                <input type="text" class="form-control" name="name" id="name" value="`+data.name+`">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="username" id="username" value="`+data.username+`">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Confirmation Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control"
                                    name="password_confirmation">
                            </div>
                        </div>
                    </div>
                </div>
                `);
                $('#univModal').modal('show');
                $('#form-insert').attr('action',`{{route('user.update')}}`);
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