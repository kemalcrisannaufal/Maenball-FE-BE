@extends('layouts.mainLayout')

@section('content')
    @foreach ($data as $value)
    {{$value['name']}}

    @endforeach
@endsection
