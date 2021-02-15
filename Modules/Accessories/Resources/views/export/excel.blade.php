<table>
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Aksesoris</td>
            <td>Motor</td>
            <td>Harga</td>
            <td>Warna</td>
            <td>Kegunaan</td>
            <td>Bahan</td>
            <td>Gambar</td>
            <td>Tanggal Upload</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($accessories as $accessory)
        <tr>
            <td style="vertical-align: top; word-wrap: break-word;" width="4">{{$loop->iteration}}</td>
            <td style="vertical-align: top; word-wrap: break-word;" width="28">{{$accessory->name}}</td>
            <td style="vertical-align: top; word-wrap: break-word; text-transform: capitalize;" width="20">
                {{$accessory->product->name}}
            </td>
            <td style="vertical-align: top; word-wrap: break-word; text-align: right;" width="30">
                Rp. {{$accessory->price}}
            </td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">{{$accessory->colors}}</td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">{!! $accessory->function !!}</td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">{!! $accessory->material !!}</td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">
                {{$accessory->image}}
            </td>
            <td style="vertical-align: top; word-wrap: break-word;" width="30">
                {{$accessory->created_at->toDayDateTimeString()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
