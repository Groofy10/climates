@section('head')
    <link href="{{ asset('css/article.css') }}" rel="stylesheet">
@endsection

<x-layout>
    <div class="banner">
        <div class="all-container container">
            <h1>Explore Our Articles</h1>
        </div>
    </div>

    <div class="content">
        <div class="all-container container">
            @if($articles->count())
            @foreach ($articles as $article)
            <div class="article-card">
                <div class="articleimage">
                    <img src="{{ asset('storage/' . $article->articleImage) }}"/>
                </div>

                <div class="articledetail">
                    <div class="top-content">
                        <div class="authoranddate">
                            <p class="author">{{ $article->articleAuthor }} -</p>
                            <p class="date">{{\Carbon\Carbon::parse($article->created_at)->format('l, d F Y') }}</p>
                        </div>
                        <h1>{{ $article->articleTitle }}</h1>
                        <p>{{\Illuminate\Support\Str::limit($article->articleSubTitle, 100) }}</p>
                    </div>
                    <div class="btm-content">
                        <a href="{{ route('article.detail',$article->id) }}">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
        @else
        <div class="article-card">
            <p>There is no article.</p>
        </div>
            @endif
           
        </div>
    </div>
</x-layout>
