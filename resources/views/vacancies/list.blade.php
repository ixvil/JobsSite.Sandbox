@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>Title</th>
                    <th>Email</th>
                    <th>Description</th>
                </tr>

                @forelse($vacancies as $vacancy)
                    <tr>
                        <td>{{ $vacancy->title }}</td>
                        <td>{{ $vacancy->email }}</td>
                        <td>{{ $vacancy->description }}</td>
                    </tr>

                @empty
                    <li class="list-group-item list-group-item-warning">No vacancies</li>
                @endforelse
            </table>
            {{ $vacancies->links() }}
        </div>
    </div>

@endsection