@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('mailer-send') }}">
                            @csrf

                            <input type="email"  name="email" placeholder="Mail-Adresse" />
                            <input type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection