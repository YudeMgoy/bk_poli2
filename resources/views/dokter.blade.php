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

                    {{ __('MENU Dokter') }}
                    <h3>Data Poli</h3>
 
                    <a href="{{ route('tambahdokter') }}"> + Tambah Dokter</a>
                    
                    <br/>
                    <br/>
                
                    <table border="1">
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Poli</th>
                        </tr>
                        @foreach($dokter as $p)
                        <tr>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->no_hp }}</td>
                            <td>
                                {{$p->poli->nama}}
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
