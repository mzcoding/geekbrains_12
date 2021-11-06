@extends('layouts.app')
@section('content')
    <div class="offset-2">
    <h2>Привет, {{ Auth::user()->name }}</h2>
    <br>
    @if(Auth::user()->avatar)
        <img src="{{ Auth::user()->avatar }}" style="width:200px"><br>
    @endif
    @if(Auth::user()->is_admin)
       <a href="{{ route('admin.index') }}">Перейти в админку</a>
    @endif

    </div>
@endsection