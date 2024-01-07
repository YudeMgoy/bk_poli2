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

                    
                    <b>Pasien Yang Perlu diperiksa</b>
                    <table border="1">
                        <tr>
                            <th>Pasien</th>
                            <th>Jadwal</th>
                            <th>Keluhan</th>
                            <th>No Antrian</th>
                            <th>Action</th>
                        </tr>
                        <?php $check = false;
                        foreach($daftarPoli as $p){
                            foreach($periksa as $q){
                                if($q->daftar_poli->id == $p->id){
                                    $check = true;
                                }
                            }
                            if($check == true) {?>
                                <tr>
                                    <td>{{ $p->pasien->name }}</td>
                                    <td>{{ $p->jadwal->hari }} {{ $p->jadwal->jam_mulai }} - {{ $p->jadwal->jam_selesai }}</td>
                                    <td>{{ $p->keluhan }}</td>
                                    <td>{{$p->no_antrian}}</td>
                                    <td>
                                        <a href="{{ route('addperiksa', $p->id) }}">Periksa</a>
                                    </td>
                                </tr>
                            <?php } 
                        }?>
                        
                    </table>
                    
                   <b> Riwayat Periksa</b>
                    <table border="1">
                        <tr>
                            <th>Pasien</th>
                            <th>Jadwal</th>
                            <th>Keluhan</th>
                            <th>Catatan</th>
                            <th>Obat</th>
                            <th>Biaya</th>
                        </tr>
                        @foreach($periksa as $p)
                        <tr>
                            <td>{{ $p->daftar_poli->pasien->name }}</td>
                            <td>{{ $p->daftar_poli->jadwal->hari }} {{ $p->daftar_poli->jadwal->jam_mulai }} - {{ $p->daftar_poli->jadwal->jam_selesai }}</td>
                            <td>{{ $p->daftar_poli->keluhan }}</td>
                            <td>{{ $p->catatan }}</td>
                            <td>@foreach($p->detailPeriksas as $d)
                                {{ $d->obat->nama_obat }},
                            @endforeach                 </td>           
                            <td>{{ $p->biaya_periksa }}<td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
