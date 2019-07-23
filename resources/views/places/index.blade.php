@extends('layouts.master')

@section('title', 'Home')

@section('content')
    @php
        // we store the places number in a var to avoid hitting the database twice
        $places_count = $places->count()
    @endphp
    @if($places->count() > 0)
        <p class="text-muted">
            you currently saved <b> {{ $places_count }} </b> {{ str_plural('place', $places_count) }}
            all are shown with markers on the map, 
            to add a new place you can go <a href="{{ route('places.create') }}"> here </a>
            or use the add link above.
        </p>
    @else
        <p>
            you dont have any saved places yet, to add a new place you can go
            <a href="{{ route('places.create') }}"> here </a>
            or use the add link above.
        </p>
    @endif
    <div id="myMap" style="height: 450px;"></div>


   
@endsection

@section('scripts')
    <script>
        function initMap(){
            // the start location of the map here i used cairo location
            var startingPlace = {lat: 30.044281, lng: 31.340002}

            // draw the map
            var map = new google.maps.Map(document.getElementById('myMap'), {zoom: 7, center: startingPlace})
            
            

            // draw all saved places on the map
            @foreach($places as $place)
                var pos = {lat: {{ $place->lat }}, lng: {{ $place->lng}}}
                var marker = new google.maps.Marker({position: pos})
                marker.setMap(map)
            @endforeach


        }

    </script>



    <!-- include google maps and google places -->
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap"></script>

@endsection