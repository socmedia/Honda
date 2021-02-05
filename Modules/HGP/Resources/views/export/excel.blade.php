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
            <td style="vertical-align: top; word-wrap: break-word;" width="4">{{$loop->iteration}}</td>
            <td style="vertical-align: top; word-wrap: break-word;" width="28">{{$hgp->name}}</td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">{{$hgp->description}}</td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">{{$hgp->description_image}}</td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">{{$hgp->function}}</td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">{{$hgp->function_image}}</td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">
                @foreach($hgp->advantages as $advantage)
                <p>
                    {{$loop->iteration}}.
                    {{$advantage->title}}
                </p>
                <p>{{$advantage->description}}</p>
                @endforeach
            </td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">
                {{$hgp->created_at->toDayDateTimeString()}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
