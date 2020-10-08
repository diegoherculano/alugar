@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('People') }}
                </div>
                <div class="card-body">
                    @if (session()->has('status'))
                        <div class="alert alert-success">{{ session()->get('status') }}</div>
                    @endif
                    <form action="{{ route('pessoaCreate')  }}" method="post">
                        {{ csrf_field() }}

                        {{-- Name field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                   value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>
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

                        {{-- Cpf field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="cpf" class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}"
                                   value="{{ old('cpf') }}" placeholder="{{ __('CPF Number') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('cpf'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('cpf') }}</strong>
                                </div>
                            @endif
                        </div>
                        {{-- rg field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="rg" class="form-control {{ $errors->has('rg') ? 'is-invalid' : '' }}"
                                value="{{ old('rg') }}" placeholder="{{ __('Número RG mais local de Emissão Ex: 4321 SSP-PB') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('rg'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('rg') }}</strong>
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
                        {{-- Phone field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="phone"
                                value="{{ old('phone') }}" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                placeholder="{{ __('Phone Number') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('phone') }}</strong>
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
