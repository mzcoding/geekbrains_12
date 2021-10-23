@extends('layouts.admin')
@section('title') Список новостей -  @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новости</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить новую</a>
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
                <th scope="col">Автор</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)

            <tr>
                <td>{{ $news->id }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->author }}</td>
                <td>
                    @if($news->updated_at)
                        {{ $news->updated_at->format('d-m-Y H:i') }}
                    @else - @endif
                </td>
                <td>
                    <a href="{{ route('admin.news.edit', ['news' => $news]) }}">Ред.</a>&nbsp;|&nbsp; <a href="javascript:;" style="color:red;">Уд.</a>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="5">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection