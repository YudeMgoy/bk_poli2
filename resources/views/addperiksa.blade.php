@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('storeperiksa') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_daftar_poli" value="{{$daftarPoli->id}}"><br>
                        Nama Pesien<input type="text" disabled name="nama" value="{{$daftarPoli->pasien->name}}"><br>
                        Catatan <input type="text" name="catatan" required="required"> <br/>
                        Obat <br>
                        @foreach ($obat as $o)
                            <input type="checkbox" name="obat[]" value="{{$o->id}}"/>{{$o->nama_obat}} | {{$o->kemasan}} | Rp{{$o->harga}}<br>
                        @endforeach
                        
                        <input type="submit" value="Tambah">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
