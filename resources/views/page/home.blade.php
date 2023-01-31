@extends ('../index')


@section('container')

<!-- jumbotron -->

<section id="opening">
    <h2>Saddlebagsco</h2>
    <p>-Sidebag-</p>
</section>

<!-- AKhir jumbotron -->

<!-- content -->
<section class="content">
    <div class="content-rigth">
        <img src="./ASSETS/images/tas 3 - Copy.jpg" width="300px" alt="motor tas" />
    </div>
    <div class="content-left">
        <h1>PACK IT SAFE RIDE</h1>
        <p class="fs-5">
            Welcome to SaddlebagsCo, where classic motorcycle enthusiasts can find the perfect saddlebags for
            their ride.
        </p>
        <a href="/products"><button>Explore Product</button></a>
    </div>
</section>
<!-- akhir content -->

<!-- yt -->
<section id="video" class="video">
    <div class="text-center">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/VKRf5IbE1GE" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>
</section>
<!-- akhir yt -->

<!-- carousel -->
<section id="carrousel" class="carrousel py-5">
    <h1 class="text-center pb-5">Best Product</h1>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./ASSETS/images/Frame 3.png" class="d-block mx-auto" alt="montana" />
                <div class="carousel-caption d-none d-md-block mb-5 pb-5"></div>
            </div>
            <div class="carousel-item">
                <img src="./ASSETS/images/Frame 2.png" class="d-block mx-auto" alt="saddlebags" />
                <div class="carousel-caption d-none d-md-block mb-5 pb-5"></div>
            </div>
            <div class="carousel-item">
                <img src="./ASSETS/images/Frame 4.png" class="d-block mx-auto" alt="pack it safe ride" />
                <div class="carousel-caption d-none d-md-block mb-5 pb-5"></div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<!-- akhir carousel -->

<section id="closing" class="closing">
    <div class="contain w-75 mx-auto mb-5">
        <img src="./ASSETS/images/Group 4.png" class="w-100 mb-5" alt="dari Customer" />
        <h2><a href="https://www.instagram.com/p/BzmyCqJnAV1/">@jeasism</a></h2>
        <div class="caption">
            <div class="row">
                <div class="col-md">
                    <p>
                        "Jelas looks si Nyonya Tua pun perlu kita perhatikan, kurang
                        puas jika kita ajak berkeliling tanpa dandanan yang pas"
                    </p>
                </div>
                <div class="col-md">
                    <p>
                        "Leather Sidebag @saddlebags.co jelas pas dan cocok buat si
                        Nyonya Tua! Semakin buatnya berisi, curvy dan gahar!""
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
// // Get the elements with the class "content"
// function parallaxFade(className) {
//     // Get the elements with the class "parallax"
//     var elements = document.getElementsByClassName(className);

//     // Loop through each element with the class "parallax"
//     for (var i = 0; i < elements.length; i++) {
//         // Get the current element
//         var element = elements[i];
//         // Get the element's distance from the top of the page
//         var distance = element.getBoundingClientRect().top;
//         // Get the distance as a percentage of the viewport height
//         var distancePercent = distance / window.innerHeight;
//         // Set the element's opacity based on the distance
//         element.style.opacity = 1 - (distancePercent * 0.39);
//     }
// }

// window.addEventListener("scroll", function() {
//     parallaxFade("content")
// });
// window.addEventListener("scroll", function() {
//     parallaxFade("video")
// });
// window.addEventListener("scroll", function() {
//     parallaxFade("carrousel")
// });
// window.addEventListener("scroll", function() {
//     parallaxFade("closing")
// });

// Get all parallax elements
var satu = document.querySelectorAll('.content');
var dua = document.querySelectorAll('.video');
var tiga = document.querySelectorAll('.carrousel');
var empat = document.querySelectorAll('.closing');

loop('.content');
loop('.video');
loop('.carrousel');
loop('.closing');

// function Loop through all parallax elements
function loop(param) {
    var parameter = document.querySelectorAll(param);
    parameter.forEach(function(parallaxElement) {
        // Get the position of the element
        var parallaxPosition = parallaxElement.getBoundingClientRect().top;

        // Check if the element is in view when the page is loaded
        checkParallax(parallaxElement, parallaxPosition);

        // Listen for scroll events
        window.addEventListener('scroll', function() {
            checkParallax(parallaxElement, parallaxPosition);
        });
    });
}

function checkParallax(parallaxElement, parallaxPosition) {
    // Get the current scroll position
    var scrollPosition = window.pageYOffset;

    // Check if the parallax element is in view
    if (scrollPosition >= parallaxPosition - window.innerHeight) {
        // Add the "show" class to fade in the element
        parallaxElement.classList.add('muncul');
    }
}
</script>
@endsection