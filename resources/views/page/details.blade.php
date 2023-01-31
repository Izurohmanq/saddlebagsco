@extends ('../index')

@section('container')
<section id="openProduct">
    <div class="open d-flex justify-content-center align-items-center">
        <div class="fotoProduct">
            <img src="{{ asset('storage/images/products/'.$data->image) }}" alt="{{ $data->name }}"
                class="jumbo mb-3 justify-content-center" />
        </div>
        <div class="contentProduct ms-3">
            <h2>{{  $data->name  }}</h2>
            <p>{{  $data->bahan_tas  }}</p>
            <h4>Rp{{  $data->price  }}</h4>
            <p>
                {{  $data->description  }}
            </p>
            <p>
                sisa {{  $data->qty  }} tas
            </p>
            <a href="https://wa.me/62895800191830?text=Halo!!%20saya%20berminat%20dengan%20{{$data->name}},%20apakah%20masih%20tersedia?%20"
                class="btn">Order via Whatsapp</a>
            <!-- <div class="btn">Order via Whatsapp</div> -->

        </div>
    </div>


</section>
@endsection