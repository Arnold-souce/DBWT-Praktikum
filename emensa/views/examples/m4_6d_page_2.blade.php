

@extends('examples.layout.m4_6d_layout')

@section('title', 'Page_1')

@section('header')
    <h1>header of page_2</h1><br>
    @parent
@endsection


@section('main')
    this is the main of page_2

@endsection

@section('footer')
    @parent
    this is the header of page_2


@endsection


