@extends('Layout.Base')
@section('content')
<div class="content-wrapper">
    <div class="row">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        @if ($errors->any())
        <p class="text-danger">Periksa apakah formulir terisi semua</p>
        @endif
        <div class="col-12 card">
            <div class="card-body mt-2">
                <div class="row ml-3 mr-3">
                    <h4 class="card-title">Formulir Penambahan Data Baru</h4>
                </div>
                <div class="row ml-3 mr-3">
                    <div class="col-md-12">
                        <form class="form-sample" action="{{route('tentangkami.create')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="card-description">
                                        Tentang Perusahaan
                                    </p>
                                </div>
                                <div class="col-md-8" style="text-align: right;">
                                    <button type="button" id="btn-edit" class="btn btn-outline-secondary btn-icon-text">
                                        Edit
                                        <i class="ti-file btn-icon-append"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Deskripsi</label>
                                        <div class="col-sm-12">
                                            @if ($data == null)
                                            <input type="hidden" name="id" value="">
                                            <textarea name="des" id="des" class="form-control form-dis" readonly id=""
                                                rows="12"></textarea>
                                            @else
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            <textarea name="des" id="des" class="form-control form-dis" readonly id=""
                                                rows="12">{{$data->des}}</textarea>
                                            @endif
                                            @error('')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-12">
                                            @if ($data == null)
                                            <textarea name="alamat" id="alamat" class="form-control form-dis" readonly
                                                id="" rows="4"></textarea>
                                            @else
                                            <textarea name="alamat" id="alamat" class="form-control form-dis" readonly
                                                id="" rows="4">{{$data->alamat}}</textarea>
                                            @endif
                                            @error('')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Whatsapp</label>
                                        @if ($data == null)
                                        <input type="number" name="wa" id="wa"
                                            class="form-control form-control-sm form-dis" readonly
                                            placeholder="Insert here" required>
                                        @else
                                        <input value="{{$data->wa}}" type="number" name="wa" id="wa"
                                            class="form-control form-control-sm form-dis" readonly
                                            placeholder="Insert here" required>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        @if ($data == null)
                                        <input type="number" name="hp" id="hp"
                                            class="form-control form-control-sm form-dis" readonly
                                            placeholder="Insert here" required>
                                        @else
                                        <input value="{{$data->hp}}" type="number" name="hp" id="hp"
                                            class="form-control form-control-sm form-dis" readonly
                                            placeholder="Insert here" required>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        @if ($data == null)
                                        <input type="email" name="email" id="email"
                                            class="form-control form-control-sm form-dis" readonly
                                            placeholder="Insert here" required>
                                        @else
                                        <input value="{{$data->email}}" type="email" name="email" id="email"
                                            class="form-control form-control-sm form-dis" readonly
                                            placeholder="Insert here" required>
                                        @endif
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

        $(document).on('click', '#btn-edit', function()
        {
            $('.form-dis').prop('readonly', false);
            $('#des').focus();
        });
    });
</script>
@endsection