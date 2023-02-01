@extends('templates.master')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">New Loans</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a class="btn btn-primary mb-2" href="{{ route('loans.index') }}">
            Add New Loans
         </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
     @if ($errors->any())
        <div class="mt-2 alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


        <form action="{{ route('loans.update'), loans->id }}" method="POST" id="update" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class='form-group my-4'>
                <input value="{{ loans->firstname }}" type='text' id='firstname' name='firstname' placeholder='First Name' class='form-control' autocomplete='off' required />
            </div>
            <div class='form-group my-4'>
                <input type='text' id="middlename" name='middlename' placeholder='Middle Name' class='form-control' autocomplete='off' required />
            </div>
            <div class='form-group my-4'>
                <input type='text' id="lastname" name='lastname' placeholder='Last Name' class='form-control' autocomplete='off' required />
            </div>
            <div class='form-group my-4'>
                <input type='text' id="email" name='email' placeholder='Email' class='form-control' autocomplete='off' required />
            </div>
            <div class='form-group my-4'>
                <input type='text' id="contact" name='contact' placeholder='Contact' class='form-control' autocomplete='off' required />
            </div>
            <div class='form-group my-4'>
                <input type='file' name='drivers_license' id="drivers_license" class='form-control' autocomplete='off' required />
            </div>
        </form>

        <button class="btn btn-primary" form="update" type="submit" name="submit">Update</button>
    </div>
</div>
@endsection