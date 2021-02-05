<table>
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Genuine Part</td>
            <td>Deskripsi</td>
            <td>Gambar Deskripsi</td>
            <td>Fungsi</td>
            <td>Gambar Fungsi</td>
            <td>Keunggulan</td>
            <td>Tanggal Upload</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($hgp as $hgp)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$hgp->name}}</td>
            <td>{{$hgp->description}}</td>
            <td>{{$hgp->description_image}}</td>
            <td>{{$hgp->function}}</td>
            <td>{{$hgp->function_image}}</td>
            <td>
                @foreach($hgp->advantages as $advantage)
                <p>
                    {{$loop->iteration}}.
                    {{$advantage->title}}
                </p>
                <p>{{$advantage->description}}</p>
                @endforeach
            </td>
            <td>{{$hgp->created_at->toDayDateTimeString()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>