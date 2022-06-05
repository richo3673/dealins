@include('header')

<div class="main">
    <div class="page-header">
        <a href="{{ route('home') }}">
    <div class="icon2">
        <x-heroicon-o-arrow-circle-left class="w-8 h-8"/>
    </div>
        </a>
    <div class="icon2">
        <h6 class="text-align-vert">Detail iklan</h6>
    </div>
    </div>

    <div class="grid-show-container">
        <div class="grid-show-item">
            <div class="image-show">
            <img class="img" src="{{ url('https://dealinbucket.s3.amazonaws.com/images/'.$dealin->file_path) }}" width="1200" height="430">
        </div>
            <div class="grid-item-container2">
                <div class="item-container2">
                <h3>Kategori</h3>
                    <p>{{ $dealin->kategori }}</p>
                </div>
                <div class="item-container2">
                    <h3>Kondisi</h3>
                    <p>{{ $dealin->kondisi }}</p>
                </div>
                <div class="item-container2">
                    <h3>Lokasi Penjual</h3>
                    <p>{{$dealin->kelurahan}}, {{ $dealin->kecamatan }}, {{ $dealin->kota }}</p>
                </div>
            </div>

            <div class="grid-item-container4">
                <div class="item-container3">
                <h5>Kontak penjual</h5>
                </div>
                <div class="item-container3">
                </div> <div class="item-container3">
                </div>

                @foreach($kontak as $kontaks)
                <div class="item-container3">
                    <a href="https://wa.me/62{{ $kontaks->telepon }}" target="_blank">
                        <div class="icon3">
                            <x-ri-whatsapp-fill class="w-6 h-6 text-green-600"/>
                        </div>

                        <div class="icon3">
                            <h4 class="text-align-vert">Whatsapp</h4>
                        </div>
                    </a>
                </div>

                <div class="item-container3">
                    <a href="{{ $kontaks->facebook }}" target="_blank">
                        <div class="icon3">
                            <x-ri-facebook-box-fill class="w-7 h-7 text-blue-600"/>
                        </div>

                        <div class="icon3">
                            <h4 class="text-align-vert">Facebook</h4>
                        </div>
                    </a>
                </div>
                    <div class="item-container3">
                        <a href="tel:{{ $kontaks->telepon }}">
                            <div class="icon3">
                                <x-ri-phone-line class="w-7 h-7"/>
                            </div>
                            <div class="icon3">
                                <h4 class="text-align-vert">{{$kontaks->telepon}}</h4>
                            </div>
                        </a>
                    </div>

            </div>


            @if (Auth::check())
                @if($dealin->user_id == auth()->user()->id)
            <div class="grid-item-container3">
                    <div class="item-container3">
                            <a href="{{ route('edit-form', ['id'=>$dealin->id]) }}">
                                <div class="icon3">
                                    <x-ri-edit-line class="w-6 h-6"/>
                                </div>

                            <div class="icon3">
                                <h4 class="text-align-vert">Edit iklan</h4>
                            </div>
                            </a>
                   </div>

                <div class="item-container3">
                            @method('delete')
                    <a href="{{route('delete', ['id'=>$dealin->id])}}">
                        <div class="icon3">
                            <x-ri-delete-bin-5-line class="w-6 h-6"/>
                        </div>

                        <div class="icon3">
                            <h4 class="text-align-vert">Hapus iklan</h4>
                        </div>
                    </a>

                    </div>
            </div>
                @endif
            @endif
        </div>
        <div class="grid-show-item">

            <div class="grid-item-container">
            <h1>{{ $dealin->judul }}</h1>
            <h2>Rp {{ number_format($dealin->harga, 0, ',', '.') }}</h2>
            <h3>Deskripsi</h3>
            <p>{{ $dealin->desc }}</p>
            </div>


        <div style="width: 100%" class="grid-item-container2">
            <div class="item-container2">
                <h3>Penayangan</h3>
                <p>{{ count($jumlah_view) }}</p>
            </div>
            <div class="item-container2">
                <h3>Diunggah</h3>
                <p>{{ $dealin->created_at }}</p>
            </div>
            <div class="item-container2">
                <h3>Pengiklan</h3>
                <p>{{$kontaks->name}}</p>
            </div>
        </div>
        </div>
    </div>
    @endforeach
</div>

</body>
</html>
