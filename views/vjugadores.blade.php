@extends('layouts.master') {{-- Si utilizas un diseño principal, inclúyelo aquí --}}

@section('content')
<div class="container">
    <h1>Listado de Jugadores</h1>
    <a href="fcrear.php" class="btn">+ Nuevo Jugador</a>
    <table>
        <tr>
            <th>Nombre Completo</th>
            <th>Posición</th>
            <th>Dorsal</th>
            <th>Código de Barras</th>
        </tr>
        @foreach ($jugadores as $j)
        <tr>
            <td>{{ htmlspecialchars($j['nombre']) . ' ' . htmlspecialchars($j['apellidos']) }}</td>
            <td>{{ htmlspecialchars($j['posicion']) }}</td>
            <td>{{ $j['dorsal'] ? htmlspecialchars($j['dorsal']) : 'Sin Asignar' }}</td>
            <td>
                {{ htmlspecialchars($j['barcode']) }}
            </td>
        </tr>
        @endforeach    </table>
</div>
@endsection