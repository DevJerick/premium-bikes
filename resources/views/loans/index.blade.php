@extends('templates.master')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">All Loans</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a class="btn btn-primary mb-2" href="{{ route('loans.create') }}">
           Add New Loans
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if ($message = session('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        <div class="table-responsive">
            <table class="table table-sm table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Drivers License</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loans as $index => $val )
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td>{{ $val->firstname }}</td>
                            <td>{{ $val->middlename }}</td>
                            <td>{{ $val->lastname }}</td>
                            <td>{{ $val->email }}</td>
                            <td>{{ $val->contact }}</td>
                            <td><img src="/img/{{ $val->drivers_license }}" width="50px"></td>
                            <td>{{ $val->created_at }}</td>
                            <td>
                                <form action="{{ route('loans.destroy', $val->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-sm btn-success" href={{ route('loans.show', $val->id) }}>Show</a>
                                <a class="btn btn-sm btn-warning" href={{ route('loans.edit', $val->id) }}>Edit</a>
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection