@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('auth_body')
    <form action="{{ $register_url }}" method="post">
        {{ csrf_field() }}

        {{-- Name field --}}
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                   value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        {{-- CPF field --}}
        <div class="input-group mb-3">
            <input type="text" name="cpf" class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}"
                   value="{{ old('cpf') }}" placeholder="{{ __('CPF') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('cpf'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('cpf') }}</strong>
                </div>
            @endif
        </div>

        {{-- Nacionalidade field --}}
        <div class="input-group mb-3">
            <input type="text" name="nacionalidade" class="form-control {{ $errors->has('nacionalidade') ? 'is-invalid' : '' }}"
                   value="{{ old('nacionalidade') }}" placeholder="{{ __('nacionalidade') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('nacionalidade'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('nacionalidade') }}</strong>
                </div>
            @endif
        </div>

        {{-- Estado civil field --}}
        <div class="input-group mb-3">
            <input type="text" name="estadoCivil" class="form-control {{ $errors->has('estadoCivil') ? 'is-invalid' : '' }}"
                   value="{{ old('estadoCivil') }}" placeholder="{{ __('estadoCivil') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('estadoCivil'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('estadoCivil') }}</strong>
                </div>
            @endif
        </div>
        {{-- Profissao field --}}
        <div class="input-group mb-3">
            <input type="text" name="profissao" class="form-control {{ $errors->has('profissao') ? 'is-invalid' : '' }}"
                   value="{{ old('profissao') }}" placeholder="{{ __('profissao') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('profissao'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('profissao') }}</strong>
                </div>
            @endif
        </div>
        {{-- Logradouro field --}}
        <div class="input-group mb-3">
            <input type="text" name="logradouro" class="form-control {{ $errors->has('logradouro') ? 'is-invalid' : '' }}"
                   value="{{ old('logradouro') }}" placeholder="{{ __('logradouro') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('logradouro'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('logradouro') }}</strong>
                </div>
            @endif
        </div>
        {{-- numero field --}}
        <div class="input-group mb-3">
            <input type="text" name="numero" class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}"
                   value="{{ old('numero') }}" placeholder="{{ __('numero') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('numero'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('numero') }}</strong>
                </div>
            @endif
        </div>
        {{-- Bairro field --}}
        <div class="input-group mb-3">
            <input type="text" name="bairro" class="form-control {{ $errors->has('bairro') ? 'is-invalid' : '' }}"
                   value="{{ old('bairro') }}" placeholder="{{ __('bairro') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('bairro'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('bairro') }}</strong>
                </div>
            @endif
        </div>
        {{-- CEP field --}}
        <div class="input-group mb-3">
            <input type="text" name="cep" class="form-control {{ $errors->has('cep') ? 'is-invalid' : '' }}"
                   value="{{ old('cep') }}" placeholder="{{ __('cep') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('cep'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('cep') }}</strong>
                </div>
            @endif
        </div>
        {{-- Cidade field --}}
        <div class="input-group mb-3">
            <input type="text" name="cidade" class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}"
                   value="{{ old('cidade') }}" placeholder="{{ __('cidade') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('cidade'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('cidade') }}</strong>
                </div>
            @endif
        </div>
        {{-- Estado field --}}
        <div class="input-group mb-3">
            <input type="text" name="estado" class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}"
                   value="{{ old('estado') }}" placeholder="{{ __('estado') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('estado'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('estado') }}</strong>
                </div>
            @endif
        </div>
        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password"
                   class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('adminlte::adminlte.password') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>

        {{-- Confirm password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('adminlte::adminlte.retype_password') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
            @endif
        </div>

        {{-- Register button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('adminlte::adminlte.register') }}
        </button>

    </form>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ $login_url }}">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop
