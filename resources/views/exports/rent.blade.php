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
        </tr>
        @php
            $no++;  
        @endphp
        @endforeach
    </tbody>
</table>