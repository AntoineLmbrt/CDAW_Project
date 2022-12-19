@extends('layouts.app2')

@section('style')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="css/pokedex.css"> 
@endsection

@section('content')
    <h1>POKEDEX</h1>
    <div id="datatable">
        <table id="pokedex" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    
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
                        
                        <td>{{$pokemon->pv_max}}</td>
                        <td>{{$pokemon->level}}</td>
                        <td><img src = "{{$pokemon->path}}"></td>
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