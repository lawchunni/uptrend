@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
  <div class="col-8">
      <div class="card mb-4">
        <div class="card-header">
            <h2 class="mb-0">Edit Advertisement</h2>
        </div>
        <div class="card-body">
            {{-- {{ $errors }} --}}
            <form  enctype="multipart/form-data" id="edit" action="/admin/advertisement/{{ $advertisement->id }}" method="post">
                @csrf 
                @method('PUT')
                <input type="hidden" name="id" value="{{ $advertisement->id }}" />
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    @if($advertisement->image)
                    <img src="/storage/{{ $advertisement->image }}" alt="{{ $advertisement->title }}" 
                        style="height: 100px;width:auto"/><br />
                    @endif
                    <input id="image" type="file" name="image" class="form-control  @error('image') is-invalid @enderror" />
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="card-body">
                    {{-- {{ $errors }} --}}
                    <form enctype="multipart/form-data" id="edit" action="/admin/advertisement/{{ $advertisement->id }}"
                        method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $advertisement->id }}" />
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            @if ($advertisement->image)
                                <img src="/storage/{{ $advertisement->image }}" alt="{{ $advertisement->title }}"
                                    style="height: 100px;width:auto" /><br />
                            @endif
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
                                id="title" value="{{ old('title', $advertisement->title) }}" />
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pages" class="form-label">Select the page</label>
                    <select id="pages" class="form-select" name="pages" aria-label="Default select example">
                        @foreach($pages as $page)
                        <option @if(old('page', $page)==$advertisement->pages) selected @endif value="{{$page}}">{{$page}}</option>
                        @endforeach
                    </select>
                    @error('pages')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="area" class="form-label">Select the area</label>
                    <select id="area" class="form-select" name="area" aria-label="Default select example">
                        @foreach($area as $areaa)
                        <option @if(old('areaa', $areaa)==$advertisement->area) selected @endif value="{{$areaa}}">{{$areaa}}</option>
                        @endforeach
                    </select>
                    @error('area')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        <div class="mb-3">
                            <label for="area" class="form-label">Select the area</label>
                            <select class="form-select" name="area" aria-label="Default select example">
                                @foreach ($area as $areaa)
                                    <option @if (old('areaa', $areaa) == $advertisement->area) selected @endif value="{{ $areaa }}">
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
