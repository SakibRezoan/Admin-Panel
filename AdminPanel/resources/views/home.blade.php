@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="text-center">
                <h2>You Are the admin of the project. Do whatever you want here.</h2>
            </div>
        </div>
    </div>
</div>
@endsection
