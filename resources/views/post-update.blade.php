@extends('layouts.app')

@section('content')
<div class="container">
            <h1> {{$post->title}} </h1>
            <p> {{$post->description}} </p> <br>
            <b>Autor: {{$post->user->name}} </b>
            <a href="{{url("/post/$post->id/update")}}">Editar </a>
<hr>

</div>
@endsection
