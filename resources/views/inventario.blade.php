<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-danger text-white">
            <h3>📦 Registrar Nuevo Equipo</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="/guardar-equipo" method="POST">
                @csrf <div class="mb-3">
                    <label>Nombre del Cliente</label>
                    <input type="text" name="nombre_cliente" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Tipo de Equipo</label>
                    <select name="tipo_equipo" class="form-control">
                        <option value="Laptop">Laptop</option>
                        <option value="Desktop">Desktop / All-in-One</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Marca</label>
                    <input type="text" name="marca" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Falla Reportada</label>
                    <textarea name="falla" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-danger w-100">Registrar Ingreso</button>
            </form>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card bg-dark text-white shadow">
            <div class="card-body text-center">
                <h6>📦 Total Equipos</h6>
                <h2 class="fw-bold">{{ $total }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-warning text-dark shadow">
            <div class="card-body text-center">
                <h6>⏳ Pendientes</h6>
                <h2 class="fw-bold">{{ $pendientes }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white shadow">
            <div class="card-body text-center">
                <h6>✅ Listos para Entrega</h6>
                <h2 class="fw-bold">{{ $listos }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mt-4">
    <div class="card-header bg-dark text-white">
        <form action="/inventario" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="buscar" class="form-control" placeholder="Buscar por cliente o marca..." value="{{ request('buscar') }}">
                <button class="btn btn-dark" type="submit">🔍 Buscar</button>
                @if(request('buscar'))
                <a href="/inventario" class="btn btn-outline-secondary">Limpiar</a>
                @endif
            </div>
        </form>
        <h3>📋 Equipos en Taller</h3>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Equipo</th>
                    <th>Marca</th>
                    <th>Falla</th>
                    <th>Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipos as $equipo)
                <tr>
                    <td class="fw-bold text-muted">
                        {{ $equipo->created_at->format('d/m/Y') }}
                    </td>
                    <td>{{ $equipo->nombre_cliente }}</td>
                    <td>{{ $equipo->tipo_equipo }}</td>
                    <td>{{ $equipo->marca }}</td>
                    <td>{{ $equipo->falla }}</td>
                    
                    <td>
                        <span class="badge {{ $equipo->estado == 'Pendiente' ? 'bg-warning' : 'bg-success' }}">
                            {{ $equipo->estado }}
                        </span>

                    <td class="text-center">
                        <div class="d-flex justify-content-center align-items-center gap-2">

                            <a href="{{ route('equipos.pdf', $equipo->id) }}" class="btn btn-sm btn-outline-dark" target="_blank" title="Descargar Comprobante">
                                📄 PDF
                            </a>

                            @if($equipo->estado == 'Pendiente')
                            <form action="/equipo/{{ $equipo->id }}/listo" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-success ms-2">✅ Marcar Listo</button>
                            </form>
                            @endif
                    </td>
                    <td>
                        <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este registro?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>