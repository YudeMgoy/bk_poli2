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

                    {{ __('MENU Tambah Daftar Poli') }}
                    <form action="{{ route('storedaftarpoli') }}" method="post">
                        {{ csrf_field() }}
                        Pasien : {{$pasien->name}}<br/>
                    <input type="hidden" name="id_pasien" value="{{$pasien->id}}">
                        <div class="col-md-6">
                            Jadwal Periksa
                            <select id="id_jadwal" name="id_jadwal">
                                @foreach($jadwal_periksa as $p)
                                <option value="{{ $p->id }}">Dokter {{ $p->dokter->nama }} | {{ $p->hari }} | {{ $p->jam_mulai }} | {{ $p->jam_selesai }}</option>
                                @endforeach
                                {{-- <option value="pasien">Pasien</option> --}}
                              </select>
                        </div>

                        Keluhan <input type="text" name="keluhan" required="required"> <br/>
                        
                        <input type="submit" value="Tambah">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
