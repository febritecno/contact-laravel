@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>CRUD Contact</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('contact.create') }}"> Create New Contact</a>
            <a class="btn btn-danger" href="{{ route('groups.index') }}"> List Groups</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-pbordered">
    <tr>
        <th>No</th>
        <th>Avatar</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Address</th>
        <th>City</th>
        <th>Zip</th>
        <th>Country</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Note</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($contacts as $contact)
    <tr>
        <td>{{ ++$i }}</td>
        <td><img style="width:100px" src="{{ asset('uploads').'/'.$contact->avatar }}" /></td>
        <td>{{ $contact->first_name }}</td>
        <td>{{ $contact->last_name }}</td>
        <td>{{ $contact->address }}</td>
        <td>{{ $contact->city }}</td>
        <td>{{ $contact->zip }}</td>
        <td>{{ $contact->country }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->phone }}</td>
        <td>{{ $contact->note }}</td>
        <td>
            <form action="{{ route('contact.destroy',$contact->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('contact.show',$contact->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('contact.edit',$contact->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $contacts->links() !!}

@endsection