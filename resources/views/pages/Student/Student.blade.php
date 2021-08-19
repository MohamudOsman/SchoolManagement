@extends('layouts.master')
@section('css')

@section('title')
    Students
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Students
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-10 mb-30">
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

                <a href="{{route('Student.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">Add Student</a><br>

                    <br><br>





                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-secondary">
                            <tr>
                                <th> Student's Name </th>
                                <th> father's name </th>
                                <th> mother's name</th>
                                <th>phone  </th>
                                 <th>email  </th>
                                 <th> gender</th>
                                <th>date of birth </th>
                                <th> class' name</th>
                                <th> section's name</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>

                        <?php $i = 0; ?>

                        @foreach ($students as $student)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $student->name }}</td>
                                    <td>{{$student->parent->father_name}}</td>
                                    <td>{{$student->parent->mother_name}}</td>
                                    <td>{{$student->phone}}</td>
                                     <td>{{$student->email}}</td>
                                     <td>{{$student->gender}}</td>
                                    <td>{{ $student->date_of_birth }}</td>
                                    <td>{{$student->classes->name}}</td>
                                    <td>{{$student->sections->name}}</td>
                                    <td>
                                        <a href="{{route('Student.edit', $student->id)}}"
                                                        class="btn btn-info btn-sm" role="button" aria-pressed="true">
                                                        <i class="fa fa-edit"></i></a>
                                        <button type="button"  class="btn btn-danger mb-1" data-toggle="modal"
                                                data-target="#delete{{ $student->id }}"
                                                title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>










                                <!-- delete_modal_student -->
                                <div class="modal fade" id="delete{{ $student->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Delete student's information
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Student.destroy','test')}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    Are you sure you want to delete this student's information ???
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $student->id }}">
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




    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
