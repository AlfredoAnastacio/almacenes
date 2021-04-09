<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Existencias;
use App\Almacenes;
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

    public function addExistencias() {

        $existencias = Existencias::join('cat_almacenes', 'existencias.id_almacen', 'cat_almacenes.id_almacen')
                                ->join('cat_productos', 'existencias.id_producto', 'cat_productos.id_producto')
                                ->select('existencias.id_existencias','existencias.id_producto', 'existencias.id_almacen', DB::raw('SUM(existencias) as total'),
                                            'cat_almacenes.nombre_almacen', 'cat_productos.sku')
                                ->groupBy('existencias.id_producto')
                                ->orderBy('existencias.id_existencias')
                                ->get();

        return view('almacenes.add')->with('existencias', $existencias);
    }

    public function getAlmacenes($id) {
        

        $id_existencia = $id;

        $array_almacenes = array();
        $array_data_almacen = array();

        $id_producto = Existencias::select('id_producto')
                    ->where('id_existencias', $id_existencia)
                    ->pluck('id_producto')
                    ->first();

        $almacenes = Existencias::select('id_almacen')
                        ->where('id_producto', $id_producto)
                        ->get();

        foreach ($almacenes as $almacen) {
            array_push($array_almacenes, $almacen['id_almacen']);
        }

        foreach ($array_almacenes as $value) {
            $almacen = Almacenes::select('id_almacen', 'nombre_almacen')->where('id_almacen', $value)->first();
            array_push($array_data_almacen, $almacen);
        }

        return response()->json($array_data_almacen, 200);
    }

    public function store(Request $request) {

        $id = $request->id_existencia;

        $existencia = Existencias::where('id_existencias', $id)->first();

        $stock = $existencia->existencias;
        $total = $stock+$request->quantity;

        $result = Existencias::where('id_existencias', $id)->update(array('existencias' => $total));

        \Session::flash('success_message','Producto actualizado correctamente.');
        
        return redirect()->route("home");
    }
}
