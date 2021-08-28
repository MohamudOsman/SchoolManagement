@extends('layouts.master')
@section('css')

@endsection
@section('title')
    schedules
@stop

@section('page-header')
    <!-- breadcrumb -->
@endsection
@section('PageTitle')
    schedules
@stop
<!-- breadcrumb -->

@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                <a href="{{route('schedules.create','1')}}" class="button x-small" role="button"
                                   aria-pressed="true">Add Student</a><br>


<!--
                <form action="{{route('schedules.create','classes_id')}}" method="post">  {{method_field('patch')}}
                    @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name"class="mr-sm-2">choose the class name to add schedules :</label>
                                    <div class="box">
                                        <select class="fancyselect" name="classes_id" required>
                                            <option value=""></option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}" >
                                                        <p> {{ $class->name }} </p>
                                                        <p>/ {{$class->Levels->name }}</p>
                                                    </option>
                                                @endforeach
                                        </select>
                                    </div>
                            </div>
                        </div>
                        <br>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"> Go </button>
                        </div>
                </form>
                <br><br>

            -->
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
