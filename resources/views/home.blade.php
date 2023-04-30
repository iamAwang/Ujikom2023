@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Aplikasi Sewa Kostum') }}
                    <img src={{ asset("gambar/logoenter.png") }} alt="logo" style="width:10%; float: right;">
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <button type="button" class="btn btn-primary" style="float:right"><a href="{{route('indexRent')}}" style="color:white; text-decoration:none">Sewa</a></button>
                    @if(Auth::user()->id == '1')
                    <button type="button" class="btn btn-danger" style="float:right"><a href="{{route('indexCostume')}}" style="color:white; text-decoration:none">Kostum</a></button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
