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

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        Add Student
                    </button>

                     <button type="button" class="button x-small" data-toggle="modal" data-target="{{ route('Student.search')}}">
                        Search for a student
                    </button>

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
                                        <button type="button"  class="btn btn-primary mb-1" data-toggle="modal"
                                                data-target="#edit{{ $student->id }}"
                                                title="Edit"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button"  class="btn btn-danger mb-1" data-toggle="modal"
                                                data-target="#delete{{ $student->id }}"
                                                title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                            <!--   modal edit student   -->
                           <div class="modal fade" id="edit{{ $student->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                               Edit student's information
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('Student.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                              @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="name"  class="mr-sm-2">student's name :</label>
                                    <input id="name" type="text" name="name" class="form-control" value="{{ $student->name }}" required>
                                    <!-- parent information -->
                                     <label for="name"  class="mr-sm-2">father's name :</label>
                                    <input id="name" type="text" name="father_name" class="form-control" value="{{ $student->parent->father_name }}" required>
                                     <label for="name"  class="mr-sm-2">mother's name :</label>
                                    <input id="name" type="text" name="mother_name" class="form-control"value="{{ $student->parent->mother_name }}" required>
                                     <label for="name"  class="mr-sm-2">father's phone :</label>
                                    <input id="name" type="number" name="father_phone" class="form-control" value="{{ $student->parent->father_phone }}" >
                                     <label for="name"  class="mr-sm-2">mother's phone :</label>
                                    <input id="name" type="number" name="mother_phone" class="form-control"value="{{ $student->parent->mother_phone }}">
                                    <input id="id" type="hidden" name="id" class="form-control"  value="{{ $student->id }}">
                                    <input id="id" type="hidden" name="my_parent_id" class="form-control"  value="{{ $student->my_parent_id }}">
                                    <!-- end of parent information-->
                                    <label for="name" class="mr-sm-2">student's phone :</label>
                                    <input id="name" type="number" name="phone" class="form-control" value="{{ $student->phone }}" required>
                                    <label for="name"  class="mr-sm-2">student's date of birth :</label>
                                    <input id="name" type="date" name="date_of_birth" class="form-control" value="{{ $student->date_of_birth }}" required>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id">Class name : </label>
                                                <select class="fancyselect" name="class_id" required>
                                                     <option value="{{ $student->class_id }}"></option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}" >  {{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id">section name : </label>
                                                <select class="fancyselect" name="section_id" required>
                                                     <option value="{{ $student->section_id }}"></option>
                                                    @foreach ($sections as $section)
                                                        <option value="{{ $section->id }}" >  {{ $section->name }}</option>
                                                    @endforeach
                                                </select>
                                </div>
                            </div>

                        </div>
                            </div>
                            <div class="col">
                             <div class="box">
                                <select class="fancyselect" name="gender" value="{{ $student->gender }}" required>
                                    <option value="male" >Male</option>
                                    <option value="female">Female </option>
                                </select>
                             </div>
                            </div>
                            <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                        <button type="submit"
                                class="btn btn-success">Edit</button>
                    </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>









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


  <!-- add modal student  -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            Add student's information
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('Student.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="name"  class="mr-sm-2">student's name :</label>
                                    <input id="name" type="text" name="name" class="form-control" required>
                                    <!-- parent information -->
                                     <label for="name"  class="mr-sm-2">father's name :</label>
                                    <input id="name" type="text" name="father_name" class="form-control" required>
                                     <label for="name"  class="mr-sm-2">mother's name :</label>
                                    <input id="name" type="text" name="mother_name" class="form-control" required>
                                     <label for="name"  class="mr-sm-2">father's phone :</label>
                                    <input id="name" type="number" name="father_phone" class="form-control" required>
                                     <label for="name"  class="mr-sm-2">mother's phone :</label>
                                    <input id="name" type="number" name="mother_phone" class="form-control" required>
                                    <label for="name"  class="mr-sm-2">parent's email :</label>
                                    <input id="name" type="email" name="parent_email" class="form-control" required>
                                    <label for="name"   class="mr-sm-2">parent's Password :</label>
                                    <input id="name" type="password" name="parent_Password" class="form-control" >
                                    <!-- end of parent information-->
                                    <label for="name" class="mr-sm-2">student's phone :</label>
                                    <input id="name" type="number" name="phone" class="form-control" required>
                                    <label for="name"  class="mr-sm-2">student's date of birth :</label>
                                    <input id="name" type="date" name="date_of_birth" class="form-control" required>
                                     <label for="name"  class="mr-sm-2">student's email :</label>
                                    <input id="name" type="email" name="email" class="form-control" required>
                                    <label for="name"   class="mr-sm-2">student's password :</label>
                                    <input id="name" type="password" name="student_Password" class="form-control" >

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id">Class name : </label>
                                                <select class="fancyselect" name="class_id" required>
                                                     <option value=""></option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}" >  {{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id"> section name : </label>
                                                <select class="fancyselect" name="section_id" required>
                                                     <option value=""></option>
                                                    @foreach ($sections as $section)
                                                        <option value="{{ $section->id }}" >  {{ $section->name }}</option>
                                                    @endforeach
                                                </select>
                                </div>
                            </div>





                                </div>
                            </div>
                            <div class="col">
                             <div class="box">
                                <select class="fancyselect" name="gender" required>
                                    <option value=""></option>
                                    <option value="male" >Male</option>
                                    <option value="female">Female </option>
                                </select>
                             </div>
                            </div>
                            <br>
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
