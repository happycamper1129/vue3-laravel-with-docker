<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(): ProductResource
    {
        return new ProductResource(Product::paginate());
    }

    public function store(Request $request){
        $product = Product::create($request->only('title', 'description', 'image', 'price'));

        return response(new ProductResource($product), Response::HTTP_CREATED);
    }

    public function show($id): ProductResource
    {
        return new ProductResource(Product::find($id));
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->update($request->only('title', 'description', 'image', 'price'));

        return response(new ProductResource($product), Response::HTTP_ACCEPTED);
    }

    public function destroy($id){
        Product::destroy($id);
        return response('Deleted', Response::HTTP_NO_CONTENT);
    }
}
