<div class="table-responsive">
    <table class="table" id="visitantes-table">
        <thead>
        <tr>
            <th>Dpi</th>
        <th>Nombre</th>
        <th>Fecha</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($visitantes as $visitante)
            <tr>
                <td>{{ $visitante->dpi }}</td>
            <td>{{ $visitante->nombre }}</td>
            <td>{{ $visitante->fecha }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['visitantes.destroy', $visitante->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('visitantes.show', [$visitante->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('visitantes.edit', [$visitante->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
