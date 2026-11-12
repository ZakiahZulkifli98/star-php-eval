@extends('layouts.app')

@section('title', 'Latest Articles')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
    <h1 class="h3 mb-0">Latest Articles</h1>
    <input id="search" type="search" class="form-control w-auto"
        placeholder="Search by title..." autocomplete="off" aria-label="Search articles by title">
</div>

<div id="article-list" class="row g-3">
    @forelse ($articles as $article)
    <div class="col-md-6 article-item" data-title="{{ \Illuminate\Support\Str::lower($article->title) }}">
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

<p id="no-results" class="text-center text-muted mt-4 d-none">No articles match your search.</p>
@endsection

@push('scripts')
<script>
    const search = document.getElementById('search');
    const items = document.querySelectorAll('.article-item');
    const empty = document.getElementById('no-results');

    search.addEventListener('input', () => {
        const term = search.value.trim().toLowerCase();
        let visible = 0;

        items.forEach(item => {
            const match = item.dataset.title.includes(term);
            item.classList.toggle('d-none', !match);
            if (match) visible++;
        });

        empty.classList.toggle('d-none', visible > 0);
    });
</script>
@endpush