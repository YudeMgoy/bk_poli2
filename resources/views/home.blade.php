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

                    {{ __('You are logged in!') }}
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('obat') }}">Obat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('poli') }}">Daftar Poli</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dokter') }}">Daftar Dokter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jadwalperiksa') }}">Jadwal Periksa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('periksa') }}">Periksa</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
