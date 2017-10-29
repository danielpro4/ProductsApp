@extends('layouts.app')
@section('page-title')
    @parent
    - {{ $product->exists ? 'Update' : 'Create'}} Producto
@stop
@section('main-panel-before')
    <form action="{{ request()->fullUrl() }}" method="POST" class="uk-form-horizontal">
        {{csrf_field()}}
        @stop
        @section('panel-header')
            <div class="uk-flex uk-flex-between uk-flex-middle">
                <h5 class="uk-card-title uk-margin-remove">{{ $product->exists ? 'Actualizar' : 'Crear'}} Producto</h5>
            </div>
        @stop
        @section('panel-content')
            <div class="uk-margin">
                <label class="uk-form-label">SKU</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Sku producto, e.g. CHP-23" name="sku" id="sku"
                           value="{{old('sku', $product->sku)}}" type="text">
                    @if($errors->has('sku'))
                        <div class="uk-text-danger">{{$errors->first('sku')}}</div>
                    @endif
                </div>
            </div>
        
            <div class="uk-margin">
                <label class="uk-form-label">Código de Proveedor</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Código de Proveedor" name="suppliercode" id="suppliercode"
                           value="{{old('suppliercode', $product->suppliercode)}}" type="text"/>
                    <span class="hint uk-text-small"></span>
                    @if($errors->has('suppliercode'))
                        <div class="uk-text-danger">{{$errors->first('suppliercode')}}</div>
                    @endif
                </div>
             </div>
             

            <div class="uk-margin">
                <label class="uk-form-label">Nombre</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Escribir nombre de producto, e.g. Cartucho HP 23" name="name" id="name"
                           value="{{old('name', $product->name)}}" type="text">
                    @if($errors->has('name'))
                        <div class="uk-text-danger">{{$errors->first('name')}}</div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Descripción</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea" placeholder="Descripción detallada del producto" name="description" id="description"
                           value="{{old('description', $product->description)}}" rows="5"></textarea>
                    @if($errors->has('description'))
                        <div class="uk-text-danger">{{$errors->first('description')}}</div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Código de Barras</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Código de Barras" name="barcode" id="barcode"
                           value="{{old('barcode', $product->barcode)}}" type="text"/>
                    <span class="hint uk-text-small"></span>
                    @if($errors->has('barcode'))
                        <div class="uk-text-danger">{{$errors->first('barcode')}}</div>
                    @endif
                </div>
             </div>


            <div class="uk-margin">
                <label class="uk-form-label">Precio Compra</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Precio compra" name="buy_price" id="buy_price"
                           value="{{old('buy_price', $product->buy_price)}}" type="text"/>
                    <span class="hint uk-text-small">Precio de compra (Sin IVA)</span>
                    @if($errors->has('buy_price'))
                        <div class="uk-text-danger">{{$errors->first('buy_price')}}</div>
                    @endif
                </div>
            </div>

             <div class="uk-margin">
                <label class="uk-form-label">Precio Venta</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Precio venta" name="sell_price" id="sell_price"
                           value="{{old('sell_price', $product->sell_price)}}" type="text"/>
                    <span class="hint uk-text-small">Precio de venta (Sin IVA)</span>
                    @if($errors->has('sell_price'))
                        <div class="uk-text-danger">{{$errors->first('sell_price')}}</div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Categoría</label>
                <div class="uk-form-controls">
                    <select class="uk-select" placeholder="Categoría del producto, e.g. CARTUCHOS" name="category" id="category"
                           value="{{old('category', $product->category)}}" >
                        <option value="Accesorio">ACCESORIOS</option>
                        <option value="Cartucho">CARTUCHOS</option>
                        <option value="Impresora">IMPRESORAS</option>
                        <option value="Toner">TONER</option>
                    </select>
                    @if($errors->has('category'))
                        <div class="uk-text-danger">{{$errors->first('category')}}</div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Activo</label>
                <div class="uk-form-controls">
                    <label>
                        <input class="uk-radio" name="active" id="active-yes"
                               value="1" {{ old('active', $product->active) == true ? 'checked' : ''}} type="radio"/>Sí
                    </label>
                    <label>
                        <input class="uk-radio"  name="active" id="active-no"
                               value="0" {{ old('active', $product->active) == false ? 'checked' : ''}} type="radio"/>No
                    </label>

                    @if($errors->has('active'))
                        <div class="uk-text-danger">{{$errors->first('active')}}</div>
                    @endif
                </div>
            </div>


            <div class="uk-margin">
                <label class="uk-form-label">Existencias</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Existencias" name="existences" id="existences"
                           value="{{old('existences', $product->existences)}}" type="number"/>
                    <span class="hint uk-text-small">Existencias totales</span>
                    @if($errors->has('existences'))
                        <div class="uk-text-danger">{{$errors->first('existences')}}</div>
                    @endif
                </div>
             </div>

        @stop
        @section('panel-footer')
            <button class="uk-button uk-button-primary uk-button-small" type="submit">Guardar</button>
        @stop

        @section('main-panel-after')
    </form>
@stop