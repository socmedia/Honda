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
                        <select name="" class="form-control select_searchable" wire:model="publish">
                            <option value="" selected>Semua Status</option>
                            @foreach ($publishState as $state)
                            <option value="{{$state['slug_name']}}">{{$state['name']}}</option>
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
                    @forelse ($datas as $data)
                    <div class="col-12 col-sm-6 col-lg-4 mb-3">
                        <article class="article article-style-c">
                            <div class="article-label">
                                {{$data->blog_type}}
                            </div>
                            <div class="article-header">
                                <div class="article-image"
                                    style="background-image: url({{route('get.promo', explode('/', $data->image))}}); background-position: center top">
                                </div>
                            </div>
                            <div class="article-details">
                                <div class="article-category text-right">
                                    <a>{{$data->created_at->diffForHumans()}}</a>
                                </div>
                                <div class="article-title">
                                    <h2><a href="{{route('adm.promo.show', $data->slug_title)}}"> {{$data->title}}</a>
                                    </h2>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="btn-group shadow-sm rounded-lg" role="group">
                                        <a href="{{route('adm.promo.edit', $data->slug_title)}}"
                                            class="btn btn-light btn-sm shadow-none" title="Ubah Promo">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button class="btn btn-light btn-sm shadow-none" title="Hapus Promo"
                                            data-url="{{route('adm.promo.destroy', $data->id)}}"
                                            onclick="$('#delete-confirmation').modal('show'); $('#delete-confirmation').find('form').attr('action', $(this).data('url'))">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </article>
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