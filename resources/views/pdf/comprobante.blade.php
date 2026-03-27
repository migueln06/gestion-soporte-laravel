<!DOCTYPE html>
<html>
<head>
    <title>Comprobante de Recepción</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        .header { text-align: center; border-bottom: 2px solid #dc3545; padding-bottom: 10px; }
        .info-section { margin-top: 20px; }
        .label { font-weight: bold; color: #555; }
        .status { padding: 5px 10px; border-radius: 5px; color: white; }
        .pendiente { background-color: #ffc107; color: black; }
        .listo { background-color: #198754; }
    </style>
</head>
<body>
    <div class="header">
        <h1>SOPORTE TÉCNICO - INVENTARIO</h1>
        <p>Barcelona, Anzoátegui | Fecha: {{ date('d/m/Y') }}</p>
    </div>

    <div class="info-section">
        <h2>Detalles del Ingreso #{{ $equipo->id }}</h2>
        <p><span class="label">Cliente:</span> {{ $equipo->nombre_cliente }}</p>
        <p><span class="label">Equipo:</span> {{ $equipo->tipo_equipo }} ({{ $equipo->marca }})</p>
        <p><span class="label">Falla Reportada:</span> {{ $equipo->falla }}</p>
        <p><span class="label">Estado Actual:</span> 
            <span class="status {{ $equipo->estado == 'Pendiente' ? 'pendiente' : 'listo' }}">
                {{ $equipo->estado }}
            </span>
        </p>
    </div>

    <div style="margin-top: 50px; text-align: center;">
        <p>__________________________</p>
        <p>Firma del Técnico</p>
    </div>
</body>
</html>