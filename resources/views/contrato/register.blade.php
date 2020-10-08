@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Contrato') }}
                </div>
                <div class="card-body">
                    @if (session()->has('status'))
                        <div class="alert alert-success">{{ session()->get('status') }}</div>
                    @endif
                    <form action="{{ route('contratoCreate')  }}" method="post">
                        {{ csrf_field() }}

                        {{-- id_imovel field --}}
                        <div class="input-group mb-3">
                            <select type="text" name="id_imovel" class="form-control {{ $errors->has('id_imovel') ? 'is-invalid' : '' }}"
                                   value="{{ old('id_imovel') }}" placeholder="{{ __('Escolha o imovel') }}" autofocus>
                                   @foreach($imovels as $imovel)
                                        <option value="{{ $imovel->id }}">{{ $imovel->name }}</option>
                                    @endforeach
                            </select>

                            @if($errors->has('id_imovel'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('id_imovel') }}</strong>
                                </div>
                            @endif
                        </div>

                        {{-- id_pessoa field --}}
                        <div class="input-group mb-3">
                            <select type="text" name="id_pessoa" class="form-control {{ $errors->has('id_pessoa') ? 'is-invalid' : '' }}"
                                   value="{{ old('id_pessoa') }}" placeholder="{{ __('Escolha a pessoa') }}">
                                   @foreach($pessoas as $pessoa)
                                        <option value="{{ $pessoa->id }}">{{ $pessoa->name }}</option>
                                    @endforeach
                            </select>

                            @if($errors->has('id_pessoa'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('id_pessoa') }}</strong>
                                </div>
                            @endif
                        </div>

                        {{-- vencimento field --}}
                        <div class="input-group mb-3">
                            <input type="date" name="vencimento" class="form-control {{ $errors->has('vencimento') ? 'is-invalid' : '' }}"
                                   value="{{ old('vencimento') }}" placeholder="{{ __('Escolha a pessoa') }}">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('vencimento'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('vencimento') }}</strong>
                                </div>
                            @endif
                        </div>
                        {{-- prazdo de locação field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="prazo" class="form-control {{ $errors->has('prazo') ? 'is-invalid' : '' }}"
                                value="{{ old('prazo') }}" placeholder="{{ __('Quantidade/Prazo de locação em meses') }}" autofocus>

                            @if($errors->has('prazo'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('prazo') }}</strong>
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

@section('plugins.Select2', true)

@section('js')
<script>
    $(document).ready(function() {
        $('select[name="id_pessoa"]').select2({
            placeholder: 'Selecione',
            width: '100%'
        });
        $('select[name="id_imovel"]').select2({
            placeholder: 'Selecione',
            width: '100%'
        });
    });
</script>
@endsection
