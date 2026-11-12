@extends('layouts.app')

@section('title', $article->title)

@section('content')
<a href="{{ route('articles.index') }}" class="btn btn-link px-0 mb-3">&larr; Back to articles</a>

<article class="card shadow-sm">
    <div class="card-body p-4">
        <span class="badge text-bg-primary mb-2">{{ $article->category->name }}</span>
        <h1 class="h2">{{ $article->title }}</h1>
        <p class="text-muted">
            By {{ $article->author }} ·
            <time datetime="{{ $article->published_at->toIso8601String() }}">
                {{ $article->published_at->format('l, d F Y') }}
            </time>
        </p>
        <p class="lead">{{ $article->summary }}</p>
        <hr>
        {!! nl2br(e($article->body)) !!}
    </div>
</article>
@endsection