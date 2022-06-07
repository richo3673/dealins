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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="add-item-container">
        <form method="post" action="{{ route('add') }}"
              enctype="multipart/form-data">
            @csrf
            <div class="add-grid-container">
                <div class="add-child">
                    <h3>Judul iklan</h3>
                    <p>Masukkan judul agar pembeli tahu apa yang kamu jual</p>

                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="text" name="judul" placeholder="Masukkan judul iklan" id="judul" required>
                    </div>
                </div>

                <div class="add-child">
                    <h3>Foto produk</h3>
                    <p>Tambahkan foto produk untuk menarik pembeli</p>

                </div>
                <div class="add-child">
                    <div class="input-group">
                        <div class="preview">
                            <img id="file-ip-1-preview">
                        </div>
                        <label for="file-ip-1">
                            <x-ri-image-add-fill class="w-12 h-12"/>
                            <input id="file-ip-1" type="file"  onchange="showPreview(event);" accept="image/png, image/jpg, image/gif, image/jpeg" class="form-control" name="image" required/>
                        </label>
                    </div>
                </div>

                <div class="add-child">
                    <h3>Kategori produk</h3>
                    <p>Pilih kategori</p>

                </div>
                <div class="add-child">
                    <div class="input-group">
                        <select name="kategori" id="kat">
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
                        <input type="number" name="harga" placeholder="Masukkan harga" id="judul" required>
                    </div>
                </div>

                <div class="add-child">
                    <h3>Deskripsi produk</h3>
                    <p>Tulis deskripsi agar pembeli tahu lebih banyak tentang produkmu</p>

                </div>
                <div class="add-child">
                    <div class="input-group">
                        <textarea id="desc" name="desc" rows="7" cols="83" maxlength="1275" minlength="10"
                                  placeholder="Jelaskan tentang produk anda"></textarea>
                    </div>
                </div>

                <div class="add-child">
                    <h3>Kelurahan</h3>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="text" name="kelurahan" placeholder="Masukkan kelurahan" id="judul" required>
                    </div>
                </div>

                <div class="add-child">
                    <h3>Kecamatan</h3>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="text" name="kecamatan" placeholder="Masukkan kecamatan" id="judul" required>
                    </div>
                </div>

                <div class="add-child">
                    <h3>Kota</h3>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="text" name="kota" placeholder="Masukkan kota" id="judul" required>
                    </div>
                </div>

                <div class="add-child">
                    <h3>Provinsi</h3>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="text" name="provinsi" placeholder="Masukkan provinsi" id="judul" required>
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
