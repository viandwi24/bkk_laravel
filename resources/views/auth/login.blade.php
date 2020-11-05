@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @lang('ui.login')
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        {{-- @php \Symfony\Component\VarDumper\VarDumper::dump($errors->any()) @endphp --}}

                        <div class="form-group row">
                            <label for="as" class="col-md-4 col-form-label text-md-right">
                                @lang('ui.auth.as')
                            </label>
                            <div class="col-md-6">
                                <select class="form-control custom-select @error('as') is-invalid @enderror" id="inputGroupSelect01" name="as">
                                    <option @if(old('as', null) == null) selected @endif>Pilih...</option>
                                    <option @if(old('as', null) == 'worker') selected @endif value="worker">@lang('ui.auth.as_select.worker')</option>
                                    <option @if(old('as', null) == 'partner') selected @endif value="partner">@lang('ui.auth.as_select.partner')</option>
                                    <option @if(old('as', null) == 'admin') selected @endif value="admin">@lang('ui.auth.as_select.admin')</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                @lang('ui.auth.email')
                            </label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                @lang('ui.auth.password')
                            </label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        @lang('ui.auth.remember_password')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('ui.login')
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        @lang('ui.auth.forgot_password')
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
