@extends('layouts.master')

@section('title', 'create new place')

@section('content')

    <div class="row">
        <div class="col-sm-12">
                <form action="{{ route('places.store') }}" method="post">
                    @csrf
                    @if($errors->has('lat') or $errors->has('lng') )
                        <div class="text-danger">
                            <strong> please choose a valid place </strong>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="place_name"> Name </label>
                        <input type="text" id="place_name" name="place_name" class="form-control @if($errors->has('place_name')) is-invalid @endif" value="{{ old('place_name') }}" placeholder="Enter Place Name">
                        
                    
                        @foreach($errors->get('place_name') as $error)
                            <div class="invalid-feedback">
                                <strong> {{ $error }} </strong>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="place_address"> Address </label>
                        <input type="text" id="place_address" name="palce_address" class="form-control @if($errors->has('palce_address')) is-invalid @endif" value="{{ old('palce_address') }}" placeholder="Enter Place Address">
                        <small class="form-text text-muted"> type the address to enable autocomplete feature </small>
                        @foreach($errors->get('palce_address') as $error)
                            <div class="invalid-feedback">
                                <strong> {{ $error }} </strong>
                            </div>
                        @endforeach
                    </div>
                    <div id="myMap" style="height: 500px"></div>
                    <div class="form-group">
                        <input type="hidden" id="lat" name="lat" class="form-control" placeholder="Enter Place Address">
                        
                    </div>

                    <div class="form-group">
                        <input type="hidden" id="lng" name="lng" class="form-control" placeholder="Enter Place Address">
                        
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            save place
                        </button>
                    </div>
                </form>

        </div>
    </div>

    

@endsection

@section('scripts')

    <script>
        // initialze the map
        function initMap(){
            // our starting place will be cairo
            var startingPlace = {lat: 30.044281, lng: 31.340002}

            // get the lat and lng in the form we will use them later
            var lat = document.getElementById('lat')
            var lng = document.getElementById('lng')

            // draw the map
            var map = new google.maps.Map(document.getElementById('myMap'), {zoom: 10, center: startingPlace})
            
            // place a mrker on the current position
            var marker = new google.maps.Marker({position: startingPlace});
            marker.setMap(map);

            // create auto complete object and link it to our place address input
            var input = document.getElementById('place_address');
            // link it
            var autocomplete = new google.maps.places.Autocomplete(input)
            autocomplete.setFields(['address_components', 'geometry', 'icon', 'name']);

            /* 
                add event listener to the auto complete
                when the user chooses a place from the dropdown
                or hit enter key move the map to that place
                and chenge its center to the new geometry and place the marker on the new place
            */
            autocomplete.addListener('place_changed', function(){
                var place = autocomplete.getPlace();

                if(!place.geometry){
                    // User entered the name of a Place that was not suggested and
                    // pressed the Enter key, or the Place Details request failed.

                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);  // Why 17? Because it looks good.
                }

                // move the marker to the new place
                marker.setPosition(place.geometry.location);
                

                // fill the lat and lng in the form
                lat.value = place.geometry.location.lat()
                lng.value = place.geometry.location.lng()
            });

           
            
            }
    
    </script>

    <!-- include google maps and places api -->
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap"></script>

@endsection