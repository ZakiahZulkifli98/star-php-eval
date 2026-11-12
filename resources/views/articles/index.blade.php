@extends('layouts.app')

@section('title', 'Latest Articles')

@section('content')
<h1 class="h3 mb-3">Latest Articles</h1>

<div id="article-list" class="row g-3">
    @forelse ($articles as $article)
    <div class="col-md-6 article-item">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <span class="badge text-bg-primary mb-2">{{ $article->category->name }}</span>
                <h2 class="h5 card-title">
                    <a href="{{ route('articles.show', $article->permalink) }}" class="stretched-link text-decoration-none">
                        {{ $article->title }}
                    </a>
                </h2>
                <p class="card-text text-muted">{{ $article->summary }}</p>
            </div>
            <div class="card-footer small text-muted">
                {{ $article->author }} · {{ $article->published_at->format('d M Y') }}
            </div>
        </div>
    </div>
    @empty
    <p class="text-muted">No articles found.</p>
    @endforelse
</div>
@endsection