@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="mb-0">Add Advertisement</h2>
                </div>

                <div class="card-body">
                    {{-- {{ $errors }} --}}
                    <form enctype="multipart/form-data" id="create" action="/admin/advertisement" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror"
                                id="image" />
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror"
                                id="title" value="{{ old('title') }}" />
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" name="link" class="form-control  @error('link') is-invalid @enderror"
                                id="link" value="{{ old('link') }}" />
                            @error('link')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                        <label for="pages" class="form-label">Select the page</label>
                            <select id="pages" class="form-select" name="pages" aria-label="Default select example">
                                @foreach($pages as $page)
                                <option @if(old('page')==$page) selected @endif value="{{$page}}">{{$page}}</option>
                                @endforeach
                            </select>
                            @error('pages')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pages" class="form-label">Select the area</label>
                            <select class="form-select" name="area" aria-label="Default select example">
                                @foreach ($area as $areaa)
                                    <option @if (old('areaa') == $areaa) selected @endif value="{{ $areaa }}">
                                        {{ $areaa }}</option>
                                @endforeach
                            </select>
                            @error('area')
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
