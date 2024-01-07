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

                    {{ __('MENU Tambah Jadwal Periksa') }}
                    <form action="{{ route('storejadwal') }}" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            Dokter
                            <select id="id_dokter" name="id_dokter">
                                @foreach($dokter as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                                {{-- <option value="pasien">Pasien</option> --}}
                              </select>
                        </div>
                        Hari 
                        <div class="col-md-6">
                            <select id="hari" name="hari">
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                              </select>
                        </div> <br/>
                        Jam Mulai <input type="time" name="jam_mulai" required /><br/>
                        Jam Selesai <input type="time" name="jam_selesai" required /><br/>
                        
                        <input type="submit" value="Tambah">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
