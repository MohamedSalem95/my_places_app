@extends('layouts.master')

@section('title', 'Home')

@section('content')
    @php
        // we store the places number in a var to avoid hitting the database twice
        $places_count = $places->count()
    @endphp
    <p class="text-muted">
        All saved places 
        <b> {{ $places_count }} {{ str_plural('place', $places_count) }} </b>
    </p>

    <table class="table table-striped table-hover">

        <thead>
            <tr>
                <th> Name </th>
                <th> Address </th>
                <th> Lat </th>
                <th> Lng </th>
                <th> Time Added </th>
                <th> Action </th>
                
            </tr>
        </thead>

        <tbody>
            @forelse($places as $place)
                <tr>
                    <td> {{ $place->place_name }} </td>
                    <td> {{ $place->palce_address }} </td>
                    <td> {{ $place->lat }} </td>
                    <td> {{ $place->lng }} </td>
                    <td> {{ $place->date_for_humans }} </td>
                    <td>
                    <form action="{{ route('places.destroy', $place->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-small btn-outline-danger" onClick="return confirm('are you sure?')">
                            <i class="fas fa-trash-alt"></i>
                            delete
                        </button>
                    </form>
                    </td>
                </tr>

            @empty
                <p> 
                    no places added yet you can add a new place 
                    <a href="{{ route('places.create') }}"> here </a>
                </p>
            @endforelse
        </tbody>

    </table>
    {{ $places->links() }}
@endsection