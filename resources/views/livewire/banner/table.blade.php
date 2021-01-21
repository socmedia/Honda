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

    <div class="col-12">
        <h4 class="card-title font-light">Filter</h4>
        <fieldset class="form-group row justify-content-end">

            <div class="col-12 col-md-2 mb-3">
                <select name="target" class="form-control" wire:model="target">
                    <option value="all" selected>Pilih halaman</option>
                    <option value="homepage">Homepage</option>
                    <option value="produk-bigbike">Produk/Big Bike</option>
                    <option value="ahass">Ahass</option>
                    <option value="honda-genuine-part">Honda Genuine Part</option>
                    <option value="honda-apparel">Honda Apparel</option>
                    <option value="honda-genuine-accessories">Honda Genuine Accessories</option>
                </select>
            </div>

            <div class="col-12 col-md-2 mb-3">
                <select name="status" class="form-control" wire:model="status">
                    <option value="" selected>Pilih status</option>
                    <option value="active">Aktif</option>
                    <option value="not-active">Tidak Aktif</option>
                </select>
            </div>

        </fieldset>
    </div>

    <div class="col-12 mb-3">
        <div class="white-box rounded-lg shadow-sm">
            <div class="row">
                @foreach ($banners as $banner)
                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <figure>
                        <img src="{{route('get.banner', explode('/', $banner->image_name)[2])}}" alt="{{$banner->alt}}"
                            class="img-thumbnail" loading="lazy">

                        <figcaption class="form-group">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-sm btn-secondary rounded-left"
                                    wire:click="activeState({{$banner->id}})">
                                    {{$banner->is_active === 1 ? 'Non Aktifkan' : 'Aktifkan'}}
                                </button>
                                <a href="{{route('adm.banner.edit', $banner->id)}}" class="btn btn-sm btn-secondary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-secondary rounded-right"
                                    wire:click="deleteBanner({{$banner->id}})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-12">
        {{$banners->links()}}
    </div>

</div>