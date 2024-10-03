@section('title', 'Edit Article Details')

@section('head')
    <link href="{{ asset('css/edit_user.css') }}" rel="stylesheet" />
@endsection

<x-layout>
    <div class="backgroundnavbar"></div>
    <div class="content">
        <div class="container all-container">
            <div class="detail">
                <h2>Edit Article Details</h2>
                <form id="save-user-details-form" action="{{ route('dashboard.article.update',$article->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                <div class="inputs">
                    <div class="rows">
                        <label class="label" for="title">Title</label>
                        <input type="text" id="title" name="articleTitle" class="form-control" value="{{ old('articleTitle', $article->articleTitle) }}">
                    </div>
                    <div class="rows">
                        <label class="label" for="author">Author</label>
                        <input type="email" id="author" name="articleAuthor" class="form-control" value="{{ old('articleAuthor', $article->articleAuthor) }}">
                    </div>
                    <div class="rows">
                        <label class="label" for="subtitle">Sub Title</label>
                        <input type="text" id="subtitle" name="articleSubTitle" class="form-control" value="{{ old('articleSubTitle', $article->articleSubTitle) }}">
                    </div>
                    <div class="rows">
                        <label class="label" for="content">Content</label>
                        <textarea class="textbox" id="content" name="articleContent" rows="5">{{ old('articleContent', $article->articleContent) }}</textarea>
                    </div>
                    <div class="rows">
                        <label class="label" for="Thumbnail">Thumbnail</label>
                        <img src="{{ asset('storage/' . $article->articleImage) }}" alt="Thumbnail" class="ktpimage"/>
                        {{-- <button type="button" class="ButtonDelete" onclick="event.preventDefault(); document.getElementById('delete-ktp-form').submit();">Delete KTP</button> --}}
                        {{-- <form id="delete-ktp-form" action="{{ route('delete.ktp', $user->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form> --}}
                    </div>
                    <div class="rows">
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
                </div>

                <button class="ButtonSave" type="submit" onclick="event.preventDefault(); document.getElementById('save-user-details-form').submit();">Save Details</button>
            </form>
                
                    {{-- @csrf
                    @method('PUT')
                    <input type="hidden" name="username" value="{{ old('username', $user->username) }}">
                    <input type="hidden" name="email" value="{{ old('email', $user->email) }}">
                    <input type="hidden" name="address" value="{{ old('address', $user->address) }}">
                    <input type="hidden" name="dob" value="{{ old('dob', $user->dob) }}">
                    <input type="hidden" name="verification_status" value="{{ old('verification_status', $user->verifStatus) }}"> --}}
                
            </div>
        </div>
    </div>
</x-layout>

