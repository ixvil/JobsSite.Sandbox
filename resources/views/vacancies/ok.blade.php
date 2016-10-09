@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            Vacancy '{{ $vacancy->title }}' now has status {{$vacancy->vacancyStatus->name }}
        </div>
    </div>

@endsection