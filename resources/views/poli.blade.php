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

                    {{ __('MENU POLI') }}
                    <h3>Data Poli</h3>
 
                    <a href="{{ route('tambahpoli') }}"> + Tambah Poli</a>
                    
                    <br/>
                    <br/>
                
                    <table border="1">
                        <tr>
                            <th>Nama</th>
                            <th>Keterangan</th>
                        </tr>
                        @foreach($poli as $p)
                        <tr>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->keterangan }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
