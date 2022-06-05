@include('header')

<!-- Page content -->
<div class="main">

    <div class="page-header">
        <a href="{{ route('home') }}">
            <div class="icon2">
                <x-heroicon-o-arrow-circle-left class="w-8 h-8"/>
            </div>
        </a>
        <div class="icon2">
            <h6 class="text-align-vert">Pasang iklan</h6>
        </div>
    </div>

    <div class="add-item-container">
        <form method="post" action="{{route('update', ['id'=>$dealin->id])}}"
              enctype="multipart/form-data">
            @csrf
            <div class="add-grid-container">
                <div class="add-child">
                    <h3>Judul iklan</h3>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="text" name="judul" placeholder="Masukkan judul iklan" id="judul" value="{{$dealin->judul}}">
                    </div>
                </div>

                <div class="add-child">
                    <h3>Foto produk</h3>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <div class="preview">
                            <img id="file-ip-1-preview">
                            <img class="img" id="file-ip-hide" src="{{ url('https://dealinbucket.s3.amazonaws.com/images/'.$dealin->file_path) }}">
                        </div>
                        <label for="file-ip-1">
                            <x-ri-image-add-fill class="w-12 h-12"/>
                            <input id="file-ip-1" type="file"  onchange="showPreview(event);" accept="image/png, image/jpg, image/gif, image/jpeg" class="form-control" name="image"/>
                        </label>
                    </div>

                </div>

                <div class="add-child">
                    <h3>Kategori produk</h3>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <select name="kategori" id="kat">
                            <option value="{{ $dealin->kategori }}" selected hidden>{{ $dealin->kategori }}</option>
                            <option value="Handphone">Handphone</option>
                            <option value="Laptop & Komputer">Laptop & Komputer</option>
                            <option value="Elektronik Lainya">Elektronik Lainya</option>
                            <option value="Outfit">Outfit</option>
                            <option value="Sepatu">Sepatu</option>
                            <option value="Aksesoris">Aksesoris</option>
                            <option value="Mainan">Mainan</option>
                            <option value="Otomotif">Otomotif</option>
                        </select>
                    </div>
                </div>

                <div class="add-child">
                    <h3>Kondisi produk</h3>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <select name="kondisi" id="kat">
                            <option value="{{ $dealin->kondisi }}" selected hidden>{{ $dealin->kondisi }}</option>
                            <option value="Baru">Baru</option>
                            <option value="Bekas">Bekas</option>
                        </select>
                    </div>
                </div>

                <div class="add-child">
                    <h3>Harga</h3>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="number" name="harga" placeholder="Masukkan harga" id="judul" value="{{$dealin->harga}}">
                    </div>
                </div>

                <div class="add-child">
                    <h3>Deskripsi produk</h3>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <textarea id="desc" name="desc" rows="7" cols="83"
                                  placeholder="Jelaskan tentang produk anda"> {{$dealin->desc}} </textarea>
                    </div>
                </div>

                <div class="add-child">
                    <h3>Kelurahan</h3>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="text" name="kelurahan" placeholder="Masukkan kelurahan" id="judul" value="{{$dealin->kelurahan}}">
                    </div>
                </div>

                <div class="add-child">
                    <h3>Kecamatan</h3>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="text" name="kecamatan" placeholder="Masukkan kecamatan" id="judul" value="{{$dealin->kecamatan}}">
                    </div>
                </div>

                <div class="add-child">
                    <h3>Kota</h3>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="text" name="kota" placeholder="Masukkan kota" id="judul" value="{{$dealin->kota}}">
                    </div>
                </div>

                <div class="add-child">
                    <h3>Provinsi</h3>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="text" name="provinsi" placeholder="Masukkan provinsi" id="judul" value="{{$dealin->provinsi}}">
                    </div>
                </div>

                <div class="add-child">
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <x-button>IKLANKAN</x-button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
</body>
</html>
