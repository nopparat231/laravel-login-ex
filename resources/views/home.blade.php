@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        <h1>Add Line For Notify</h1>
                        <img src="https://qr-official.line.me/sid/L/573pogdt.png" >

                        <form action="{{ route('line.hooks') }}" method="post">
                            {{-- <input type="text" name="t_id" id="t_id"> --}}
                            <input type="text" name="message" id="message">
                            <button type="send" class="btn btn-primary">Send</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
