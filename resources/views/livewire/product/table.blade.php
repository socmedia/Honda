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

                    <div class="col-12 col-md-2">
                        <select name="category" class="form-control" wire:model="category">
                            <option value="" selected>Pilih kategori</option>
                            <option value="matic">Matic</option>
                            <option value="cub">Cub</option>
                            <option value="sport">Sport</option>
                            <option value="bigbike">Big Bike</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-2">
                        <select name="status" class="form-control" wire:model="status">
                            <option value="" selected>Pilih status</option>
                            <option value="1">Draft</option>
                            <option value="0">Publish</option>
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
                                        <th>Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $data)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{route('get.product', $data->thumbnail ? $data->thumbnail : '')}}"
                                                alt="{{$data->name}}" width="150">
                                        </td>
                                        <td>
                                            {{$data->name}}
                                        </td>
                                        <td class="text-capitalize">
                                            {{$data->category}}
                                        </td>
                                        <td class="text-right">
                                            Rp. {{number_format($data->price,2,".",",")}}
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="btn btn-sm btn-{{$data->is_draft !== 0 ? 'dark' : 'primary'}} shadow-sm rounded-lg">
                                                {{$data->is_draft !== 0 ? 'Draft' : 'Publish'}}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group shadow-sm rounded-lg" role="group">
                                                <a href="{{route('adm.product.show', $data->id)}}"
                                                    class="btn btn-light btn-sm shadow-none" title="Lihat Produk">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{route('adm.product.edit', $data->id)}}"
                                                    class="btn btn-light btn-sm shadow-none" title="Ubah Produk">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button class="btn btn-light btn-sm shadow-none" title="Hapus Produk">
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