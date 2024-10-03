@section('head')
    <link href="{{ asset('css/verif.css') }}" rel="stylesheet">
@endsection

<x-layout>
    <div class="content">
        <div class="container all-container">
            <div class="form">
                <div class="txt">
                    <h3>Verify Your Identity</h3>
                </div>

                <form action="{{ route('verif.image',auth()->id()) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="inputs">
                        <div class="rows">

                            
                            <input type="file" name="userKTP" id="FileUpload" onchange="previewImage(event)" />

                            <img id="uploadedImage" class="uploaded" alt="Uploaded Image" style="display:none;" />


                            <div class="button-rows">
                                <button type="submit" class="ButtonSv">Save</button>
                            </div>

                            @if ($errors->any())
                                <div class="errorMessage">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Fungsi untuk menampilkan gambar setelah diupload
        function previewImage(event) {
            const uploadedImage = document.getElementById('uploadedImage');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function() {
                uploadedImage.src = reader.result; // Mengatur src untuk tag img
                uploadedImage.style.display = 'block'; // Menampilkan gambar
            };

            if (file) {
                reader.readAsDataURL(file); // Membaca file sebagai URL data
            }
        }
    </script>
</x-layout>