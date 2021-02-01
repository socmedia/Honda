<div class="row">
    @if (session()->has('success'))
    <div class="col-12 mb-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Hebat ! </strong> {!!session()->get('success')!!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif


    <div class="col-12 mb-3">
        <div class="card border shadow-sm rounded-lg">

            <div class="card-header py-3">
                <fieldset class="row justify-content-end">

                    <div class="col-12 col-md-2 mb-3">
                        <select name="kota" class="form-control select_searchable" wire:model="city">
                            <option value="" selected>Pilih kota</option>
                            @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-3">
                        <input type="text" wire:model.debounce.250ms="search" placeholder="Cari disini"
                            class="form-control">
                    </div>

                </fieldset>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="bg-light">
                                    <tr class="text-center">
                                        <th>Nama Dealer</th>
                                        <th>Alamat</th>
                                        <th>Kota</th>
                                        <th>Telp.</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $data)
                                    <tr>
                                        <td>
                                            {{$data->name}}
                                        </td>
                                        <td style="width: 400px !important">
                                            <p>{{$data->address}}</p>
                                        </td>
                                        <td class="text-capitalize">
                                            {{$data->regency->name}}
                                        </td>
                                        <td class="text-right">
                                            @php
                                            $contacts = explode(', ', $data->contacts);
                                            @endphp
                                            @foreach ($contacts as $contact)
                                            <p>{{$contact ? $contact : '-'}}</p>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group shadow-sm rounded-lg" role="group">
                                                <a href="{{route('adm.dealer.edit', $data->id)}}"
                                                    class="btn btn-light btn-sm shadow-none" title="Ubah Data">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button class="btn btn-light btn-sm shadow-none" title="Hapus Data"
                                                    data-url="{{route('adm.dealer.destroy', $data->id)}}"
                                                    onclick="$('#delete-confirmation').modal('show'); $('#delete-confirmation').find('form').attr('action', $(this).data('url'))">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="6"><b>Data tidak ditemukan</b></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12">
                        {{$datas->links('livewire::simple-bootstrap')}}
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
