@section('head')
    <link href="{{ asset('css/article-detail.css') }}" rel="stylesheet">
@endsection

<x-layout>
    <div class="banner">
        <div class="all-container container">
        </div>
    </div>

    <div class="content">
        <div class="container2">
            <div class="head">
                <h1 class="title">{{ $article->articleTitle }}</h1>
                <h2 class="subtitle">{{ $article->articleSubTitle }}</h2>
            </div>

            <div class="wrap">
                <div class="authors">
                    <span class="by">BY</span>
                    <span class="author">{{ $article->articleAuthor }}</span>
                </div>

                <img class="articleimage" src="{{ asset('storage/' . $article->articleImage) }}" alt="Article Image">

                <div class="publisheddate">
                    <span class="textpublished">Published</span>
                    <span class="datetime">{{ \Carbon\Carbon::parse($article->created_at)->format('l, d F Y') }}</span> -
                    <span class="datetime">{{ $article->created_at->diffForHumans() }}</span>
                </div>
            </div>

            <div class="labelcontent">
                {{ $article->articleContent }}
            </div>
        </div>
    </div>
</x-layout>
