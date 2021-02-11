<table>
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Apparel</td>
            <td>Kategori</td>
            <td>Harga</td>
            <td>Bahan</td>
            <td>Ukuran</td>
            <td>Thumbnail</td>
            <td>Gambar</td>
            <td>Tanggal Upload</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($apparels as $apparel)
        <tr>
            <td style="vertical-align: top; word-wrap: break-word;" width="4">{{$loop->iteration}}</td>
            <td style="vertical-align: top; word-wrap: break-word;" width="28">{{$apparel->name}}</td>
            <td style="vertical-align: top; word-wrap: break-word; text-transform: capitalize;" width="20">
                {{$apparel->category}}
            </td>
            <td style="vertical-align: top; word-wrap: break-word; text-align: right;" width="30">
                Rp. {{$apparel->price}}
            </td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">{!! $apparel->materials !!}</td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">
                <p style="text-transform: uppercase">
                    @foreach (json_decode($apparel->sizes) as $size)
                    {{$size->value}}{{$loop->last ? '' : ','}}
                    @endforeach
                </p>
            </td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">
                {{$apparel->thumbnail}}
            </td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">
                <ol>
                    @foreach ($apparel->images as $image)
                    <li>{{$image->image}}</li>
                    @endforeach
                </ol>
            </td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">
                {{$apparel->created_at->toDayDateTimeString()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
