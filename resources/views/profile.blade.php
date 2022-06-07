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
                        <input type="email" name="email"  id="judul" value="{{$user->email}}" required>
                    </div>
                </div>

                <div class="add-child">
                    <h3>Nomor telepon</h3>
                    <p>Masukkan kontak agar calon pembeli dapat menghubungimu</p>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="number" name="telepon" placeholder="contoh: 081234567890" id="link" value="{{$user->telepon}}">
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
