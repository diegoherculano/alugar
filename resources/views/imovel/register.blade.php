@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Imovel') }}
                </div>
                <div class="card-body">
                    @if (session()->has('status'))
                        <div class="alert alert-success">{{ session()->get('status') }}</div>
                    @endif

                    <form action="{{ route('imovelCreate')  }}" method="post">
                        {{ csrf_field() }}

                        {{-- Name field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                   value="{{ old('name') }}" placeholder="{{ __('Objeto da locação Ex: Sala Comercial') }}" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>

                        {{-- Logradouro field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="logradouro" class="form-control {{ $errors->has('logradouro') ? 'is-invalid' : '' }}"
                                   value="{{ old('logradouro') }}" placeholder="{{ __('Logradouro') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-map-marked-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('logradouro'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('logradouro') }}</strong>
                                </div>
                            @endif
                        </div>

                        {{-- Número field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="numero"
                                value="{{ old('numero') }}" class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}"
                                placeholder="{{ __('Número') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-map-marked-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('numero'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('numero') }}</strong>
                                </div>
                            @endif
                        </div>

                        {{-- Complemento field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="complemento"
                                value="{{ old('complemento') }}" class="form-control {{ $errors->has('complemento') ? 'is-invalid' : '' }}"
                                placeholder="{{ __('Complemento') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-map-marked-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('complemento'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('complemento') }}</strong>
                                </div>
                            @endif
                        </div>

                        {{-- Bairro field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="bairro"
                                value="{{ old('bairro') }}" class="form-control {{ $errors->has('bairro') ? 'is-invalid' : '' }}"
                                placeholder="{{ __('bairro') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-map-marked-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('bairro'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('bairro') }}</strong>
                                </div>
                            @endif
                        </div>

                        {{-- Cep field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="cep"
                                value="{{ old('cep') }}" class="form-control {{ $errors->has('cep') ? 'is-invalid' : '' }}"
                                placeholder="{{ __('cep') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-map-marked-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
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
                            <input type="text" name="cidade"
                                value="{{ old('cidade') }}" class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}"
                                placeholder="{{ __('cidade') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-map-marked-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
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
                            <input type="text" name="estado"
                                value="{{ old('estado') }}" class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}"
                                placeholder="{{ __('estado') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-map-marked-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('estado'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('estado') }}</strong>
                                </div>
                            @endif
                        </div>

                        {{-- Valor field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="valor"
                                value="{{ old('valor') }}" class="form-control {{ $errors->has('valor') ? 'is-invalid' : '' }}"
                                placeholder="{{ __('Valor') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-donate {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('valor'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('valor') }}</strong>
                                </div>
                            @endif
                        </div>

                        {{-- Register button --}}
                        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                            <span class="fas fa-user-plus"></span>
                            {{ __('adminlte::adminlte.register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
