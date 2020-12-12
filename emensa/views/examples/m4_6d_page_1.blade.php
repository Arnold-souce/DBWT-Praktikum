

@extends('examples.layout.m4_6d_layout')

@section('title', 'Page_1')

@section('header')
    <h1>header of page_1</h1><br>
    @parent
@endsection


@section('main')
    <p>main of page_1</p>
@endsection

@section('footer')
    @parent
    <h3>header of page_1</h3>

    @parent
@endsection

