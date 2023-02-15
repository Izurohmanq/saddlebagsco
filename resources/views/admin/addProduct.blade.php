@extends ('../dashboard')

@section('container')
<section id="tambah">
    <div class="formtas">
        <form Action="/dashboardadminganteng/add-product" class="w-75 m-5" method="post" enctype="multipart/form-data">
            @csrf
            <div class="gambarTas">
                <label for="image" class="form-label">Gambar</label>
                <img class="img-preview img-fluid mb-3 col-md-5">
                <input type="file" accept="image/" class="form-control" id="image" name="image" required
                    onchange="previewImage()" />
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Montana" required />
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug"
                    placeholder="automatic-slug, just click tab" required readonly />
            </div>
            <div class="mb-3">
                <label for="bahan_tas" class="form-label">Bahan Produk</label>
                <input type="text" class="form-control" id="bahan_tas" name="bahan_tas" placeholder="Cordura Jansport"
                    required />
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">Jumlah Produk</label>
                <input type="number" class="form-control" id="qty" name="qty" placeholder="50" required />
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga Produk</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="125000" required />
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Produk</label>
                <textarea cols="10" rows="3" class="form-control" id="description" name="description"
                    placeholder="put your description in here" placeholder="Tulis deskripsi barang di sini"
                    required></textarea>
            </div>
            <button type="submit" class="btn btn-primary form-control">Submit</button>
        </form>
    </div>
</section>
<script>
// for slug
const name = document.querySelector('#name');
const slug = document.querySelector('#slug');

name.addEventListener('change', function() {
    fetch('/dashboardadminganteng/add-product/createSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
});

// for preview image
function previewImage() {
    const image = document.querySelector("#image");
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
</script>
@endsection