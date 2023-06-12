<div>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-50 h-50" src="{{ asset('assets/images/test.jpeg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-50 h-50" src="{{ asset('assets/images/test.jpeg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-50 h-50" src="{{ asset('assets/images/test.jpeg') }}" alt="Third slide">
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('assets/images/test.jpeg') }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="{{ route('event.index') }}" class="btn btn-primary">Buy</a>
            </div>
        </div>
    </div>


</div>
