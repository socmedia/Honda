<table>
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Dealer</td>
            <td>Alamat</td>
            <td>Kabupaten/Kota</td>
            <td>Kontak</td>
            <td>Tanggal Upload</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($dealers as $dealer)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$dealer->name}}</td>
            <td>{{$dealer->address}}</td>
            <td>{{$dealer->regency->name}}</td>
            <td>{{$dealer->contacts}}</td>
            <td>{{$dealer->created_at->toDayDateTimeString()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>