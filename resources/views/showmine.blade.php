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
            <h6 class="text-align-vert">Daftar iklan kamu</h6>
        </div>
    </div>
    <div class="filter">
    <h5>Kami menemukan : {{count($dealins)}} iklan milikmu</h5>
    </div>
    @include('flash-message')
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



{{--    <x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('IKLAN SAYA') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-4">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 bg-white border-b border-gray-200">--}}
{{--                    <x-button-link href="{{ route('create-form') }}">buat baru</x-button-link>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="py-1">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 bg-white border-b border-gray-200">--}}
{{--                    <div class="panel-bod">--}}
{{--                        <table class="table">--}}

{{--                            <!-- Table Headings -->--}}
{{--                            <thead>--}}
{{--                            <th>&nbsp;</th>--}}

{{--                            </thead>--}}

{{--                            <!-- Table Body -->--}}
{{--                            <tbody class="max-w-full">--}}
{{--                            @foreach($dealins as $dealin)--}}
{{--                                <tr class="max-w-full">--}}
{{--                                    <!-- Task Name -->--}}
{{--                                    <td class="pt-8 pb-5 pr-5">--}}
{{--                                        <!-- <div class=""> -->--}}
{{--                                        <a href="/dealins/{{$dealin->id}}"  >--}}
{{--                                            <img src="{{ url('public/Image/'.$dealin->file_path) }}"--}}
{{--                                                 style="height: 250px; width: 375px;">--}}


{{--                                            <h1 class="sm:font-bold">{{ $dealin->judul }}</h1>--}}
{{--                                            <p>Rp{{ $dealin->harga }}</p>--}}
{{--                                        </a>--}}
{{--                                        <p class="pt-2 text-xs text-gray-500"> Diposting oleh: {{ $dealin->user->id == auth()->user()->id? 'Anda':$dealin->user->name }}</p>--}}
{{--                                        <!-- </div> -->--}}
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
