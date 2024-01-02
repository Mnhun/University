@extends('layout.base')
@section('title', 'Create Student')
@section('main')
<div class="container">
<h2>Add Student</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('students.store')}}" method="post">
    @csrf 
    <div class="row">
        <label for="">Given names:</label>
        <input type="text" name="givenNames" id="">
    </div>
    <div class="row">
        <label for="">Surname:</label>
        <input type="text" name="surName" id="">
    </div>
    <div class="row">
        <label for="">Date Of Birth:</label>
        <input type="date" name="dob" id="">
    </div>
    <div class="row">
        <label for="">Year Enrolled:</label>
        <input type="text" name="yearEnrolled" id="">
    </div>
    <div class="row">
        <label for="">Programs:</label>
        <select name="program_id" id="">
            <option value="">--Select program--</option>
            @foreach($programs as $program)
            <option value="{{$program->id}}">{{$program->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success mt-4">Save</button>

</form>
</div>

@endsection()