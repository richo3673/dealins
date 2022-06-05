@include('header')
<div class="main">
    <div class="flash-message">
        @include('flash-message')
    </div>

    @if(isset($recommendation))
        <h4>Rekomendasi untukmu</h4>
        <div class="grid-container">
            @foreach($recommendation as $recommendations)
                <div class="grid-item">
                    <a href="/dealins/{{$recommendations->id}}">
                        <div class="grid-img">
                            <img
                                src="{{ url('https://dealinbucket.s3.amazonaws.com/images/'.$recommendations->file_path) }}">
                        </div>
                        <h1>Rp {{ number_format($recommendations->harga, 0, ',', '.') }}</h1>
                        <p>{{ $recommendations->judul }}</p>
                        <h2>{{ $recommendations->kecamatan}}, {{$recommendations->kota}}</h2>
                        <h3>{{ $recommendations->created_at->format('d M') }}</h3>
                    </a>
                </div>
            @endforeach

        </div>

    @endif

    <h4> Iklan terbaru</h4>


    <div class="filter">
        <form class="group relative" action="{{ route('search') }}">
            <input type="text" name="kota" placeholder="Cari kota atau daerah">
            <input type="text" name="cari" placeholder="Cari nama produk">
            <button type="submit">
                <x-ri-search-line class="w-8 h-8 transform-top text-purple-600"/>
            </button>
            <button style="transform: translateY(2px)" type="submit">
                <x-gmdi-restart-alt-o class="w-9 h-9 transform-top"/>
            </button>
        </form>
        <a>
        </a>


        @if(isset($cari))
            <h5>Menampilkan hasil untuk : {{$cari}}</h5>
            @if(isset($kota))
                <h5>Lokasi : {{$kota}}</h5>
            @endif
        @elseif(isset($kota))
            <h5>Menampilkan lokasi : {{$kota}}</h5>
        @endif
    </div>
    <div class="grid-container">
        @foreach($dealins as $dealin)
            <div class="grid-item">
                <a href="/dealins/{{$dealin->id}}">
                    <div class="grid-img">
                        <img src="{{ url('https://dealinbucket.s3.amazonaws.com/images/'.$dealin->file_path) }}">
                    </div>
                    <h1>Rp {{ number_format($dealin->harga, 0, ',', '.') }}</h1>
                    <p>{{ $dealin->judul }}</p>
                    <h2>{{ $dealin->kecamatan}}, {{$dealin->kota}}</h2>
                    <h3>{{ $dealin->created_at->format('d M') }}</h3>
                </a>
            </div>
        @endforeach

    </div>
</div>

@include('footer')

