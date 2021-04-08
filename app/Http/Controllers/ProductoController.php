<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Existencias;
use DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productos = Productos::paginate(5);
        
        return view('almacenes.index')->with('productos', $productos);
    }

    /**
     * 
     *
     * 
     */
    public function getAlmacen($id)
    {

        if ($id == 1) {
            $value = 'FISICO';
        } else {
            $value = 'VIRTUAL';
        }

        $existencias = Existencias::join('cat_almacenes', 'existencias.id_almacen', 'cat_almacenes.id_almacen')
                                ->join('cat_productos', 'existencias.id_producto', 'cat_productos.id_producto')
                                ->select('existencias.id_producto', 'existencias.id_almacen', DB::raw('SUM(existencias) as total'),
                                            'cat_almacenes.nombre_almacen', 'cat_productos.sku')
                                ->where('cat_almacenes.tipo', $value)
                                ->groupBy('existencias.id_producto')
                                ->paginate(5);

                // SELECT id_producto, ANY_VALUE(existencias.id_almacen) AS id_almacen, SUM(existencias.existencias) AS total,
                // ANY_VALUE(cat_almacenes.nombre_almacen)
                // FROM existencias
                // INNER JOIN cat_almacenes
                // ON existencias.id_almacen = cat_almacenes.id_almacen
                // INNER JOIN cat_productos
                // ON existencias.id_producto = cat_productos.id_producto
                // WHERE cat_almacenes.tipo = 'FISICO'
                // GROUP BY existencias.id_producto
        
        return view('almacenes.existencias')->with('existencias', $existencias)
                                        ->with('title', $value);
    }
}
