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
            <h6 class="text-align-vert">Terakhir dilihat</h6>
        </div>
    </div>
    <div class="filter">
    <h5>Kami menemukan : {{count($dealins)}} iklan yang baru kamu kunjungi</h5>
    </div>
    <div class="grid-container">

        @foreach($dealins as $dealin)
            <div class="grid-item">
                <a href="/dealins/{{$dealin->id}}">
                    <img src="{{ url('https://dealinbucket.s3.amazonaws.com/images/'.$dealin->file_path) }}">

                    <h1>Rp {{ number_format($dealin->harga, 0, ',', '.') }}</h1>
                    <p>{{ $dealin->judul }}</p>
                    <h2>{{ $dealin->kecamatan}}, {{$dealin->kota}}</h2>
                    <h3>{{ $dealin->created_at->format('d M') }}</h3>
                </a>
            </div>
        @endforeach

    </div>

</div>


</body>
</html>
