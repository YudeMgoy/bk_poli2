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

                    {{ __('MENU OBAT') }}
                    <h3>Data Obat</h3>
 
                    <a href="{{ route('tambahobat') }}"> + Tambah Obat</a>
                    
                    <br/>
                    <br/>
                
                    <table border="1">
                        <tr>
                            <th>Nama Obat</th>
                            <th>Kemasan</th>
                            <th>Harga</th>
                        </tr>
                        @foreach($obat as $p)
                        <tr>
                            <td>{{ $p->nama_obat }}</td>
                            <td>{{ $p->kemasan }}</td>
                            <td>{{ $p->harga }}</td>
                            <td>
                                <a href="{{ route('editobat', $p->id) }}">Edit</a>
                                |
                                <a href="{{ route('hapusobat', $p->id) }}">Hapus</a>
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
