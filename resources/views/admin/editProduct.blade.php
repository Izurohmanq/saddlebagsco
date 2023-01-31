@extends ('../dashboard')

@section('container')
<section id="tambah">
    <img src="{{ asset('storage/images/products/'.$data->image) }}" class="ms-5 rounded-3"
        alt="{{ asset('storage/images/products/'.$data->image) }}" style="width:400px;">
    <div class="formtas">
        <form Action="/dashboardadminganteng/edit-product-{{ $data->id }}" class="w-75 m-5" method="post"
            enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="gambarTas">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" accept="image/" class="form-control" id="image" name="image"
                    value="{{ $data->image }}" />
                <span> foto sekarang: {{ old('image',$data->image) }} </span>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required />
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $data->slug }}" required
                    readonly />
            </div>
            <div class="mb-3">
                <label for="bahan_tas" class="form-label">Bahan Produk</label>
                <input type="text" class="form-control" id="bahan_tas" name="bahan_tas" value="{{ $data->bahan_tas }}"
                    required />
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">Jumlah Produk</label>
                <input type="number" class="form-control" id="qty" name="qty" value="{{ $data->qty }}" required />
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga Produk</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $data->price }}" required />
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Produk</label>
                <textarea cols="10" rows="3" class="form-control" id="description" name="description"
                    placeholder="Tulis deskripsi barang di sini" required>{{ $data->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary form-control">Submit</button>
        </form>
    </div>
</section>
<script>
const name = document.querySelector('#name');
const slug = document.querySelector('#slug');

name.addEventListener('change', function() {
    fetch('/dashboardadminganteng/add-product/createSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
});
</script>
@endsection