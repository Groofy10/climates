@section('head')
    <link href="{{ asset('css/create_article.css') }}" rel="stylesheet">
@endsection

<x-layout>
    <div class="content">
        <div class="container all-container">
            <div class="form">
                <div class="center">
                    <h1>Create Article</h1>
                    <div class="inputfield">
                        <form action="{{ route('dashboard.article.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="left">
                            <div class="rows">
                                <div class="insider-row">
                                    <label class="labeltext" for="title">Article Title</label><span class="required">*</span>
                                </div>
                                <input class="textbox" type="text" id="title" name="articleTitle" placeholder="e.g Potret Mobil Bos Rental yang Digelapkan di Pati">
                            </div>
                            <div class="rows">
                                <div class="insider-row">
                                    <label class="labeltext" for="subtitle">Article Subtitle</label><span class="required">*</span>
                                </div>
                                <input class="textbox" type="text" id="subtitle" name="articleSubTitle" placeholder="e.g Polres Metro Jakarta Timur menyita mobil bos rental mobil">
                            </div>
                            <div class="rows">
                                <div class="insider-row">
                                    <label class="labeltext" for="author">Article Author</label><span class="required">*</span>
                                </div>
                                <input class="textbox" type="text" id="author" name="articleAuthor" placeholder="e.g Alexander - Climates News">
                            </div>

                            <div class="rows">
                                <div class="insider-row">
                                    <label class="labeltext" for="thumbnail">Article Thumbnail</label><span class="required">*</span>
                                </div>
                                <input type="file" id="thumbnail" name="articleImage">
                            </div>
                        </div>
                    </div>
                    <div class="rows">
                        <div class="insider-row">
                            <label class="labeltext" for="description">Article Content</label><span class="required">*</span>
                        </div>
                        <textarea class="textboxdesc" id="description" name="articleContent" rows="4" placeholder="Max. 300 Words"></textarea>
                    </div>

                    <div class="errorMessage">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="button">
                        <button type="submit" class="buttonRequest">Create Article</button>
                    </div>
                </form>
                </div>
            
            </div>
        </div>
    </div>
</x-layout>

