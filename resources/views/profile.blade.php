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
            <h6 class="text-align-vert">Profil pengguna</h6>
        </div>
        @include('flash-message')
    </div>

    <div class="add-item-container">
        <form method="post" action="{{ route('update_profile') }}"
              enctype="multipart/form-data">
            @csrf
            <div class="add-grid-container">
                <div class="add-child">
                    <h3>Nama pengguna</h3>
                    <p>Gunakan nama asli agar pembeli dapat mengenali dengan mudah</p>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="text" name="nama" placeholder="Masukkan judul iklan" id="judul" value="{{$user->name}}" required>
                    </div>
                </div>

                <div class="add-child">
                    <h3>Tanggal lahir</h3>
                    <p>Opsional</p>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="date" name="tanggal_lahir" id="date" value="{{strftime('%Y-%m-%d',
  strtotime($user->tanggal_lahir)) }}">
                    </div>
                </div>

                <div class="add-child">
                    <h3>Alamat email</h3>
                    <p>Alamat email ini digunakan untuk login. </p>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="text" name="email"  id="judul" value="{{$user->email}}" required>
                    </div>
                </div>

                <div class="add-child">
                    <h3>Nomor telepon</h3>
                    <p>Masukkan kontak agar calon pembeli dapat menghubungimu</p>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="text" name="telepon" placeholder="contoh: 081234567890" id="link" value="{{$user->telepon}}">
                    </div>
                </div>

                <div class="add-child">
                    <h3>Link Facebook</h3>
                    <p>Kontak alternatif agar pembeli bisa menghubungimu</p>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="text" name="facebook" placeholder="contoh: https://web.facebook.com/profile.php?id=12345678901" id="link" value="{{$user->facebook}}">
                    </div>
                </div>

                <div class="add-child">
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <x-button class=" h-10 text-base fill-amber-500">simpan</x-button>
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
