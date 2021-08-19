@extends('layouts.master')
@section('css')

@section('title')
   Add Student
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Add Student
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-10 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-10">
                        <div class="col-md-10">
                            <br>
                            <form action="{{route('Student.store')}}" method="post">
                             @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">student name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                 <div class="col">
                                    <label for="title">student phone</label>
                                    <input type="number" name="phone" class="form-control" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">father name</label>
                                    <input type="text" name="father_name" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label for="title">mother name</label>
                                    <input type="text" name="mother_name" class="form-control" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">father phone</label>
                                    <input type="number" name="father_phone" class="form-control" >
                                </div>
                                <div class="col">
                                    <label for="title">mother phone</label>
                                    <input type="number" name="mother_phone" class="form-control" >
                                </div>
                            </div>
                            <br>

                           <div class="form-row">
                                <div class="col">
                                    <label for="title">parent email</label>
                                    <input type="email" name="parent_email" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label for="title">parent Password</label>
                                    <input type="password" name="parent_Password" class="form-control" required >
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">student email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label for="title">student Password</label>
                                    <input type="password" name="Password" class="form-control" required >
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">student's date of birth </label>
                                    <input type="date" name="date_of_birth" class="form-control" required>
                                </div>
                            </div>
                            <br>


                                <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">Class name</label>
                                        <select class="fancyselect" name="class_id" required>
                                            <option value=""></option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}" >
                                                        <p>{{ $class->name }} </p>
                                                        <p>/ {{$class->Levels->name }} </p>
                                                    </option>
                                                @endforeach
                                        </select>
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">section name</label>
                                        <select class="fancyselect" name="section_id" required>
                                            <option value=""></option>
                                                @foreach ($sections as $section)
                                                        <option value="{{ $section->id }}" >
                                                              {{ $section->name }}</option>
                                                @endforeach
                                        </select>
                                </div>
                            </div>

                              <div class="form-row">
                            <div class="form-group col">
                                    <label for="inputState">Gender</label>
                                       <select class="fancyselect" name="gender" required>

                                    <option value="male" >Male</option>
                                    <option value="female">Female </option>
                                </select>
                            </div>
                             </div>

                        <button type="submit"
                                class="btn btn-success">submit
                        </button>

                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
