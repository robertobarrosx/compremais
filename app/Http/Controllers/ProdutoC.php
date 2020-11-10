<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoC extends Controller
{
    public function search($search){

        $produtos = Produto::where('nome', 'LIKE', '%'.$search.'%')
        ->orWhere('descricao', 'LIKE', '%'.$search.'%')
        ->orWhere('situacao', 'LIKE', '%'.$search.'%')
        ->orWhere('valor', 'LIKE', '%'.$search.'%')
        ->paginate();
        return view('produto.index')->with('produtos', $produtos);
    }
    public function index()
    {
        $produtos = Produto::all();
        return view('produto.index')->with('produtos', $produtos);
    }

    public function create()
    {
        return view('produto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'valor' => 'required',
            'situacao' => 'required',
        ]);

        $produtoNome = $request->nome;
        $data = $request->all();

        Produto::create($data);

        return redirect()->route('produtos.index')
            ->with('success', $produtoNome. ' adicionado com sucesso.');
    }

    public function show($id)
    {
        $prod = Produto::find($id);
        $produtos = Produto::all();
        if(isset($prod)){
            return view('produto.show')->with('produto', $prod);
        }
        else{
            return view('notfound.index')->with('pagina', "produtos.index");
        }
    }

    public function edit($id)
    {
        $produto = Produto::find($id);
        if(isset($produto)){
            return view('produto.edit')->with('produto', $produto);
        }else{
            return view('notfound.index')->with('pagina', "produtos.index");
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'situacao' => 'required',
            'valor' => 'required',
        ]);
        $produto = Produto::find($id);
        if(isset($produto)){
        $produtoNome = $request->nome;

        $produto->update($request->all());

        return redirect()->route('produtos.index')
            ->with('success', $produtoNome . ' atualizado com sucesso.');
        }else{
            return view('notfound.index')->with('pagina', "produtos.index");
        }
        }

    public function destroy($id)
    {
        $produto = Produto::find($id);
        if(isset($produto)){
        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('success', 'Produto deletado com sucesso');
        }else{
            return view('notfound.index')->with('pagina', "produtos.index");
        }
    }
}
