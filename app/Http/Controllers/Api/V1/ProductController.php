<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\ProductRequest;
use App\Http\Resources\V1\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retorna los 15 últimos productos
        return ProductResource::collection(Product::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->validated();

        $product = new Product();
        $product->name = $request->input('name');
        $product->quantity = $request->input('quantity');
        $product->category_id = $request->input('category_id');
        $product->user_id = Auth::id();

        $res = $product->save();

        if ($res) {
            return response()->json(['message' => 'Producto guardado con éxito'], 201);
        }

        return response()->json(['message' => 'Error al crear el producto'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $request->validated();

        if (!empty($request->input('name'))) {
            $product->name = $request->input('name');
        }
        if (!empty($request->input('quantity'))) {
            $product->quantity = $request->input('quantity');
        }
        if (!empty($request->input('category_id'))) {
            $product->category_id = $request->input('category_id');
        }

        $res = $product->save();

        if ($res) {
            return response()->json(['message' => 'Producto actualizado con éxito']);
        }

        return response()->json(['message' => 'Error al actualizar el producto'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $res = $product->delete();

        if ($res) {
            return response()->json(['message' => 'Producto ha sido eliminado con éxito']);
        }

        return response()->json(['message' => 'Error al eliminar el producto'], 500);
    }
}
