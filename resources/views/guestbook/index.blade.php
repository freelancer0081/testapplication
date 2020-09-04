@extends('common')
@section('main')
<div class="row">
    <div class="col-md-12">
        @include('navbar')
    </div>
    <div class="col-sm-12">

        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>
    <div class="col-sm-12">

        <h3>Guest Book list</h3>
        <a href="{{ route('guestbook.create')}}" class="btn btn-primary" type="submit">Add</a>
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Gender</td>
                    <td>Address</td>
                    <td>Edit</td>
                    <td>Delete</td>

                </tr>
            </thead>
            <tbody>
                @foreach($guestbook as $guestbook)
                <tr>
                    <td>{{$guestbook->id}}</td>
                    <td>{{$guestbook->first_name}}</td>
                    <td>{{$guestbook->last_name}}</td>
                    <td>{{$guestbook->email}}</td>
                    <td>{{$guestbook->phone}}</td>
                    <td>{{$guestbook->gender}}</td>
                    <td>{{$guestbook->address}}</td>
                    <td>
                        <a href="{{ route('guestbook.edit',$guestbook->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('guestbook.destroy', $guestbook->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        </div>
        @endsection