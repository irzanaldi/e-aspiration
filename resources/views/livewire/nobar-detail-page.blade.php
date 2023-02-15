<div>
    <h1>Nobar Detail</h1>

        <div class="card">
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-xl-2 fw-bolder">UUID</div>
                    <div class="col-xl-8">{{ $nobar->uuid }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-xl-2 fw-bolder">Name</div>
                    <div class="col-xl-8">{{ $nobar->name }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-xl-2 fw-bolder">Location</div>
                    <div class="col-xl-8">{{ $nobar->location }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-xl-2 fw-bolder">City</div>
                    <div class="col-xl-8">{{ $nobar->city }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-xl-2 fw-bolder">Price</div>
                    <div class="col-xl-8">{{ $nobar->price }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-xl-2 fw-bolder">Gmaps Latitude</div>
                    <div class="col-xl-8">{{ $nobar->gmaps_latitude }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-xl-2 fw-bolder">Gmaps Longitude</div>
                    <div class="col-xl-8">{{ $nobar->gmaps_longtitude }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-xl-2 fw-bolder">Date</div>
                    <div class="col-xl-8">{{ $nobar->date }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-xl-2 fw-bolder">Time</div>
                    <div class="col-xl-8">{{ $nobar->time }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-xl-2 fw-bolder">ID TMDB</div>
                    <div class="col-xl-8">{{ $nobar->id_tmdb }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-xl-2 fw-bolder">Created By</div>
                    <div class="col-xl-8">{{ $nobar->admin->username }}</div>
                </div>
            </div>
        </div>
</div>
