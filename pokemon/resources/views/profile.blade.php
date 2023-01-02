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
            margin-bottom: 200px;
        }
    </style>

@endsection

@section('content')
    <div class="container profile-user">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Profile</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table-user">
                                
                                    <tr>
                                        <td>Username</td>
                                        <td>{{auth()->user()->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{auth()->user()->email}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Level</td>
                                        <td>{{auth()->user()->level}}</td>
                                    <tr>
                                        <td>Created at</td>
                                        <td>{{auth()->user()->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>Updated at</td>
                                        <td>{{auth()->user()->updated_at}}</td>
                                    </tr>
                                </table>
                            </div>
                            
                            
                            <div class="col-md-8">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection