@extends("layouts.app")
@section('page-title')
    @parent
    - Productos
@stop
@section('panel-header')
    <div class="uk-flex uk-flex-between uk-flex-middle">
        <h1 class="uk-card-title uk-margin-remove">
            Productos
            <div class="uk-text-small">Gestión de su catálogo de productos</div>
        </h1>

        <a class="uk-button uk-button-primary uk-button-small" href="{{route('product.create')}}">Nuevo Producto</a>
    </div>
    <div class="uk-flex uk-flex-right uk-flex-middle" style="margin-top: 15px">
        <form class="uk-display-inline uk-search uk-search-default">
            <span class="uk-icon uk-search-icon">
                <icon name="search" :scale="100">
                    <svg version="1.1" role="presentation" width="17.857142857142858" height="17.857142857142858"
                         viewBox="0 0 20 20" class="svg-icon active" style="font-size: 100em;"><path
                                d="M2 9a7 7 0 1 0 14 0a7 7 0 1 0 -14 0z" fill="none" stroke="#000"></path><path
                                d="M14,14 L18,18 L14,14 Z" fill="none" stroke="#000"></path></svg>
                </icon>
            </span>

            <input class="uk-search-input" type="search" placeholder="Search...">
        </form>
    </div>
@stop
@section('panel-content')
    <table class="uk-table uk-table-middle uk-table-responsive uk-table-divider uk-table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>SKU</th>
                <th>Producto</th>
                <th>Precio Compra</th>
                <th>Precio Venta</th>
                <th>Precio Venta C/IVA</th>
                <th>Existencias</th>
                <th>Activo</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $i => $product)
                <tr class="table-row">
                    <td>{{(++$i)}}</td>

                    <td>{{$product->sku}}</td>
                    <td>
                        <a href="{{route('product.edit', $product)}}">{{str_limit($product->name, 30)}}</a>
                    </td>

                    <td>{{$product->buyingPrice}}</td>
                    <td>{{$product->sellingPrice}}</td>
                    <td>{{$product->sellingPriceWithVat}}</td>
                    <td>{{$product->existences}}</td>
                    <td><input class="uk-checkbox" type="checkbox" {{$product->active == 1 ? 'checked' : ''}}></td>
                </tr>
            @empty
                <tr>
                    <td class="uk-text-center" colspan="9">
                        <img class="uk-svg" width="50" height="50" src="/images/funnel.svg">
                        <p>No Products Found.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop

@section('panel-footer')
    <a class="uk-button uk-button-primary uk-button-small" href="{{route('product.create')}}">Nuevo Producto</a>
@stop