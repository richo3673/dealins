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
            <h6 class="text-align-vert">Pengaturan pengguna</h6>
        </div>
        @include('flash-message')
    </div>

    <div class="add-item-container">

            @csrf
            <div class="add-grid-container">
                <div class="add-child">
                    <h3>Bersihkan riwayat iklan</h3>
                    <p>Bersihkan seluruh riwayat iklan yang pernah kamu kunjungi sebelumnya</p>
                </div>
                <div class="add-child">
                    <div class="input-group2">
                        @method('delete')
                        <form method="get" action="{{ route('hapus_riwayat') }}"
                              enctype="multipart/form-data">
                            <x-button class="h-10 text-base text-red-600">hapus</x-button>
                        </form>
                    </div>
                </div>

                <div class="add-child">
                    <h3 style="color: red">Hapus akun</h3>
                    <p>!! Ini akan menghapus seluruh data beserta iklan pada akun anda. Setelah melakukan penghapusan, akun anda tidak dapat dipulihkan</p>
                </div>
                <div class="add-child">
                    <div class="input-group2">
                        @method('delete')
                        <form method="post" action="{{ route('hapus_akun') }}">
                            @csrf
                            <x-button2 class=" h-10 text-base ">hapus</x-button2>
                        </form>
                    </div>
                </div>
            </div>

    </div>
</div>

</body>
</html>

