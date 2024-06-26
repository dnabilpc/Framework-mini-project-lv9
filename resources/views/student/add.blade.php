@extends('layouts.main')

@section('content')
    <div class="container mb-5">

        <div class="card p-3 mx-auto">
            <h1 class="card-title text-center mb-3">Add Biodata</h1>
            <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="exampleInputNIM" class="form-label">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid  @enderror" id="exampleInputNIM"
                            aria-describedby="NIMHelp" name="nim" value="{{ old('nim') }}">
                        @error('nim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputName" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid  @enderror"
                            id="exampleInputName" aria-describedby="NameHelp" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="exampleInputMajor" class="form-label">Jurusan</label>
                        <select class="form-select @error('major') is-invalid  @enderror" id="exampleInputMajor"
                            aria-describedby="majorHelp" name="major">
                            <option value="">Pilih Jurusan</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                            <option value="Rekaya Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        </select>
                    </div>
                    @error('major')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="col-md-6">
                        <label for="exampleInputEmail" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid  @enderror" id="exampleInputEmail" aria-describedby="EmailHelp"
                            name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="exampleInputImgPath" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid  @enderror"
                        id="exampleInputImgPath" aria-describedby="ImgPathHelp" name="image" onchange="previewImg()">
                        <img alt="" class="img-fluid img-thumbnail mt-2 w-25" id="img-preview"
                        style="display: none">
                        @error('img_path')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputNoHP" class="form-label">No HP</label>
                        <input type="text" class="form-control @error('phone_number') is-invalid  @enderror"
                            id="exampleInputPhoneNum" aria-describedby="PhoneNumber" name="phone_number"
                            value="{{ old('phone_number') }}">
                        @error('phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


    </div>

    <script>
        function previewImg() {
            const img_path = document.querySelector('#exampleInputImgPath');
            const img_preview = document.querySelector('#img-preview');

            const fileImg = new FileReader();
            fileImg.readAsDataURL(img_path.files[0]);

            fileImg.onload = function(e) {
                img_preview.src = e.target.result;
            }

            img_preview.style.display = 'block';
        }
    </script>
@endsection
