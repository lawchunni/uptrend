@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="mb-0">Add Category</h2>
                </div>
                <div class="card-body">
                {{-- {{ $errors }} --}}
                    <form  enctype="multipart/form-data" id="create" action="/admin/category" method="post">
                        @csrf 
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" />
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror" id="image" />
                            @error('image')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>

        </div>
</div>

@endsection