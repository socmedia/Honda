<div class="row">

    <div class="col-12 col-lg-4">
        <h5 class="card-title text-uppercase"><b>Informasi Perusahaan</b></h5>
        <p>
            Perbarui informasi perusahaan dengan mengubah form disamping.
        </p>
    </div>

    <div class="col-12 col-lg-8">
        <div class="white-box rounded-lg">

            @if (session()->has('info'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses !</strong> {{session()->get('info')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <form wire:submit.prevent="updateInfo">

                <fieldset class="form-group row">
                    <div class="col-12">
                        <label for="address">Alamat perusahaan</label>
                        <textarea name="address" style="resize: none; height: 80px" class="form-control"
                            wire:model="address"></textarea>
                        @error('address')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </fieldset>

                <fieldset class="form-group row">
                    <div class="col-12 col-md-6">
                        <label for="phone">No. Telp.</label>
                        <input type="text" name="phone" class="form-control" wire:model="phone">
                        @error('phone')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="fax">Fax</label>
                        <input type="text" name="fax" class="form-control" wire:model="fax">
                        @error('fax')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </fieldset>

                <fieldset class="form-group text-right">
                    <button class="btn btn-dark rounded-lg font-light">Simpan</button>
                </fieldset>

            </form>


        </div>
    </div>

</div>