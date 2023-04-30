@extends('layouts.app')
@section('content')
@if ($message =
Session::get('success'))
<div class="alert alert-success d-flex align-items-center" role="alert">
    {{ $message }}
</div>
@endif
<div class="m-5">
<a class="btn btn-primary" href="{{route('createRent')}}" style="margin-bottom: 25px">Tambah Sewa +</a>
<a class="btn btn-primary" href="{{route('home')}}" style="margin-bottom: 25px">Home</a>
<a class="btn btn-success" href="{{route('downloadExcel')}}" style="margin-bottom: 25px; float:right">Excel</a>
<a class="btn btn-danger" href="{{route('exportPdf')}}" style="margin-bottom: 25px; float:right">PDF</a>

    <table class="table table-bordered" style="text-align: center">

        @php
            function rupiah($angka){
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                return $hasil_rupiah;
            }
        @endphp
        
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kostum</th>
                <th>Nama Penyewa</th>
                <th>Tanggal Sewa</th>
                <th>Harga Sewa</th>
                <th>Jumlah Hari Sewa</th>
                <th>Total</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no=1;
            @endphp
            @foreach ($rents as $rent)
            <tr>
                <td>{{$no}}</td>
                <td>{{$rent->costume->name}}</td>
                <td>{{$rent->name}}</td>
                <td>{{$rent->date}}</td>
                <td>{{rupiah($rent->costume->price)}}</td>
                <td>{{$rent->day}}</td>
                <td>{{rupiah($rent->costume->price * $rent->day)}}</td>
                <td><button class="badge text-bg-warning"><a href="{{route('editRent',$rent->id)}}" style="text-decoration: none; color:white">Edit</a></button></td>
                <td><form action="{{route('deleteRent',@$rent->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this rent?')">
                    @csrf
                    <button type="submit" class="badge text-bg-danger">Delete</button>
                </td>
            </tr>
            @php
                $no++;  
            @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection