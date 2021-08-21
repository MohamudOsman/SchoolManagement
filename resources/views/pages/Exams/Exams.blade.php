@extends('layouts.master')
@section('css')

@section('title')
    Exams
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Exams
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

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        Add Exam
                    </button>
                    <br><br>




                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-secondary">
                            <tr>
                                <th>Subject name </th>
                                <th>Class name </th>
                                 <th>term </th>
                                <th>date</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>


                        @foreach ($exams as $exam)
                                <tr>
                                    <td>{{ $exam->subject->name }}</td>
                                    <td>{{$exam->class->name}}</td>
                                    <td>{{ $exam->term }}</td>
                                    <td>{{$exam->date}}</td>
                                    <td>
                                        <button type="button"  class="btn btn-primary mb-1" data-toggle="modal"
                                                data-target="#edit{{ $exam->id }}"
                                                title="Edit"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button"  class="btn btn-danger mb-1" data-toggle="modal"
                                                data-target="#delete{{ $exam->id }}"
                                                title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>


                           <div class="modal fade" id="edit{{ $exam->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                               Edit exam
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('Exam.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                             <div class="row">
                                <div class="col">
                                    <label for="name" class="mr-sm-2">Class Name :</label>
                                            <div class="box">
                                                <select class="fancyselect" name="classes_id"   required>
                                                    <option value="{{ $exam->class->id }}">
                                                            {{ $exam->class->name }}
                                                    </option>
                                                     <option value="{{$exam->classes_id}}"></option>
                                                     @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}" ><p>{{ $class->name }}</p><p>/{{ $class->levels->name }}</p></option>
                                                    @endforeach
                                                </select>
                                            </div>
                                </div>
                                <br>
                             </div>
                            <div class="row">
                                <div class="col">
                                    <label for="inputName" class="control-label">subject name</label>
                                    <select name="subject_id" class="custom-select" >
                                        <option value="{{ $exam->subject->id }}">
                                                            {{ $exam->subject->name }}
                                        </option>
                                        <option value="{{$exam->subject_id}}" ></option>
                                                    @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->id }}" >{{ $subject->name }}</option>
                                                    @endforeach
                                    </select>
                                </div><br>
                            </div>

                        <input id="id" type="hidden" name="id" class="form-control"value="{{ $exam->id }}">
                            <div class="row">
                                <div class="col">
                                    <label for="name"class="mr-sm-2">term :</label>
                                    <input id="name" type="number" name="term" class="form-control" value="{{$exam->term}}" placeholder="" required >
                                </div><br>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="name"class="mr-sm-2">date :</label>
                                    <input id="name" type="date" name="date" class="form-control" value="{{$exam->date}}" required >
                                </div><br>
                            </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                            class="btn btn-success">submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                                <!-- delete_modal_exam -->
                                <div class="modal fade" id="delete{{ $exam->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Delete Exam
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Exam.destroy','test')}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    Are you sure you want to delete this Exam ???
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $exam->id }}">
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


  <!-- add_modal_Grade -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            Add Exam
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('Exam.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="name" class="mr-sm-2">Class Name :</label>
                                            <div class="box">
                                                <select class="fancyselect" name="classes_id" required>
                                                     <option value=""></option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}" ><p>{{ $class->name }}</p><p>/{{ $class->levels->name }}</p></option>
                                                    @endforeach
                                                </select>
                                            </div>
                                </div>
                                <br>
                            </div>
                             <div class="row">
                                <div class="col">
                                    <label for="inputName" class="control-label">subject name</label>
                                    <select name="subject_id" class="custom-select">
                                        <option value=""></option>
                                                    @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->id }}" >{{ $subject->name }}</option>
                                                    @endforeach
                                    </select>
                                </div><br>
                             </div>
                            <div class="row">
                                <div class="col">
                                    <label for="name"class="mr-sm-2">term :</label>
                                    <input id="name" type="number" name="term" class="form-control" required >
                                </div><br>
                            </div>
                             <div class="row">
                                <div class="col">
                                    <label for="name"class="mr-sm-2">date :</label>
                                    <input id="name" type="date" name="date" class="form-control" required >
                                </div><br>
                            </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                        <button type="submit"
                                class="btn btn-success">submit</button>
                    </div>
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
