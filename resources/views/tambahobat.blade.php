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
                    <form action="{{ route('storeobat') }}" method="post">
                        {{ csrf_field() }}
                        Nama Obat <input type="text" name="nama_obat" required="required"> <br/>
                        Kemasan <input type="text" name="kemasan" required="required"> <br/>
                        Harga <input type="number" name="harga" required="required"> <br/>
                        <input type="submit" value="Simpan Data">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
