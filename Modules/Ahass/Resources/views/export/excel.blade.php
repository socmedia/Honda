<table>
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Ahass</td>
            <td>Alamat</td>
            <td>Kabupaten/Kota</td>
            <td>Kontak</td>
            <td>Tanggal Upload</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($ahass as $ahass)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$ahass->name}}</td>
            <td>{{$ahass->address}}</td>
            <td>{{$ahass->regency->name}}</td>
            <td>{{$ahass->contacts}}</td>
            <td>{{$ahass->created_at->toDayDateTimeString()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>