@extends('layouts.prodlay')

@section('content')

    <div class="row" style="padding-top: 30px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Produtos </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success text-light" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                    data-attr="{{ route('produtos.create') }}" title="Adicionar Produto">Adicionar Produto ➕
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="shop__products">
        <div class="products">
                <div class='products__item'>
                    <article class='product'>
                    <h1 class='product__title'> {{$produto->nome}} </h1>
                    <p class='product__text'>
                        <p> {{  'R$ '.number_format($produto->valor, 2, ',', '.') }}   </p>
                        <p> {{  strtoupper($produto->situacao) }}   </p>
                        {{-- <a class='button js-add-product' href='{{ route('produtos.show', $produto['id']) }}' title='Add to cart'>
                            Ver Produto
                        </a> --}}
                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                            <a class="text-secondary btn btn-primary btn-detail" data-toggle="modal" id="mediumButton" title="Editar" data-target="#mediumModal"
                                data-attr="{{ route('produtos.edit', $produto->id) }}">
                                ✏️
                            </a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" title="Deletar" class="btn btn-danger btn-detail open_modal"  >
                                🗑️</button>
                        </form>
                         </p>
                    </article>
                </div>
      </div>
    </div>



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
