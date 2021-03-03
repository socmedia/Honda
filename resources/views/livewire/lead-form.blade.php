<div class="row">
    <div class="col-12">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Selamat !

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </h4>
            <p class="mb-0">
                Permintaan berhasil dikirim, tunggu balasan dari kami ke nomor handphone yang telah didaftarkan. Atau
                anda bisa
                menghubungi kami <a href="tel:+di sini" class="text-dark"><b>Di sini,</b></a> jika anda memiliki
                pertanyaan
                terkait
                ketersediaan produk tersebut.
            </p>
        </div>
        @endif
    </div>
    <div class="col-12">
        <form wire:submit.prevent="submitForm">
            <div class="form-group row">
                <label for="fullname" class="col-12 col-md-2 col-form-label">Nama Lengkap<sup>*</sup> </label>
                <div class="col-12 col-md-10">
                    <input type="text" class="form-control" id="fullname" placeholder="Tuliskan nama lengkap anda"
                        wire:model="fullName">
                    @error('fullName')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="city" class="col-12 col-md-2 col-form-label">Kota<sup>*</sup> </label>
                <div class="col-12 col-md-10">
                    <select name="city" id="city" class="custom-select text-capitalize select_searchable"
                        wire:model.defer="city">
                        <option value="" disabled selected>Pilih kota</option>
                        @foreach ($cities as $city)
                        <option class="text-capitalize" value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                    @error('city')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="fullname" class="col-12 col-md-2 col-form-label">Motor Honda<sup>*</sup> </label>
                <div class="col-12 col-md-10">
                    <select name="motor" id="motor" class="custom-select text-capitalize select_searchable"
                        wire:model.defer="motor">
                        <option value="" disabled selected>Pilih motor</option>
                        @foreach ($motors as $motor)
                        <option class="text-capitalize" value="{{$motor->id}}">{{$motor->name}}</option>
                        @endforeach
                    </select>
                    @error('motor')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-12 col-md-2 col-form-label">No. Handphone<sup>*</sup> </label>
                <div class="col-12 col-md-10">
                    <input type="text" class="form-control" id="phone" placeholder="Tuliskan nama lengkap anda"
                        wire:model="phone">
                    @error('phone')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="message" class="col-12 col-md-2 col-form-label">Pesan<sup>*</sup> </label>
                <div class="col-12 col-md-10">
                    <textarea name="message" id="message" class="form-control"
                        placeholder="Ketikkan pesan yang ingin anda sampaikan" wire:model="message"></textarea>
                    @error('message')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group text-right">
                <button class="btn btn-dark">Kirim</button>
            </div>
        </form>
    </div>
</div>