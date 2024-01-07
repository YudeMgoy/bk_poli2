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

                    {{ __('MENU Tambah Dokter') }}
                    <form action="{{ route('storedokter') }}" method="post">
                        {{ csrf_field() }}
                        Nama <input type="text" name="nama" required="required"> <br/>
                        Alamat <input type="text" name="alamat" required="required"> <br/>
                        No HP <input type="number" name="no_hp" required="required"> <br/>
                        <div class="col-md-6">
                            <select id="id_poli" name="id_poli">
                                @foreach($poli as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                                {{-- <option value="pasien">Pasien</option> --}}
                              </select>
                        </div>
                        <input type="submit" value="Tambah">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
