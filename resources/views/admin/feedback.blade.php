@extends ('../dashboard')

@section('container')
<section id="curhatan">
    <div class="container">
        <h2 class="text-center">Curhatan</h2>

        @foreach ($data as $data2)
        <!-- card for feedback -->
        <div class="card w-100 mt-4 m-auto">
            <div class="card-body">
                <div class="row">
                    <div class="text col-md-8">
                        <h5 class="card-title fs-6 fw-bold">{{ $data2->email }}</h5>
                        <p class="card-text">{{ $data2->message }}</p>
                    </div>
                    <div class="trash col-md-4 text-end">
                        <form action="/dashboardadminganteng/feedback/{{$data2->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn">
                                <img width="25px" align="right" src="../ASSETS/images/trash-bin.png" alt="runtah">
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center mt-4">
            {{ $data->links() }}
        </div>
    </div>
</section>
@endsection