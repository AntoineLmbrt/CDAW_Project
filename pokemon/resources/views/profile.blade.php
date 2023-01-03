@extends('layouts.app')

@section('title', 'Profile')

@section('style')
    <style>
        .table-user{
            width: 100%;
            border: 1px solid #000000;
            border-collapse: collapse;
        }
        .table-user tr td{
            border: 1px solid #000000;
            padding: 10px;
        }
        .table-user tr td:first-child{
            font-weight: bold;
        }
        .profile-user{
            margin-bottom: 3%;
            margin-top: 10%;
        }
    </style>

@endsection

@section('content')
    <div class="container profile-user">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Profil</h1>
                    </div>
                    <div class="card-body">
                        <form class="h-add-bottom" method="POST" action="/profile">
                            @csrf
                            @method('PUT')
                            
                            <!-- Name -->
                            <div class="mb-3 row">
                              <label class="col-sm-2 col-form-label" for="name"><span class="h5">@lang('Name')</span></label>
                              <div class="col-sm-10">  
                              <input 
                                  id="name" 
                                  class="h-full-width h5" 
                                  type="text" 
                                  name="name" 
                                  placeholder="@lang('Your name')" 
                                  value="{{ old('name', auth()->user()->name) }}" 
                                  required 
                                  autofocus>
                              </div>
                            </div>
                            <!-- Email Address -->
                             <div class="mb-3 row">
                              <label class="col-sm-2 col-form-label" for="email"><span class="h5">@lang('Email')</span></label>
                              <div class="col-sm-10">   
                              <input 
                                  id="email" 
                                  class="h-full-width h5" 
                                  type="email" 
                                  name="email" 
                                  placeholder="@lang('Your email')" 
                                  value="{{ old('email', auth()->user()->email) }}" 
                                  required>
                              </div>
                            </div>
                            
                            <!-- Password -->
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label" for="password"><span class="h5">@lang('Mot de passe') (@lang('optional'))</span></label>
                                <div class="col-sm-10">
                                <input 
                                    id="password" 
                                    class="h-full-width h5" 
                                    type="password" 
                                    name="password" 
                                    placeholder="@lang('password')">
                                </div>
                            </div>
                            
                            <!-- Confirm Password -->
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label" for="password_confirmation"><span class="h5">@lang('Confirmez le mot de passe')</span></label> 
                                <div class="col-sm-10">
                                <input 
                                    id="password_confirmation" 
                                    class="h-full-width h5" 
                                    type="password" 
                                    name="password_confirmation" 
                                    placeholder="@lang('Confirmez le password')">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="d-grid gap-2 col-4 " style="margin-left: 2%">
                                    <button type="submit" class="border-bottom border-5 border-success btn btn-outline-success h5">
                                        @lang('Enregistrer')
                                    </button>
                                </div>
                            </div>
                             
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection