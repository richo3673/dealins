@if ($message = Session::get('success'))
    <div id="one" class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
        <button id="btn" type="button" class="close" onclick="myFunction2()"><x-ri-close-line class="w-6 h-6"/></button>

    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" onclick="myFunction2()">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" onclick="myFunction2()">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" onclick="myFunction2()">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" onclick="myFunction2()">×</button>
        Please check the form below for errors
    </div>
@endif
