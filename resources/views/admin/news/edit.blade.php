@extends('layouts.admin')
@section('title') Редактировать новость -  @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">


        </div>
    </div>

    <div class="table-responsive">
        @include('inc.message')
        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="0">Без категории</option>
                    @foreach($categories as $category)
                        <option @if($category->id === $news->category_id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach

                </select>
                @error('category_id') <div><strong style="color:red;">{{ $message }}</strong></div> @enderror
            </div>
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $news->title }}">
                @error('title') <div><strong style="color:red;">{{ $message }}</strong></div> @enderror
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value="{{ $news->author }}">
                @error('author') <div><strong style="color:red;">{{ $message }}</strong></div> @enderror
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                @if($news->image)
                    <img src="{{ Storage::disk('news')->url($news->image) }}" style="width: 200px;">
                @endif
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if($news->status === 'PUBLISHED') selected @endif>PUBLISHED</option>
                    <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{!! $news->description !!}</textarea>
            </div><br>

            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection

@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush