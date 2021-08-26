@extends('layouts.master')
@section('css')

@endsection
@section('title')
      create promotion
@stop

@section('page-header')
    <!-- breadcrumb -->
@endsection
@section('PageTitle')
   create promotion
@stop
<!-- breadcrumb -->

@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (Session::has('error_promotions'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_promotions')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form method="post" action="{{ route('Promotion.store') }}">
                        @csrf
                          <br><h6 style="color: red;font-family: Cairo"> old </h6><br>

                        <div class="form-row">

                            <div class="form-group col">
                                <label for="Classroom_id">Class name: <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="class_id" required>
                                 <option selected disabled></option>
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}">  <p>{{ $class->name }} </p>
                                                        <p>/ {{$class->Levels->name }} </p></option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">Section name : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>
                                    <option selected disabled></option>
                                    @foreach($sections as $section)
                                        <option value="{{$section->id}}">{{$section->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">academic year : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option selected disabled></option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>



                        </div>
                        <br><h6 style="color: red;font-family: Cairo"> new </h6><br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="Classroom_id">class name: <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="new_class_id" >
                                    <option selected disabled></option>
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}">  <p>{{ $class->name }} </p>
                                                        <p>/ {{$class->Levels->name }} </p></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="section_id">sections name:</label>
                                <select class="custom-select mr-sm-2" name="new_section_id" >
                                    <option selected disabled></option>
                                    @foreach($sections as $section)
                                        <option value="{{$section->id}}">{{$section->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">academic year: <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year_new">
                                        <option selected disabled></option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </form>

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
