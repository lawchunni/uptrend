@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-header">
            <h2 class="mb-0">{{ $title }}</h2>
        </div>
        <div class="card-body">
            {{-- {{ $errors }} --}}
          <form id="edit" action="{{ route('adminTaxUpdate', $tax->id) }}" method="post">
              @csrf
              @method('PUT')
              <input type="hidden" name="id" value="{{ $tax->id }}" />

              <div class="mb-3">
                <label for="province" class="form-label">Province</label>
                <input type="text" name="province" class="form-control" id="province" value="{{ old('province', $tax->province) }}" />
                @error('province')
                  <span style="color: #900">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="province_short" class="form-label">Province Short</label>
                <input type="text" name="province_short" class="form-control" id="province_short" value="{{ old('province_short', $tax->province_short) }}" />
                @error('province_short')
                  <span style="color: #900">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="gst" class="form-label">GST</label>
                <input type="text" name="gst" class="form-control" id="gst" value="{{ old('gst', $tax->gst) }}" />
                @error('gst')
                  <span style="color: #900">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="pst" class="form-label">PST</label>
                <input type="text" name="pst" class="form-control" id="pst" value="{{ old('pst', $tax->pst) }}" />
                @error('pst')
                  <span style="color: #900">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="hst" class="form-label">HST</label>
                <input type="text" name="hst" class="form-control" id="hst" value="{{ old('hst', $tax->hst) }}" />
                @error('hst')
                  <span style="color: #900">{{ $message }}</span>
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