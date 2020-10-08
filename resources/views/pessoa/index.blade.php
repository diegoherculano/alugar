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
                        <th>Name</th>
                        <th>CPF</th>
                        <th>Phone</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pessoas as $pessoa)
                        <tr>
                            <td>{{ $pessoa->name }}</td>
                            <td>{{ $pessoa->cpf }}</td>
                            <td>{{ $pessoa->telefone }}</td>
                            <td><a href="{{ url()->current() }}/delete/{{ $pessoa->id }}" onclick="return confirm('Você tem certeza?')"><i class="fa fa-trash" aria-hidden="true"></i>Deletar</a></td>
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
