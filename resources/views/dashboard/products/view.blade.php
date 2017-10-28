@extends('layouts.app')
@section('page-title')
    @parent
    - Producto
@stop
@section('title')
    <div class="uk-flex uk-flex-between uk-flex-middle">
        <h5 class="uk-card-title uk-margin-remove">Detalles del Producto: {{ $product->sku}}</h5>
        <status-button :data-task="{{ $product }}" :data-exists="{{ $product->exists ? 1 : 0 }}"></status-button>
        <img src="/images/product.jpg" alt="{{$product->name}}" style="width: 120px"/>
    </div>
@stop
@section('main-panel-content')
    <ul class="uk-list uk-list-striped">
        <li>
            <span class="uk-text-muted uk-float-right">Nombre</span>
            <span class="uk-float-left">{{str_limit($product->name, 80)}}</span>
        </li>
        <li>
            <span class="uk-text-muted uk-float-right">Descripción</span>
            <span class="uk-float-left">{{$product->description}}</span>
        </li>
        <li>
            <span class="uk-text-muted uk-float-right">Precio</span>
            <span class="uk-float-left">{{$product->price}}</span>
        </li>
    </ul>
@stop
@section('main-panel-footer')
    <div class="uk-flex uk-flex-between uk-flex-middle">
        <span>
            <a href="{{ route('product.edit', $product) }}" class="uk-button uk-button-primary uk-button-small">Edit</a>
            <form class="uk-display-inline" action="{{route('product.delete', $product)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button type="submit" class="uk-button uk-button-danger uk-button-small">Delete</button>
            </form>
        </span>
        <a href="" class="uk-button uk-button-primary uk-button-small">Execute</a>
    </div>
@stop
@section('additional-panels')

@stop