@extends('template')

@section('style')

@endsection

@section('content')

    <table id="pokemons" class="display">
        <thead>
            <tr>
                <th>id</th>;
                <th>name</th>;
                <th>energy</th>;
                <th>level</th>;
                <th>pv</th>;
                <th>image</th>;
            </tr>
        </thead>

        @foreach($pokemons as $pokemon)
            <td> {{$pokemon->name}} </td>
            <td> {{$pokemon->energy}} </td>
            <td> {{$pokemon->pv_max}} </td>
            <td> {{$pokemon->level}} </td>
        @endforeach

    </table>;

@endsection


@section('script')
<script src="/js/listePokemons.js"></script>
@endsection