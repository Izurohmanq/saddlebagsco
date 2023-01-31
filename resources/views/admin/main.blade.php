@extends ('../dashboard')

@section('container')
<div class="main">
    <div class="word">
        <h1>Halo {{ Str::title(auth()->user()->name) }}</h1>
        <h3>Selamat datang kembali</h3>
    </div>
</div>
@endsection