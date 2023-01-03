

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
                <h1 style="color: aliceblue">Envoyez votre message</h1>
                <form action="/contact/submit" method="post">
                    @csrf
                    <fieldset>
                        @if(Auth::guest())
                            <!-- Name -->
                            <div>
                              <input 
                                  id="name" 
                                  class="h-full-width" 
                                  type="text" 
                                  name="name" 
                                  placeholder="@lang('Votre pseudo')" 
                                  value="{{ old('name') }}" 
                                  required 
                                  autofocus>
                            </div>
                            <!-- Email Address -->
                            <div>
                              <input 
                                  id="email" 
                                  class="h-full-width" 
                                  type="email" 
                                  name="email" 
                                  placeholder="@lang('Votre email')" 
                                  value="{{ old('email') }}" 
                                  required>
                            </div>
                            
                        @endif
                        <!-- Message -->                          
                        <textarea name="message" id="message" class="h-full-width" placeholder="@lang('Votre message')" required>{{ old('message') }}</textarea>                          
                        <br>
                        <button type="submit" class="border-bottom border-5 border-warning btn btn-secondary btn-outline-warning"><span class="h5"> @lang('Envoyer') </span></button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

@endsection