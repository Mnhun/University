@extends('layout.base')
@section('title','Student')
@section('main')
<div class="container">
    @if(Session::has('Notify'))
    <div class="alert alert-success">
        {{Session::get('Notify')}}
    </div>
    @endif
<a href="{{route('students.create')}}" class="btn btn-primary float-end" >+ Add New Student</a>
@if($students)
<div>
    <form action="{{route('students.index')}}" method="get">
        <input type="text" name="search" id="" value="{{request()->input('search')}}">
        <button type="submit" class="btn btn-success">Search</button>
        <a href="{{route('students.index')}}" class="btn btn-secondary">Clear</a>
    </form>
</div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Date Of Birth</th>
            <th>Year Enrolled</th>
            <th>Program</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $i => $student)
        <tr>
            <th>{{$i+1}}</th>
            <td>{{$student->givenNames .' '. $student->surName }}</td>
            <td>{{$student->dob}}</td>
            <td>{{$student->yearEnrolled}}</td>
            <td>{{$student->program_name}}</td>
            <td class="flex">
                <form action="{{route('students.destroy', $student->id)}}" method="post"
                onsubmit="return confirm('{{trans('Are you sure?')}}');">
                    @csrf 
                    @method('delete')
                    <a href="" class="btn btn-success">Show</a>
                    <a href="{{route('students.edit',$student->id)}}" class="btn btn-warning">Edit</a>
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
    {{$students->links()}}
</div>

</div>

@endsection()