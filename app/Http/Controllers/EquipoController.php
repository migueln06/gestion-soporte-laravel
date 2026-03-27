<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EquipoController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validamos (Opcional pero recomendado para un TSU)
        $request->validate([
            'nombre_cliente' => 'required',
            'marca' => 'required',
        ]);

        // 2. Guardado manual (Más seguro para debuggear)
        $equipo = new Equipo();
        $equipo->nombre_cliente = $request->nombre_cliente;
        $equipo->tipo_equipo   = $request->tipo_equipo;
        $equipo->marca         = $request->marca;
        $equipo->falla         = $request->falla;
        $equipo->estado        = 'Pendiente';

        if ($equipo->save()) {
            return back()->with('success', '¡Equipo registrado con éxito!');
        } else {
            return back()->with('error', 'Error al guardar en la base de datos');
        }
    }

    public function marcarListo($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->estado = 'Listo';
        $equipo->save();

        return back()->with('success', '¡Estado actualizado!');
    }
    public function destroy($id)
    {
        $equipo = \App\Models\Equipo::findOrFail($id);
        $equipo->delete();

        return back()->with('success', '¡Equipo eliminado correctamente!');
    }

    public function generarPDF($id)
    {
        $equipo = Equipo::findOrFail($id);

        // Cargamos una vista especial que crearemos solo para el diseño del PDF
        $pdf = Pdf::loadView('pdf.comprobante', compact('equipo'));

        // Esto hará que el navegador lo abra o lo descargue
        return $pdf->stream('Comprobante_Reparacion_' . $id . '.pdf');
    }
}
