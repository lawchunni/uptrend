@extends('layouts.admin')

@section('content')
    <div class="header_bar">
        <h1>{{ $title }}</h1>

        <div class="d-flex my-auto">
            <!-- add shiping charge -->
            <a href="/admin/shipping-charge/create" class="btn btn-secondary mx-2">Add Shiping Charge</a>

            <!-- Search form -->
            <div class="search_form">
                <form class="d-md-flex input-group w-auto my-auto" action="/admin/shipping-charge" method="get">
                    <input autocomplete="off" type="search" class="form-control rounded" name="search" placeholder='Search'
                        maxlength="255" style="min-width: 225px" />
                    <button class="input-group-text border-0" type="submit">
                        <i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>

    @if (isset($shippingcharges) && !count($shippingcharges))
        @if (isset($search) && $search)
            <h3 class="py-5 text-center"> Sorry, we could not find any shipping charges matching "{{ $search }}"!</h3>
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
                    <th scope="col">Continent</th>
                    <th scope="col">Country</th>
                    <th scope="col">Charge</th>
                    <th scope="col" class="action-btn">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shippingcharges as $shippingcharge)
                    <tr>
                        <td>{{ $shippingcharge->id }}</td>
                        <td>{{ $shippingcharge->continent }}</td>
                        <td>{{ $shippingcharge->country }}</td>
                        <td>{{ $shippingcharge->charge }}</td>
                        <td>
                            <a href="/admin/shipping-charge/edit/{{ $shippingcharge->id }}" class="btn btn-outline-primary">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <form method="post" action="/admin/shipping-charge/{{ $shippingcharge->id }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $shippingcharge->id }}" />
                                <button class="btn btn-outline-danger"
                                    onclick="return confirm('Do you really want to delete {{ $shippingcharge->continent }}?')">
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
        {!! $shippingcharges->links('pagination::bootstrap-5') !!}
    </div>
@endsection
