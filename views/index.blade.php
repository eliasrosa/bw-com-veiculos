@extends('BW::template.index')

@section('header.icon', 'fa fa-car')
@section('header.title', 'Gerenciar veículos')

@section('header.menu')
    <li><a href="{{ route('bw.vehicles.create') }}">Adicionar veículo</a></li>
@endsection

@section('content.index')

    <div class="table-responsive">
        <table class="datatable-simple">
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Preço</th>
                    <th>Status</th>
                    <th>Opçoes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $i)
                <tr>
                    <td>{{ $i->license_plate }} (#{{ $i->id }})</td>
                    <td>{{ $i->model }}</td>
                    <td>{{ $i->year }}</td>
                    <td>{{ $i->price }}</td>
                    <td>
                        <span class="label label-default">
                            {{ $i->status->name }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('bw.vehicles.edit', $i->id) }}" class="btn btn-primary btn-xs">Editar</a>

                        <form action="{{ route('bw.vehicles.destroy', $i->id) }}" style="display: inline-block" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="btn btn-danger btn-xs" value="Remover">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
