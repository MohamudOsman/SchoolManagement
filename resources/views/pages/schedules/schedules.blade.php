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

                <form action="{{route('schedules.create','1')}}" method="post">  {{method_field('patch')}}
                    @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name"class="mr-sm-2">choose the class name to add schedules :</label>
                                    <div class="box">
                                        <select class="fancyselect" name="class_id" required>
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
                            <button type="submit" class="btn btn-success">go</button>
                        </div>
                </form>
                <br><br>




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
