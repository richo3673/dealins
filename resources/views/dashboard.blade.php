@include('header')
<div class="main">
<div class="flash-message">
        @include('flash-message')
    </div>
@if(isset($recommendation))
<h4> Rekomendasi untukmu</h4>
<div class="grid-container">
        @foreach($recommendation as $recommendations)
            <div class="grid-item">
                <a href="/dealins/{{$recommendations->id}}">
                    <div class="grid-img">
                    <img src="{{ url('https://dealinbucket.s3.amazonaws.com/images/'.$recommendations->file_path) }}">
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
<h4> iklan terbaru</h4>


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


</body>
</html>


{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <div class="flex-auto flex space-x-4">--}}
{{--            <form class="group relative" action="{{ route('search') }}">--}}

{{--                <input--}}
{{--                    class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-half text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-1 ring-slate-200 shadow-sm"--}}
{{--                    type="text" name="cari" aria-label="Filter projects" placeholder="Cari Iklan..." required>--}}
{{--                <x-button class="h-10 ml-2 px-6 font-semibold rounded-md bg-blue-800 text-white" type="submit">--}}
{{--                    Cari--}}
{{--                </x-button>--}}
{{--            </form>--}}
{{--            <a href="{{ route('home') }}">--}}
{{--            <x-button class="h-10 ml-2 px-6 font-semibold rounded-md bg-blue-800 text-white" type="submit">--}}
{{--                Reset--}}
{{--            </x-button>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </x-slot>--}}


{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 bg-white border-b border-gray-200">--}}
{{--                    <div class="panel-bod">--}}

{{--                        <table class="table">--}}

{{--                            <!-- Table Headings -->--}}
{{--                            <thead>--}}
{{--                            <th>Iklan terbaru</th>--}}
{{--                            <th>&nbsp;</th>--}}

{{--                            </thead>--}}

{{--                            <!-- Table Body -->--}}
{{--                            <tbody class="max-w-full">--}}
{{--                            @foreach($dealins as $dealin)--}}
{{--                                <tr class="max-w-full">--}}
{{--                                    <!-- Task Name -->--}}
{{--                                    <td class="pt-8 pb-5 pr-5 text-center">--}}
<!-- <div class=""> -->
{{--                                        <a href="/dealins/{{$dealin->id}}">--}}
{{--                                            <img src="{{ url('public/Image/'.$dealin->file_path) }}"--}}
{{--                                                 style="height: 250px; width: 375px;">--}}


{{--                                            <h1 class="sm:font-bold">{{ $dealin->judul }}</h1>--}}
{{--                                            <p>Rp{{ number_format($dealin->harga, 0, ',', '.') }}</p>--}}
{{--                                        </a>--}}
{{--                                        @if (Auth::check())--}}
{{--                                            <p class="pt-1 text-xs text-gray-500"> Diposting--}}
{{--                                                oleh: {{ $dealin->user->id == auth()->user()->id? 'Anda':$dealin->user->name }}</p>--}}
{{--                                        @else--}}
{{--                                        @endif--}}
<!-- </div> -->
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}
