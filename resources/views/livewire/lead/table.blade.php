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

                    <div class="col-12 col-md-3 mb-3 mb-md-0">
                        <label for="dateStart">Dari tanggal</label>
                        <input type="date" class="form-control" name="dateStart" wire:model="dateStart">
                    </div>

                    <div class="col-12 col-md-3 mb-3 mb-md-0">
                        <label for="dateEnd">Hingga tanggal</label>
                        <input type="date" class="form-control" name="dateEnd" wire:model="dateEnd">
                    </div>

                    <div class="col-12 col-md-3 align-self-end">
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
                                        <th>Dibaca</th>
                                        <th>Nama Lengkap</th>
                                        <th>Telp.</th>
                                        {{-- <th>Kota</th> --}}
                                        <th>Produk</th>
                                        <th>Status</th>
                                        <th>Tanggal Submit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $data)
                                    <tr class="{{$data->is_readed === 1 ? '' : 'bg-secondary text-white'}}"
                                        onclick="window.location.href = '{{route('adm.lead.edit', $data->id)}}'"
                                        style="cursor: pointer">
                                        <td class="text-center">
                                            @if ($data->is_readed === 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-eye-off">
                                                <path
                                                    d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24">
                                                </path>
                                                <line x1="1" y1="1" x2="23" y2="23"></line>
                                            </svg>
                                            @endif
                                        </td>
                                        <td>
                                            {{$data->name}}
                                        </td>
                                        <td>
                                            {{$data->phone}}
                                        </td>
                                        {{-- <td class="text-capitalize">
                                            {{$data->regency->name}}
                                        </td> --}}
                                        <td class="text-left">
                                            {{$data->product->name}}
                                        </td>
                                        <td class="text-center">
                                            {!! $label->getLabel($data->status) !!}
                                        </td>
                                        <td class="text-center">
                                            {{$data->created_at->format('D d, M Y')}}
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
