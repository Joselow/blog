@extends('layouts.admin.index')

@section('title-content','Categorias')
@section('content')

@if(session('success'))
    <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> 
        {{ session('success') }}
    </div>

    @endif

    @if(session('error'))
    <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-circle"></i> 
        {{ session('error') }}
    </div>
@endif

<div class="card">
    
    <div class="card-header">
        <h4 class="card-title">Table with outer spacing</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <p class="card-text">
            </p>
            <!-- Table with outer spacing -->
            <div class="table-responsive">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th>Estado</th>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Estado</th>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $category )
                            <tr>
                                <td class="text-bold-500">{{$category->isActive}}</td>
                                <td class="text-bold-500">{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>
                                    <a href="{{route('admin.categories.edit', $category)}}" class="btn btn-warning">Editar</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Eliminar</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
{{--                      
                        <tr>
                            <td class="text-bold-500">Morgan Vanblum</td>
                            <td>$13/hr</td>
                            <td class="text-bold-500">Graphic concepts</td>

                        </tr>
                        <tr>
                            <td class="text-bold-500">Tiffani Blogz</td>
                            <td>$15/hr</td>
                            <td class="text-bold-500">Animation</td>

                        </tr>
                        <tr>
                            <td class="text-bold-500">Ashley Boul</td>
                            <td>$15/hr</td>
                            <td class="text-bold-500">Animation</td>

                        </tr>
                        <tr>
                            <td class="text-bold-500">Mikkey Mice</td>
                            <td>$15/hr</td>
                            <td class="text-bold-500">Animation</td>

                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection