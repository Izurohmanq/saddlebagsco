@extends ('../dashboard')

@section('container')
<section id="curhatan">
    <div class="container">
        <h2 class="text-center">Curhatan</h2>

        @foreach ($data as $data)
        <!-- card for feedback -->
        <div class="card w-75 mt-4 m-auto">
            <div class="card-body">
                <h5 class="card-title">{{ $data->email }}</h5>
                <p class="card-text">{{ $data->message }}</p>
            </div>
        </div>
        @endforeach

    </div>
</section>
@endsection