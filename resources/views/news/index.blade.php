@extends('layouts.main')
@section('title') Список новостей -  @parent @stop
@section('content')

@forelse($newsList as $news)
	<div class="col">
		<div class="card shadow-sm">
			<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

			<div class="card-body">
				<p class="card-text"><strong>{{ $news['title'] }}</strong> <br> {!! $news['description'] !!}.</p>
				<div class="d-flex justify-content-between align-items-center">
					<div class="btn-group">
						<a href="{{ route('news.show', ['id' => intval($news['id'])]) }}"
						   class="btn btn-sm btn-outline-secondary">Смотреть подробнее</a>

					</div>
					<small class="text-muted">Автор: {{ $news['author'] }} <br>
						{{ now()->format('d-m-Y H:i') }}</small>
				</div>
			</div>
		</div>
	</div>

@empty
	<h2>Записей нет</h2>
@endforelse

@endsection




