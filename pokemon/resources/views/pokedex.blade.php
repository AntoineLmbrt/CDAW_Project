@extends('layouts.app')

@section('title', 'Bestaire')

@section('style')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="css/pokedex.css"> 
@endsection

@section('content')
    <div id="datatable" style="margin-left: 3.35%;margin-right: 3.35%;">
        <table id="pokedex" class="display">
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
                        <td>{{$pokemon->hp}}</td>
                        <td>{{$pokemon->level}}</td>
                        <td><img style="height: 200px; width: 200px;" src = "{{$pokemon->image}}"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="/js/pokedex.js"></script>
@endsection