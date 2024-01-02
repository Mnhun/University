@extends('layout.base')
@section('title', 'Edit Student')
@section('main')
<div class="container">
<h2>Edit Student</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('students.update',$student->id)}}" method="post">
    @csrf 
    @method('put')
    <div class="row">
        <label for="">Given Names:</label>
        <input type="text" name="givenNames" id="" value="{{$student->givenNames}}">
    </div>
    <div class="row">
        <label for="">SurName:</label>
        <input type="text" name="surName" id="" value="{{$student->surName}}">
    </div>
    <div class="row">
        <label for="">Date Of Birth:</label>
        <input type="date" name="dob" id="" value="{{$student->dob}}">
    </div>
    <div class="row">
        <label for="">Year Enrolled:</label>
        <input type="text" name="yearEnrolled" id="" value="{{$student->yearEnrolled}}">
    </div>
    <!-- <div class="row">
        <label for="">Department:</label>
        <input type="text" name="department_id" id="">
    </div> -->
    <div class="row">
        <label for="">Program:</label>
        <select name="program_id" id="">
            @foreach($programs as $program)
            <option @selected($program->id == $student->program_id)
                 value="{{$program->id}}">{{$program->name}}</option>
            @endforeach            
        </select>
    </div>
    <button type="submit" class="btn btn-success mt-4">Save</button>

</form>
</div>

@endsection()