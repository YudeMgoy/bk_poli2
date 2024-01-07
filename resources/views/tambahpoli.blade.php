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

                    {{ __('MENU Tambah Poli') }}
                    <form action="{{ route('storepoli') }}" method="post">
                        {{ csrf_field() }}
                        Nama <input type="text" name="nama" required="required"> <br/>
                        Keterangan <input type="text" name="keterangan" required="required"> <br/>
                        <input type="submit" value="Tambah">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
