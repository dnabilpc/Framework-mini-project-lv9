@extends('layouts.main')
@section('title', 'List Character')
@section('content')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('status') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex flex-column flex-md-row justify-content-end border-bottom p-3">
        <a href="{{ route('student.create') }}" class="btn btn-primary mb-2 mb-md-0">
            Tambah Data
            <i class="fa-solid fa-plus ml-1"></i>
        </a>
    </div>
    <div class="row">
        @foreach ($students as $student)
            <div class="col-md-6">
                <div class="card m-4" style="min-height: 40em">
                    <div class="custom-card-image">
                        <img src="{{ asset('storage/images') . '/' . $student['image'] }}" class="card-img-top"
                            alt="{{ $student['name'] }}" style="max-height: 25em;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $student['name'] }}</h5>
                        <p class="card-text">{{ $student['description'] }}</p>
                        <a href="{{ route('student.show', $student['id']); }}" class="btn btn-primary">Biodata Lengkap</a>
                        <form action=" {{ route('student.destroy', ['student' => $student['id']]) }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('student.edit', ['student' => $student['id']]); }}" class="btn btn-success">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
