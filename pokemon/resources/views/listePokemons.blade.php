@extends('template')

@section('style')
<link rel="stylesheet" href = "//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('content')

    <table id="pokemons" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>ENERGY</th>
                <th>HEALTH</th>
                <th>LEVEL</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($pokemons as $pokemon)
                <tr>
                    <td>{{$pokemon->id}}</td>
                    <td>{{$pokemon->name}}</td>
                    <td>{{$pokemon->energy->name}}</td>
                    <td>{{$pokemon->pv_max}}</td>
                    <td>{{$pokemon->level}}</td>
                    <td><img src = "{{$pokemon->path}}"></td>
                </tr>
            @endforeach
        </tbody>

    </table>

@endsection


@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="/js/listePokemons.js"></script>
@endsection