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

                    <div class="col-12 col-md-3">
                        <input type="text" wire:model.debounce.250ms="search" placeholder="Cari disini"
                            class="form-control">
                    </div>

                </fieldset>
            </div>

            <div class="card-body">
                <div class="row">
                    @forelse ($datas as $data)
                    <div class="col-12 col-md-4 col-lg-3 mb-3">
                        <div class="card border rounded-lg">
                            <div class="position-absolute w-100">
                                <div class="btn-group float-right shadow-sm rounded-lg" role="group">
                                    <a href="{{route('adm.hgp.show', $data->id)}}"
                                        class="btn btn-light btn-sm shadow-none" title="Lihat Data">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route('adm.hgp.edit', $data->id)}}"
                                        class="btn btn-light btn-sm shadow-none" title="Ubah Data">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button class="btn btn-light btn-sm shadow-none" title="Hapus Data"
                                        data-url="{{route('adm.hgp.destroy', $data->id)}}"
                                        onclick="$('#delete-confirmation').modal('show'); $('#delete-confirmation').find('form').attr('action', $(this).data('url'))">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <img class="w-75 m-auto" src="{{route('get.genuine_part', $data->thumbnail)}}"
                                alt="{{$data->name}}">
                            <div class="card-body bg-danger text-white rounded-bottom">
                                <h5 class="card-title mb-0">{{$data->name}}</h5>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-center mb-0">Data tidak ditemukan</p>
                    </div>
                    @endforelse
                    <div class="col-12">
                        {{$datas->links('livewire::simple-bootstrap')}}
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>