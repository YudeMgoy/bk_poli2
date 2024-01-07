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

                    {{ __('MENU Daftar Pasien') }}
                    <form action="{{ route('daftarpasien') }}" method="post">
                        {{ csrf_field() }}
                        Nama <input type="text" name="nama" required="required"> <br/>
                        Alamat <input type="text" name="alamat" required="required"> <br/>
                        No KTP <input type="number" name="no_ktp" required="required"> <br/>
                        No HP <input type="number" name="no_hp" required="required"> <br/>
                        <input type="submit" value="Daftar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
