<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2 class="font-weight-bold">Editar Produto</h2>
        </div>

    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong>Houve alguns problemas com sua entrada.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data" class="form">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ $produto->nome }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descricao:</strong>
                @isset($produto->descricao)
                <textarea class="form-control" style="height:50px" name="descricao"
                    placeholder="descricao">{{ $produto->descricao }}</textarea>
                @else
                <textarea class="form-control" style="height:50px" name="descricao"
                    placeholder="descricao""></textarea>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Situacao:</strong>
                <input type="text" name="situacao" class="form-control" placeholder="Situação" value="{{ $produto->situacao }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Valor:</strong>
                <input type="number" name="valor" class="form-control" placeholder="Valor" value={{ $produto->valor}}>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="" data-dismiss="modal">Deixa pra lá</a>

            <button type="submit" class="btn btn-primary">Confirmar</button>
        </div>
    </div>

</form>
