@extends('layouts.admin')
@section('title') Список категорий -  @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Категории</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">Добавить новую</a>
            </div>

        </div>
    </div>

    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Дата последнего обновления</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
              @forelse($categories as $category)
                  <tr>
                      <td>
                          {{ $category->id }}
                      </td>
                      <td>
                          {{ $category->title }} ( {{ $category->news->count() }})
                      </td>
                      <td>
                          @if($category->updated_at)
                              {{ $category->updated_at->format('d-m-Y H:i') }}
                          @else - @endif
                      </td>
                      <td>
                          <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">Ред.</a>&nbsp;|&nbsp; <a href="javascript:;" style="color:red;">Уд.</a>
                      </td>
                  </tr>
              @empty
                  <tr>
                      <td colspan="4">Записей нет</td>
                  </tr>
              @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $categories->links() }}
    </div>
@endsection