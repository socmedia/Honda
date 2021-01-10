<div class="row">
    <div class="col-12 col-lg-4">
        <h5 class="card-title text-uppercase"><b>Social Media</b></h5>
        <p>
            Perbarui link social media perusahaan dengan mengganti url pada form disamping
        </p>
    </div>
    <div class="col-12 col-lg-8">
        <div class="white-box rounded-lg">

            @if (session()->has('social'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses !</strong> {{session()->get('social')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="form-group row">
                <div class="col-12 col-md-6 mb-3 mb-lg-0">
                    <form wire:submit.prevent="updateWa">

                        <x-bootstrap.input-group :withIcon="true" :inlineEdit="true">
                            <x-slot name="icon"><i class="fab fa-whatsapp"></i></x-slot>
                            <input type="text" class="form-control" name="whatsapp" wire:model="whatsapp">
                        </x-bootstrap.input-group>
                        @error('whatsapp')
                        <small class="text-danger">{{$message}}</small>
                        @enderror

                    </form>
                </div>

                <div class="col-12 col-md-6">
                    <form wire:submit.prevent="updateIg">

                        <x-bootstrap.input-group :withIcon="true" :inlineEdit="true">
                            <x-slot name="icon"><i class="fab fa-instagram"></i></x-slot>
                            <input type="text" class="form-control" name="instagram" wire:model="instagram">
                        </x-bootstrap.input-group>
                        @error('instagram')
                        <small class="text-danger">{{$message}}</small>
                        @enderror

                    </form>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-md-6 mb-3 mb-lg-0">
                    <form wire:submit.prevent="updateFb">

                        <x-bootstrap.input-group :withIcon="true" :inlineEdit="true">
                            <x-slot name="icon"><i class="fab fa-facebook"></i></x-slot>
                            <input type="text" class="form-control" name="facebook" wire:model="facebook">
                        </x-bootstrap.input-group>
                        @error('facebook')
                        <small class="text-danger">{{$message}}</small>
                        @enderror

                    </form>
                </div>

                <div class="col-12 col-md-6">
                    <form wire:submit.prevent="updateTw">

                        <x-bootstrap.input-group :withIcon="true" :inlineEdit="true">
                            <x-slot name="icon"><i class="fab fa-twitter"></i></x-slot>
                            <input type="text" class="form-control" name="twitter" wire:model="twitter">
                        </x-bootstrap.input-group>
                        @error('twitter')
                        <small class="text-danger">{{$message}}</small>
                        @enderror

                    </form>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-md-6 mb-3 mb-lg-0">
                    <form wire:submit.prevent="updateTt">

                        <x-bootstrap.input-group :withIcon="true" :inlineEdit="true">
                            <x-slot name="icon">
                                <svg height="14" viewBox="0 0 26 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22.1512 6.95273C21.9614 6.85462 21.7766 6.74706 21.5975 6.63047C21.0768 6.2862 20.5993 5.88056 20.1755 5.42227C19.1149 4.20879 18.7188 2.97773 18.5729 2.11582H18.5788C18.4569 1.40039 18.5073 0.9375 18.5149 0.9375H13.6844V19.616C13.6844 19.8668 13.6844 20.1146 13.6739 20.3596C13.6739 20.39 13.671 20.4182 13.6692 20.451C13.6692 20.4645 13.6692 20.4785 13.6663 20.4926V20.5031C13.6154 21.1733 13.4005 21.8207 13.0407 22.3884C12.6808 22.956 12.187 23.4266 11.6026 23.7586C10.9935 24.1051 10.3047 24.2868 9.60397 24.2859C7.35339 24.2859 5.52936 22.4508 5.52936 20.1844C5.52936 17.918 7.35339 16.0828 9.60397 16.0828C10.03 16.0824 10.4534 16.1495 10.8585 16.2814L10.8643 11.3631C9.63465 11.2042 8.38541 11.302 7.1954 11.6501C6.00539 11.9982 4.90044 12.5892 3.95026 13.3857C3.11768 14.1091 2.41773 14.9723 1.8819 15.9363C1.678 16.2879 0.908659 17.7006 0.815495 19.9934C0.756901 21.2947 1.14772 22.643 1.33405 23.2002V23.2119C1.45124 23.54 1.90534 24.6598 2.64538 25.6037C3.24212 26.3609 3.94715 27.026 4.73776 27.5777V27.566L4.74948 27.5777C7.08796 29.1668 9.68073 29.0625 9.68073 29.0625C10.1296 29.0443 11.6331 29.0625 13.3405 28.2533C15.2342 27.3563 16.3124 26.0197 16.3124 26.0197C17.0011 25.2211 17.5488 24.3111 17.9319 23.3285C18.369 22.1795 18.5149 20.8014 18.5149 20.2506V10.3412C18.5735 10.3764 19.354 10.8926 19.354 10.8926C19.354 10.8926 20.4784 11.6133 22.2327 12.0826C23.4913 12.4166 25.187 12.4869 25.187 12.4869V7.6916C24.5928 7.75605 23.3864 7.56855 22.1512 6.95273Z"
                                        fill="#525f7f" />
                                </svg>
                            </x-slot>
                            <input type="text" class="form-control" name="tiktok" wire:model="tiktok">
                        </x-bootstrap.input-group>
                        @error('tiktok')
                        <small class="text-danger">{{$message}}</small>
                        @enderror

                    </form>
                </div>

                <div class="col-12 col-md-6">
                    <form wire:submit.prevent="updateYt">

                        <x-bootstrap.input-group :withIcon="true" :inlineEdit="true">
                            <x-slot name="icon"><i class="fab fa-youtube"></i></x-slot>
                            <input type="text" class="form-control" name="youtube" wire:model="youtube">
                        </x-bootstrap.input-group>
                        @error('youtube')
                        <small class="text-danger">{{$message}}</small>
                        @enderror

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>