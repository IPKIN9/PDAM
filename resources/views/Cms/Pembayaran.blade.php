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
                        <h3 class="">Tabel Data Pembayaran</h3>
                        <p class="card-description">
                            Harap diperhatikan formulir tidak boleh kosong saat melakukan pengeditan data
                            <code>Pembayaran</code>
                        </p>
                        <div class="table-responsive pt-3">
                            <table id="tabel-pembayaran" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Lunas</th>
                                        <th>Tgl Pembayaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($data['pembayaran'] as $d)
                                    <td>{{$no++}}</td>
                                    <td>{{$d->pelanggan_role->nama}}</td>
                                    <td>
                                        @if ($d->telah_dibayar == 1)
                                        Telah Dibayar
                                        @endif
                                    </td>
                                    <td>{{$d->tgl_pembayaran}}</td>
                                    <td class="text-center" style="width: 100px;">
                                        <button data-id="{{$d->id}}" type="button" id="detail-data"
                                            class="btn btn-secondary btn-rounded btn-icon">
                                            <i style="margin-left: -3px;" class="fas fa-print"></i>
                                        </button>
                                        <button data-id="{{$d->id}}" type="button" id="hapus-data"
                                            class="btn btn-danger btn-rounded btn-icon">
                                            <i style="margin-left: -2px;" class="fas fa-trash"></i>
                                        </button>
                                    </td>
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
                                <form class="form-sample" method="POST" action="{{route('pembayaran.insert')}}">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="hidden" name="id_pemakaian" id="pemakaian">
                                                <label>Nama Pelanggan</label>
                                                <select name="id_pelanggan" id="pelanggan"
                                                    class="form-control form-control-sm">
                                                    <option selected disabled>- Select -</option>
                                                    @foreach ($data['pelanggan'] as $d)
                                                    <option value="{{$d->id}}">{{$d->nama}}</option>
                                                    @endforeach
                                                </select>
                                                @error('id_pelanggan')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Periode</label>
                                                <select name="periode" disabled id="periode"
                                                    class="form-control form-control-sm">
                                                    <option selected disabled>- Select -</option>
                                                    <option value="Januari-{{date('Y')}}">Januari-{{date('Y')}}</option>
                                                    <option value="Februari-{{date('Y')}}">Februari-{{date('Y')}}
                                                    </option>
                                                    <option value="Maret-{{date('Y')}}">Maret-{{date('Y')}}</option>
                                                    <option value="April-{{date('Y')}}">April-{{date('Y')}}</option>
                                                    <option value="Mei-{{date('Y')}}">Mei-{{date('Y')}}</option>
                                                    <option value="Juni-{{date('Y')}}">Juni-{{date('Y')}}</option>
                                                    <option value="Juli-{{date('Y')}}">Juli-{{date('Y')}}</option>
                                                    <option value="Agustus-{{date('Y')}}">Agustus-{{date('Y')}}</option>
                                                    <option value="Oktober-{{date('Y')}}">Oktober-{{date('Y')}}</option>
                                                    <option value="November-{{date('Y')}}">November-{{date('Y')}}
                                                    </option>
                                                    <option value="Desember-{{date('Y')}}">Desember-{{date('Y')}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="">Status</label>
                                                <input name="status" id="status" readonly type="text" readonly
                                                    class="form-control form-control-sm" placeholder="Insert here">
                                                @error('status')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">PPA</label>
                                                <div class="col-sm-10">
                                                    <input name="ppa" id="ppa" type="number"
                                                        class="form-control form-control-sm" placeholder="Insert here"
                                                        value="0">
                                                    @error('ppa')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Denda</label>
                                                <div class="col-sm-10">
                                                    <input name="denda" id="denda" type="number"
                                                        class="form-control form-control-sm" placeholder="Insert here"
                                                        value="0">
                                                    @error('denda')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Adm</label>
                                                <div class="col-sm-10">
                                                    <input name="adm" id="adm" readonly type="number"
                                                        class="form-control form-control-sm" placeholder="Insert here">
                                                    @error('adm')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tgl Pembayaran</label>
                                                <div class="col-sm-9">
                                                    <input name="tgl_pembayaran" type="date"
                                                        class="form-control form-control-sm" placeholder="Insert here">
                                                    @error('tgl_pembayaran')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tarif Air</label>
                                                <div class="col-sm-10">
                                                    <input id="tarif_air" readonly type="number"
                                                        class="form-control form-control-sm" placeholder="Insert here">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Total</label>
                                                <div class="col-sm-10">
                                                    <input name="total" id="total" type="number" readonly
                                                        class="form-control form-control-sm" placeholder="Insert here">
                                                    @error('total')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12 ml-1">
                                            <button id="kirim" type="submit"
                                                class="btn btn-primary mr-2">Proses</button>
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

        $('#tabel-pembayaran').DataTable();

        $('#pelanggan').change(function()
        {
            $('#periode').prop('disabled', false);
        });

        $('#periode').change(function()
        {
            let id_pelanggan = $('#pelanggan').val();
            let periode = $('#periode').val();
            let url = "getDataStatus/" + id_pelanggan;
            let data = 
            {
                pelanggan: id_pelanggan,
                periode: periode
            }
            $('#status').val('');

            $.ajax({
                type: "GET",
                url: url,
                data: data,
                success: function(data)
                {
                    console.log(data);
                    if (data == "null") {
                        alert("Pemakaian Untuk Periode Ini Belum Diinput");
                        $('#kirim').prop('disabled', true);
                    }
                    if (data == "false") {
                        $('#status').val('Belum dibayar');
                        $('#kirim').prop('disabled', true);
                    } 
                    else 
                    {
                        if (data.status == 1) {
                        $('#status').val('Telah dibayar');
                        $('#kirim').prop('disabled', true);
                        alert("Tagihan ini telah dibayar");
                    }
                    else
                    {
                        $('#kirim').prop('disabled', false);
                        $('#pemakaian').val(data.pemakaian.id)
                        let tarif = data.tarif;
                        let adm = data.adm;
                        let total = tarif + adm;
                        $('#status').val('Belum dibayar');
                        $('#tarif_air').val(tarif);
                        $('#adm').val(adm);
                        $('#total').val(total);

                        $('#ppa,#denda').on('change', function()
                        {
                            let ppa = $('#ppa').val();
                            let denda = $('#denda').val();
                            let hasil = total + parseInt(ppa) + parseInt(denda);

                            $('#total').val(hasil);
                        });

                        }

                    }
                },
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