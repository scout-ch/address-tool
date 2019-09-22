@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-3">
                            <a class="btn btn-hitobito form-control{{ $errors->has('hitobito') ? ' is-invalid' : '' }}"
                                style="width: 100%"
                                href="{{ route('login.hitobito') }}">
                                {{ __('Via PBS MiData einloggen') }}
                            </a>

                            @if ($errors->has('hitobito'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('hitobito') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
