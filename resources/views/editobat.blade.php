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

                    @foreach($obat as $p)
                    {{ __('MENU OBAT') }}
                    <form action="{{ route('updateobat') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $p->id }}"> <br/>
                        Nama Obat <input type="text" name="nama_obat" required="required" value="{{ $p->nama_obat}}"> <br/>
                        Kemasan <input type="text" name="kemasan" required="required" value="{{ $p->kemasan}}"> <br/>
                        Harga <input type="number" name="harga" required="required" value="{{ $p->harga}}"> <br/>
                        <input type="submit" value="Simpan Data">
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
