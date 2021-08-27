@extends('layouts.master')
@section('css')

@endsection
@section('title')
    Staffs
@stop

@section('page-header')
    <!-- breadcrumb -->
@endsection
@section('PageTitle')
    Staffs
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

                <a href="{{route('Staff.create')}}" class="button x-small" role="button"
                                   aria-pressed="true">Add Staff</a><br>

                    <br><br>




                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-secondary">
                            <tr>
                                <th>Name </th>
                                <th> phone  </th>
                                 <th> email  </th>
                                 <th>gender</th>
                                <th>date_of_birth </th>
                                <th>Address</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>

                        @foreach ($staffs as $staff)
                                <tr>
                                    <td>{{ $staff->name }}</td>
                                    <td>{{$staff->phone}}</td>
                                     <td>{{$staff->email}}</td>
                                     <td>{{$staff->gender}}</td>
                                    <td>{{ $staff->date_of_birth }}</td>
                                    <td>{{$staff->Address}}</td>
                                    <td>
                                        <a href="{{route('Staff.edit', $staff->id)}}"
                                                        class="btn btn-primary mb-1" role="button" aria-pressed="true">
                                                        <i class="fa fa-edit"></i></a>
                                        <button type="button"  class="btn btn-danger mb-1" data-toggle="modal"
                                                data-target="#delete{{ $staff->id }}"
                                                title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>







                                <!-- delete_modal_staff -->
                                <div class="modal fade" id="delete{{ $staff->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Delete staff's information
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Staff.destroy','test')}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    Are you sure you want to delete this staff's information ???
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $staff->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                @endforeach


                        </table>

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
