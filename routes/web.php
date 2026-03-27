<?php

use App\Http\Controllers\EquipoController;
use App\Models\Equipo;
use Illuminate\Support\Facades\Route;

Route::post('/guardar-equipo', [EquipoController::class, 'store']); //Para guardar

Route::delete('/equipo/{id}', [App\Http\Controllers\EquipoController::class, 'destroy'])->name('equipos.destroy'); //Para eliminar


Route::post('/equipo/{id}/listo', [App\Http\Controllers\EquipoController::class, 'marcarListo']); // Para marcar listo
Route::get('/equipo/{id}/pdf', [App\Http\Controllers\EquipoController::class, 'generarPDF'])->name('equipos.pdf'); // Para generar PDF


Route::get('/', function () {
    return view('welcome');
});

// Route::get('inventario', function () {
//     // Consultamos todos los equipos ordenados por el mas reciente
//     $equipos = Equipo::all();

//     // Pasamos la variable 'equipos' a la vista
//     return view('inventario', compact('equipos'));
// });

// Route::get('/inventario', function (Illuminate\Http\Request $request) {
//     $buscar = $request->input('buscar');

//     // Si hay una búsqueda, filtramos; si no, traemos todo
//     $equipos = \App\Models\Equipo::when($buscar, function ($query, $buscar) {
//         return $query->where('nombre_cliente', 'like', "%{$buscar}%")
//                      ->orWhere('marca', 'like', "%{$buscar}%");
//     })->get();

//     return view('inventario', compact('equipos'));
// });

Route::get('/inventario', function (Illuminate\Http\Request $request) {
    $buscar = $request->input('buscar');

    $query = \App\Models\Equipo::when($buscar, function ($query, $buscar) {
        return $query->where('nombre_cliente', 'like', "%{$buscar}%")
                     ->orWhere('marca', 'like', "%{$buscar}%");
    });

    $equipos = $query->get();
    
    // Contadores basados en la base de datos
    $total = \App\Models\Equipo::count();
    $pendientes = \App\Models\Equipo::where('estado', 'Pendiente')->count();
    $listos = \App\Models\Equipo::where('estado', 'Listo')->count();

    return view('inventario', compact('equipos', 'total', 'pendientes', 'listos'));
});