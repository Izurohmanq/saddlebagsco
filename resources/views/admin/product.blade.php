@extends ('../dashboard')

@section('container')
<section id="barang">

    @if(session()->has('successData'))
    <div class="alert alert-success alert-dismissible fade show sticky-top" role="alert">
        {{ session('successData') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session()->has('updateData'))
    <div class="alert alert-success alert-dismissible fade show sticky-top" role="alert">
        {{ session('updateData') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session('status'))
    <div class="alert alert-success alert-dismissible fade show sticky-top" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container w-100 py-5 d-flex text-center align-items-center">
        @foreach ($data as $data)
        <div class="card mt-5 mx-3" style="width: 18rem">
            <img src="{{ asset('storage/'.$data->image) }}" class="card-img-top rounded-2" alt=" {{ $data->image }} " />
            <div class="card-body">
                <h5 class="card-title fw-bolder text-dark"> {{ $data->name }}</h5>
                <p class="card-text text-dark"> {{ $data->bahan_tas }}</p>
                <h3 class="text-dark">Rp{{ $data->price }}</h3>
            </div>
            <div class="button d-flex justify-content-center mb-3">
                <a href="/dashboardadminganteng/edit-product-{{ $data->id }}"
                    class="btn btn-primary py-2 px-4 mx-2">Edit</a>
                <form action="/dashboardadminganteng/products/{{ $data->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger py-2 px-4 mx-2" type="submit"
                        onclick="return confirm('yakin untuk menghapus product')">Delete</button>
                </form>
            </div>

        </div>
        @endforeach
</section>
@endsection