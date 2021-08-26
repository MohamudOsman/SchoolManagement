@extends('layouts.master')
@section('css')

@endsection
@section('title')
     promotion
@stop

@section('page-header')
    <!-- breadcrumb -->
@endsection
@section('PageTitle')
   promotion
@stop
<!-- breadcrumb -->

@section('content')
    <!-- row -->


                <a href="{{route('Promotion.create')}}" class="button x-small" role="button"
                                   aria-pressed="true">Add promotion</a><br>

                    <br><br>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">student name</th>
                                            <th class="alert-danger"> old  year</th>
                                            <th class="alert-danger"> old class </th>
                                            <th class="alert-danger">old section  </th>
                                            <th class="alert-success">new year </th>
                                            <th class="alert-success">new class  </th>
                                            <th class="alert-success">new section  </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->academic_year}}</td>
                                                <td>{{$promotion->from_class->name}}</td>
                                                <td>{{$promotion->from_section->name}}</td>
                                                <td>{{$promotion->academic_year_new}}</td>
                                                <td>{{$promotion->to_class->name}}</td>
                                                <td>{{$promotion->to_section->name}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>


    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
