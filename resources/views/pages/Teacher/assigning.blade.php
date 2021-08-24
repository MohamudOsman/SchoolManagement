@extends('layouts.master')

@section('css')

@endsection
@section('title')
   Assigning
@stop

@section('page-header')
    <!-- breadcrumb -->
@endsection
@section('PageTitle')
   Assigning
@stop
<!-- breadcrumb -->

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
                            <form action="{{route('teacher.show','test')}}" method="post">
                                 {{method_field('patch')}}
                             @csrf
                            <div class="form-row">
                                 <div class="form-group col">
                                    <label for="inputState">teacher name</label>
                                        <select class="fancyselect" name="teacher_id" required>
                                            <option ></option>
                                                @foreach ($teachers as $teacher)
                                                        <option value="{{ $teacher->id }}" >  {{ $teacher->name }}</option>
                                                @endforeach
                                        </select>
                                </div>

                            </div>
                            <br>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputState">subject name</label>
                                        <select class="fancyselect" name="subject_id" required>
                                            <option ></option>
                                                @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->id }}" >  {{ $subject->name }}</option>
                                                @endforeach
                                        </select>
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">Class name</label>
                                        <select class="fancyselect" name="classes_id" required>
                                            <option></option>
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
                                            <option></option>
                                                @foreach ($sections as $section)
                                                        <option value="{{ $section->id }}" >  {{ $section->name }}</option>
                                                @endforeach
                                        </select>
                                </div>
                            </div>


                        <button type="submit"
                                class="btn btn-success">submit</button>
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
