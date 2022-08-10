@extends('layouts.admin')

@section('content')
    <div class="header_bar">
        <h1>{{ $title }}</h1>

        <div class="d-flex my-auto">
            <!-- add tax -->
            <a href="{{ route('adminTaxCreate') }}" class="btn btn-secondary mx-2">Add Tax</a>

            <!-- Search form -->
            <div class="search_form">
                <form class="d-md-flex input-group w-auto my-auto" action="{{ route('adminTaxIndex') }}" method="get">
                    <input autocomplete="off" type="search" class="form-control rounded" name="search" placeholder='Search'
                        maxlength="255" style="min-width: 225px" />
                    <button class="input-group-text border-0" type="submit">
                        <i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>

    @if (isset($taxes) && !count($taxes))
        @if (isset($search) && $search)
            <h3 class="py-5 text-center"> Sorry, we could not find any taxes matching "{{ $search }}"!</h3>
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
                    <th scope="col">#</th>
                    <th scope="col">Province</th>
                    <th scope="col">Province Short</th>
                    <th scope="col">GST</th>
                    <th scope="col">PST</th>
                    <th scope="col">HST</th>
                    <th scope="col" class="action-btn">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taxes as $tax)
                    <tr>
                        <td>{{ $tax->id }}</td>
                        <td>{{ $tax->province }}</td>
                        <td>{{ $tax->province_short }}</td>
                        <td>{{ $tax->gst }}</td>
                        <td>{{ $tax->pst }}</td>
                        <td>{{ $tax->hst }}</td>
                        <td>
                            <a href="{{ route('adminTaxEdit', $tax->id) }}" class="btn btn-outline-primary">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <form method="post" action="{{ route('adminTaxDestroy', $tax->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $tax->id }}" />
                                <button class="btn btn-outline-danger"
                                    onclick="return confirm('Do you really want to delete the tax of {{ $tax->province }}?')">
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
        {!! $taxes->links('pagination::bootstrap-5') !!}
    </div>
@endsection
