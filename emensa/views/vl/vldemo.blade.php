@extends('vl.layout.stdlayout')

@section('main')
@include('vl.includes.listtitle',['title'=> $title])

<ul>
    @foreach($gerichte as $gericht)
        <li>
            {{$gericht['name']}}
            {{$gericht['preis_intern']}}
        </li>
    @endforeach
</ul>
@endsection


