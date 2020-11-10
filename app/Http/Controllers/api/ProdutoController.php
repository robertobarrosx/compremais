<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{


    public function index()
    {
        return Produto::all();
    }

    public function store(Request $request)
    {
        return Produto::create($request->all());
    }

    public function show($id)
    {
        $prod = Produto::find($id);
        if(isset($prod)){
            return $prod;
        }else{
            return response("Esse produto não existe",404);
        }
    }

    public function update(Request $request, $id)
    {
        $prod = Produto::find($id);
        if(isset($prod)){
            $prod->update($request->all());
            return Produto::find($id);
        }else{
            return response("Esse produto não existe",404);
        }
    }

    public function destroy($id)
    {
        $prod = Produto::find($id);
        if(isset($prod)){
            return $produto->delete();

        }else{
            return response("Esse produto não existe",404);
        }
        return $produto->delete();
    }
}
