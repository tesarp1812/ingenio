@extends('layout')



@section('body')
    <h1>halo {{ auth()->user()->name }}</h1>
@endsection
