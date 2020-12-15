@extends('praktikum.layout.praktikumly')
@section('title', 'E-Mensa')
@section('content')
    <div id="reception">

        <div></div>
        <div id="mittel">

            <img id= "img2" src="/img/willkommen.jpeg" alt="Wilkommen-Bild">

            <div id ="ankündigung">
                <h2 id = "text1"> Bald gibt es Essen auch Online ;)</h2>

                <label for="textarea1"></label>
                <textarea id="textarea1" name="text" rows="8" cols="84">
            Hier sollen wir noch dieser Text reinschreiben.
            Das konnte ich nur schwer lesen
                </textarea>
            </div>
            <div id ="speisen">
                <h2 id = "text2" > Köstlichtkeiten,die Sie erwarten</h2>
            </div>
            <!-- ////////////////////////////////////////////////////////////////////////////-->


         <table class="table table-bordered" id="table1">
             <thead>
             <tr>
                 <th >Name</th>
                 <th scope="col">Preis Intern</th>
                 <th scope="col">Preis Extern</th>
                 <th scope="col">Allergen Code</th>
                 <th scope="col">Picture</th>

             </tr>
             </thead>

            <tbody>

    @foreach($data as $gericht)
        <tr>
             <td>{{ $gericht['gname']}}</td>
            <td>{{ $gericht['preis_intern']}}€</td>
            <td>{{ $gericht['preis_extern']}}€</td>
            <td>{{ $gericht['code']}}
            <td> <img src="img/{{$gericht['bildname']}}" alt = "nichts zu zeigen" height ="100" width ="150"> </td>
        </tr>
    @endforeach
@endsection