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

                    {{ __('MENU Pasien') }}
                    <h3>Data Pasien</h3>
 
                    <a href="{{ route('tambahpasien') }}"> + Tambah Pasien</a>
                    
                    <br/>
                    <br/>
                
                    <table border="1">
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>No KTP</th>
                            <th>No HP</th>
                            <th>No RM</th>
                            <th>Action</th>
                        </tr>
                        @foreach($pasien as $p)
                            <tr>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->no_ktp }}</td>
                                <td>{{ $p->no_hp }}</td>
                                <td>{{ $p->no_rm }}</td>
                                <td>
                                    @if($p->polis != null && count($p->polis)>0)
                                    <b>Daftar Poli </b>        :<br>
                                    <b>Dokter </b>             : {{$p->polis[0]->jadwal->dokter->nama}}<br>
                                    <b>Alamat Dokter</b>       : {{$p->polis[0]->jadwal->dokter->nama}}<br>
                                    <b>No HP Dokter</b>        : {{$p->polis[0]->jadwal->dokter->no_hp}}<br>
                                    <b>Nama Poli</b>           : {{$p->polis[0]->jadwal->dokter->poli->nama}}<br>
                                    <b>Hari</b>                : {{$p->polis[0]->jadwal->hari}}<br>
                                    <b>Mulai</b>               : {{$p->polis[0]->jadwal->jam_mulai}}<br>
                                    <b>Selesai</b>             : {{$p->polis[0]->jadwal->jam_selesai}}<br>
                                    <b>Keluhan</b>             : {{$p->polis[0]->keluhan}}<br>
                                    <b>No Antrian</b>             : {{$p->polis[0]->no_antrian}}
                                    @else
                                    <a class="nav-link" href="{{ route('tambahdaftarpoli', $p->id) }}">Daftar Poli</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
