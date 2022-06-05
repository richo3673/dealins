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
                    <h3>Bersihkan riwayat iklan</h3>
                    <p>Bersihkan seluruh riwayat iklan yang pernah kamu kunjungi sebelumnya</p>
                </div>
                <div class="add-child">
                    <div class="input-group">
                        <input type="submit" name="hapus_riwayat" value="Hapus">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>



</body>
</html>

