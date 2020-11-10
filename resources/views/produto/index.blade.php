@extends('layouts.prodlay')

@section('content')

    <div class="row" style="padding-top: 30px">
        <div class="col-lg-12 margin-top ">
            <div class="pull-left">
                <h2>Produtos </h2>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-success text-light" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                    data-attr="{{ route('produtos.create') }}" title="Adicionar Produto">Adicionar Produto ➕
                </a>
            </div> --}}
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">

    @foreach ($produtos as $item)
    <div class="col-md-3 " style="padding-top: 30px; padding-left: 15px; padding-right: 15px;">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('img/semfoto.jfif') }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$item->nome}}</h5>
          <p class="card-text">{{  'R$ '.number_format($item->valor, 2, ',', '.') }} </p>
          <a href="{{ route('produtos.show', $item['id']) }}" class="btn btn-primary">Ver Produto</a>
        </div>
      </div>
    </div>
      @endforeach
    </div>
                    </div></div></div></div>
    {{-- <table class="table table-bordered table-responsive-lg table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nome</th>
                <th scope="col" width="30%">descricao</th>
                <th scope="col">situacao</th>
                <th scope="col">Valor</th>
                <th scope="col">Date Created</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td scope="row">{{$produto['id']}}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->situacao }}</td>
                    <td>{{ $produto->valor }}</td>
                    <td>{{ date_format($produto->created_at, 'jS M Y') }}</td>
                    <td>
                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">

                            <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                data-attr="{{ route('produtos.show', $produto->id) }}" title="show">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>

                            <a class="text-secondary" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                                data-attr="{{ route('produtos.edit', $produto->id) }}">
                                <i class="fas fa-edit text-gray-300"></i>
                            </a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

    {{-- {!! $produto->links() !!} --}}


    <!-- small modal -->
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- medium modal -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

    </script>

@endsection
