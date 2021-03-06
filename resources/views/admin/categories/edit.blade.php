@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'product-page')
@section('content')
    <div class="header header-filter"
         style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

    </div>

    <div class="main main-raised">
        <div class="container">

            <div class="section">
                <h2 class="title text-center">Editar categoria seleccionada</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ url('/admin/categories/'.$category->id.'/edit') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre de la categoria</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label">Imagen de la categoria</label>
                            <input type="file" name="image">
                            @if ($category->image)
                                <p class="help-block">
                                    Subir solo si desea reemplazar la imagen actual
                                    <a href="{{ asset('images/categories/'.$category->image) }}" target="_blank">Imagen actual</a>
                                </p>
                            @endif
                        </div>
                    </div>

                    <textarea name="description" class="form-control" placeholder="Here can be your nice text"
                              rows="5">{{ old('description', $category->description) }}</textarea>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <a href="{{ url('/admin/categories') }}" class="btn btn-default">Cancelar</a>
                </form>
            </div>

        </div>

    </div>

    @include('includes.footer')
@endsection
