@extends('layouts.admin')

@section('content')
    <div class="header_bar">
        <h1>{{ $title }}</h1>

        <!-- Search form -->
        <div class="search_form">
            <form class="d-md-flex input-group w-auto my-auto" action="/admin/inquiry" method="get">
                <input autocomplete="off" type="search" class="form-control rounded" name="search" placeholder='Search'
                    maxlength="255" style="min-width: 225px" />
                <button class="input-group-text border-0" type="submit">
                    <i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    @if (isset($inquiries) && !count($inquiries))
        @if (isset($search) && $search)
            <h3 class="py-5 text-center"> Sorry, we could not find any inquiries matching "{{ $search }}"!</h3>
        @else
            <h3 class="py-5 text-center"> There no data available! </h3>
        @endif
    @else
        @if (isset($search) && $search)
            <h4 class="text-muted"> You searched for: {{ $search }}</h4>
        @endif
        <!-- List Tables -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inquiries as $inquiry)
                    <tr>
                        <td>{{ $inquiry->id }}</td>
                        <td>{{ $inquiry->name }}</td>
                        <td>{{ $inquiry->email }}</td>
                        <td>{{ $inquiry->phone }}</td>
                        <td>{{ $inquiry->message }}</td>
                        <td>
                            <form method="post" action="/admin/inquiry/{{ $inquiry->id }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $inquiry->id }}" />
                                <button class="btn btn-outline-danger"
                                    onclick="return confirm('Do you really want to delete {{ $inquiry->name }}?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <div class="px-3">
        {!! $inquiries->links('pagination::bootstrap-5') !!}
    </div>
@endsection
