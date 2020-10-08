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
                        <th>Data</th>
                        <th>Pago</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($financeiros as $financeiro)
                        <tr>
                            <td>{{ $financeiro->imovel }}</td>
                            <td>{{ $financeiro->pessoa }}</td>
                            <td>{{ $financeiro->valor }}</td>
                            <td>{{ date('d/m/Y', strtotime($financeiro->data)) }}</td>
                            @if ($financeiro->pago)
                            <td>Sim</td>
                            @else
                            <td>Não</td>
                            @endif
                            <td><a href="{{ url()->current() }}/recibo/{{ $financeiro->id }}" onclick="return confirm('Você tem certeza?')"><i class="fa fa-receipt" aria-hidden="true"></i>Pagar</a></td>
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
    var dataTable = $('#people-table').DataTable();
</script>
@stop
