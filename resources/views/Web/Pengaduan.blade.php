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
            </ul>
            <div class="tab-content">
                <div id="table" class="tab-pane active card"><br>
                    <div class="card-body">
                        @if ($errors->any())
                        <p class="text-danger">Periksa apakah formulir terisi semua!</p>
                        @endif
                        <h3 class="">Tabel Data Pengaduan</h3>
                        <p class="card-description">
                            Harap diperhatikan formulir tidak boleh kosong saat melakukan pengeditan data
                            <code>Pengaduan</code>
                        </p>
                        <div class="table-responsive pt-3">
                            <table id="tabel-pengaduan" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nomor Handphone</th>
                                        <th>Kerusakan</th>
                                        <th>Keterangan</th>
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
                                        <td>{{$d->nama}}</td>
                                        <td>{{$d->no_telpon}}</td>
                                        <td>{{$d->Kerusakan}}</td>
                                        <td>{{$d->Keterangan}}</td>
                                        <td class="text-center" style="width: 100px;">
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

        $('#tabel-pengaduan').DataTable();

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
                        url: "delete/" + dataId,
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