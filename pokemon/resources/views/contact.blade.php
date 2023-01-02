// create the contact.blade.php file

@extends('layouts.app')


@section('title', 'Contact')

@section('style')
    <style>
        .contact{
            margin-top: 100px;
            margin-bottom: 100px;
        }
        .contact h1{
            text-align: center;
        }
        .contact form{
            margin-top: 50px;
        }
        .contact form input{
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        .contact form textarea{
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        .contact form button{
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>

@endsection

@section('content')
    <div class="container contact">
        <div class="row">
            <div class="col-md-12"> 
                <h1 style="color: aliceblue">Envoyez votre meesage</h1>
                <form action="/contact/submit" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="Name">
                    <input type="email" name="email" placeholder="Email">
                    <textarea name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
                    <button type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </div>

@endsection