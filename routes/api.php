<?php

use App\Http\Requests\StoreProductoRequest;
use App\Http\Resources\ProductoResource;
use App\Models\DetalleVenta;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/producto', function () {
    // return response()->json([
    //     'productos' => ProductoResource::collection(Producto::all())
    // ]);
    return ProductoResource::collection(Producto::all());
});

Route::post('/producto', function (Request $request) {
    dd($request->input('url'));
    Producto::create($request->validated());
    return response()->json(['mensaje' => 'Elemento agregado satisfactoriamente.']);
});

Route::post('/producto/crear', function (StoreProductoRequest $request) {
    //dd($request->validated());    
    Producto::create($request->validated());
    return response()->json(['mensaje' => 'Elemento agregado satisfactoriamente.']);
});

Route::get('/detalle-venta', function () {
    $detalle_venta = DetalleVenta::all();
    return response()->json([
        'detalle_venta' => $detalle_venta
    ]);
});
