@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>
    <ul>
        @foreach ($tree as $item)
            <li>{{ $item->attribute1 }}</li> <!-- Adjust according to your data structure -->
        @endforeach
    </ul>
@endsection
