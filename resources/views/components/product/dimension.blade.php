<div class="table-responsive">
    <table>
        <tr>
            <td width="300" class="px-3 py-2">Panjang X Lebar X Tinggi</td>
            <td width="600px">{{$dimension->dimension}}</td>
        </tr>
        <tr>
            <td width="300" class="px-3 py-2">Tinggi Tempat Duduk</td>
            <td width="600px">{{$dimension->seatHeight}}</td>
        </tr>
        <tr>
            <td width="300" class="px-3 py-2">Jarak Sumbu Roda</td>
            <td width="600px">{{$dimension->wheelbase}}</td>
        </tr>
        <tr>
            <td width="300" class="px-3 py-2">Jarak Terendah Ke Tanah</td>
            <td width="600px">{{$dimension->groundClearance}}</td>
        </tr>
        <tr>
            <td width="300" class="px-3 py-2">Curb Weight</td>
            <td width="600px">{{$dimension->curbWeight}}</td>
        </tr>
    </table>
</div>
