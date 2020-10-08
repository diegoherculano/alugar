@extends('adminlte::page')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List</h3>
    </div>
    <div class="card-body">
        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <table id="people-table" class="table table-striped table-bordered dataTable" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Imóvel</th>
                        <th>Pessoa</th>
                        <th>Valor</th>
                        <th>Vencimento</th>
                        <th>Ação</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contratos as $contrato)
                        <tr>
                            <td>{{ $contrato->imovel }}</td>
                            <td>{{ $contrato->pessoa }}</td>
                            <td>{{ $contrato->valor }}</td>
                            <td>{{ date('d/m/Y', strtotime($contrato->vencimento)) }}</td>
                            <td>
                                <a href="{{ url()->current() }}/delete/{{ $contrato->id }}" onclick="return confirm('ATENÇÃO! Todas as parcelas vinculadas ao contrato serão excluídas! Você tem certeza?')"><i class="fa fa-trash" aria-hidden="true"></i>Deletar</a>
                            </td>
                            <td>
                                <a href="{{ url()->current() }}/gerarWord/{{ $contrato->id }}" onclick="return confirm('Esta ação requer tempo. Não saia da janela até o download iniciar!')"><i class="fas fa-file-signature    "></i>Gerar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('plugins.Datatables', true)
@section('js')
<script>
    $('#people-table').DataTable();
</script>
@stop
