@extends('common')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h3>Add Guest book</h3>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="post" action="{{ route('guestbook.store') }}">
                @csrf
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}"/>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}"/>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}"/>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" name="phone" value="{{old('phone')}}"/>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select class="form-control" name="gender">
                        <option value=''>-Select-</option>
                        <option value='male' @if (old('gender') == 'male') selected="selected" @endif>Male</option>
                        <option value='female' @if (old('gender') == 'female') selected="selected" @endif>Female</option>
                        <option value='others' @if (old('gender') == 'others') selected="selected" @endif>Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea type="text" class="form-control" name="address" />{{{ old('address') }}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Guest</button>
            </form>
        </div>
    </div>
</div>

@endsection