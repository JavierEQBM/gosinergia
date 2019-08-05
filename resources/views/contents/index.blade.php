@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mb-3">
            <b-alert show>
                @auth
                    You are logged in!
                @else
                    Guest
                @endauth
            </b-alert>
        </div>

        @auth
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header">Agregar</div>

                <div class="card-body">
                    <form-product-component></form-product-component>
                </div>
            </div>
        </div>
        @endauth

        <div class="col-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <products-component :login="{{(auth()->check()) ? 1 : 0}}"></products-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
