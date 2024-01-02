@extends('layout.base')
@section('title','Attempt')
@section('main')
<div class="container">
    @if(Session::has('Notify'))
    <div class="alert alert-success">
        {{Session::get('Notify')}}
    </div>
    @endif
<a href="{{route('attempts.create')}}" class="btn btn-primary float-end" >+ Add New Attempt</a>
@if($attempts)
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Student Name</th>
            <th>Course Name</th>
            <th>Year</th>
            <th>Semester</th>
            <th>Grade</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($attempts as $i => $attempt)
        <tr>
            <th>{{$i+1}}</th>
            <td>{{$attempt->student_givenNames .' '. $attempt->student_surName}}</td>
            <td>{{$attempt->course_name}}</td>
            <td>{{$attempt->year}}</td>
            <td>{{$attempt->semester}}</td>
            <td>{{$attempt->grade}}</td>
            <td class="flex">
                <form action="{{route('attempts.destroy', $attempt->student_id)}}" method="post"
                onsubmit="return confirm('{{trans('Are you sure?')}}');">
                    @csrf 
                    @method('delete')
                    <a href="" class="btn btn-success">Show</a>
                    <a href="{{route('attempts.edit',$attempt->student_id)}}" class="btn btn-warning">Edit</a>
                    <button type="submit" class="btn btn-danger" >Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
@else 
    <div class="alert alert-danger">
        <p class="d-flex justify-content-center">
        No Data
        </p>
    </div>
@endif

</table>
<div class="d-flex justify-content-center">
    {{$attempts->links()}}
</div>

</div>

@endsection()