@extends ('../index')

@section('container')
<section id="barang">
    <div class="container w-100 py-5 my-5 d-flex text-center justify-content-center">
        @foreach ($data as $data)
        <a href="/products/{{ $data->slug }}">
            <div class="card mt-5 mx-4" style="width: 18rem">
                <img src="{{ asset('storage/images/products/'.$data->image) }}" class="card-img-top rounded-2"
                    alt=" {{ $data->image }} " />
                <div class="card-body">
                    <h5 class="card-title fw-bolder text-dark"> {{ $data->name }}</h5>
                    <p class="card-text text-dark"> {{ $data->bahan_tas }}</p>
                    <h3 class="text-dark">Rp{{ $data->price }}</h3>
                </div>
            </div>
        </a>
        @endforeach
</section>
@endsection