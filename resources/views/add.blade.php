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
        <form method="post" action="{{ route('add') }}"
              enctype="multipart/form-data">
            @csrf
            <div class="add-grid-container">
                <div class="add-child">
                    <h3>Judul iklan</h3>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="text" name="judul" placeholder="Masukkan judul iklan" id="judul" required>
                    </div>
                </div>

                <div class="add-child">
                    <h3>Foto produk</h3>
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


{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Pasang Iklan') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 bg-white border-b border-gray-200">--}}
{{--                    <form class="max-w-full" method="post" action="{{ route('add') }}"--}}
{{--                          enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <x-label class="pt-5 pb-5 pr-5">--}}
{{--                            Judul produk<br>--}}
{{--                            <x-input required type="text" name="judul" placeholder="Masukkan judul" class="h-6 w-48 text-xs border-gray-900"></x-input>--}}
{{--                        </x-label>--}}
{{--                        <x-label class="pt-4 pb-5 pr-5">--}}
{{--                            Kategori<br>--}}
{{--                            <x-input required type="text" name="kategori" placeholder="" class="h-6 w-48 p-3 text-xs border-gray-900"></x-input>--}}
{{--                        </x-label>--}}
{{--                        <x-label class="pt-4 pb-5 pr-5">--}}
{{--                            Kondisi produk<br>--}}
{{--                            <select class="pt-1 pb-1 h-6 text-xs" id="kondisi" name="kondisi">--}}
{{--                                <option class="h-2" value="baru">Baru</option>--}}
{{--                                <option class="h-2" value="bekas">Bekas</option>--}}
{{--                            </select>--}}
{{--                        </x-label>--}}
{{--                        <x-label class="pt-4 pb-5 pr-5">--}}
{{--                            Harga<br>--}}
{{--                            <x-input required type="number" name="harga" placeholder="Rp" class="h-6 w-48 p-3 text-xs border-gray-900"></x-input>--}}
{{--                        </x-label>--}}
{{--                        <x-label class="pt-5 pb-5 pr-5">--}}
{{--                            File--}}
{{--                            <input required name="file" placeholder="Enter title" class="form-control"></input>--}}
{{--                        </x-label>--}}

{{--                        <x-label class="pt-4 pb-5 pr-5">--}}
{{--                            Deskripsi produk <br>--}}
{{--                            <textarea required name="desc" class="h-20 w-48 text-xs"></textarea>--}}
{{--                        </x-label>--}}
{{--                        <x-label class="pt-4 pb-3 pr-5">--}}
{{--                            Foto produk <br>--}}
{{--                            <input type="file" class="form-control" required name="image" >--}}
{{--                        </x-label>--}}
{{--                        <x-label class="pt-4 pb-5 pr-5">--}}
{{--                            Kelurahan<br>--}}
{{--                            <x-input required type="text" name="kelurahan" placeholder="" class="h-6 w-48 p-3 text-xs border-gray-900"></x-input>--}}
{{--                        </x-label>--}}
{{--                        <x-label class="pt-4 pb-5 pr-5">--}}
{{--                            Kecamatan<br>--}}
{{--                            <x-input required type="text" name="kecamatan" placeholder="" class="h-6 w-48 p-3 text-xs border-gray-900"></x-input>--}}
{{--                        </x-label>--}}
{{--                        <x-label class="pt-4 pb-5 pr-5">--}}
{{--                            Kota<br>--}}
{{--                            <x-input required type="text" name="kota" placeholder="" class="h-6 w-48 p-3 text-xs border-gray-900"></x-input>--}}
{{--                        </x-label>--}}
{{--                        <x-label class="pt-4 pb-5 pr-5">--}}
{{--                            Provinsi<br>--}}
{{--                            <x-input required type="text" name="provinsi" placeholder="" class="h-6 w-48 p-3 text-xs border-gray-900"></x-input>--}}
{{--                        </x-label>--}}
{{--                        <x-button>IKLANKAN</x-button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}
