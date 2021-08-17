@extends('layouts.master')
@section('css')

@section('title')
    Teachers
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Teachers
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
                        Add Teacher
                    </button>
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

                        <?php $i = 0; ?>

                        @foreach ($teachers as $teacher)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{$teacher->phone}}</td>
                                     <td>{{$teacher->email}}</td>
                                     <td>{{$teacher->gender}}</td>
                                    <td>{{ $teacher->date_of_birth }}</td>
                                    <td>{{$teacher->Address}}</td>
                                    <td>
                                        <button type="button"  class="btn btn-primary mb-1" data-toggle="modal"
                                                data-target="#edit{{ $teacher->id }}"
                                                title="Edit"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button"  class="btn btn-danger mb-1" data-toggle="modal"
                                                data-target="#delete{{ $teacher->id }}"
                                                title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!--    modal edit teacher   -->
                           <div class="modal fade" id="edit{{ $teacher->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                               Edit Teacher's information
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('Teacher.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">teacher name
                                                            :</label>
                                                        <input id="Name" type="text" name="name"
                                                               class="form-control"
                                                               value="{{ $teacher->name }}"
                                                               required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $teacher->id }}">
                                                    </div>
                                                </div>

                                   <div class="row">
                                <div class="col">
                                    <label for="name"
                                           class="mr-sm-2">phone
                                        :</label>
                                    <input id="name" type="number"  value="{{ $teacher->phone }}"  name="phone" class="form-control" required>
                                     <label for="name"
                                           class="mr-sm-2">email
                                        :</label>
                                    <input id="name" type="email" name="email" value="{{ $teacher->email }}" class="form-control" required>
                                     <label for="name"
                                           class="mr-sm-2">date_of_birth
                                        :</label>
                                    <input id="name" type="date" name="date_of_birth"  value="{{ $teacher->date_of_birth }}" class="form-control" required>
                                                                         <label for="name"
                                           class="mr-sm-2">Address
                                        :</label>
                                    <input id="name" type="text" name="Address" value="{{ $teacher->Aaddress }}" class="form-control" required>
                                </div>
                            </div>
                             <div class="col">
                               <label for="inputName" class="control-label">certificates</label>
                                  <select multiple name="certificate_id[]" class="form-control"
                                  id="exampleFormControlSelect2">
                                      @foreach($certificates as $certificate)
                                         <option value="{{$certificate->id}}">{{$certificate->name}}</option>
                                    @endforeach
                                 </select>
                            </div>
                            <br><br>
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






                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $teacher->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Delete Teacher's information
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Teacher.destroy','test')}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    Are you sure you want to delete this teacher's information ???
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $teacher->id }}">
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


  <!-- add modal teacher  -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            Add teacher's information
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('Teacher.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="name"  class="mr-sm-2">teacher's name :</label>
                                    <input id="name" type="text" name="name" class="form-control" required>
                                    <label for="name" class="mr-sm-2">phone :</label>
                                    <input id="name" type="number" name="phone" class="form-control" required>
                                     <label for="name"  class="mr-sm-2">email :</label>
                                    <input id="name" type="email" name="email" class="form-control" required>
                                    <label for="name"  class="mr-sm-2">date_of_birth :</label>
                                    <input id="name" type="date" name="date_of_birth" class="form-control" required>
                                    <label for="name"   class="mr-sm-2">Address :</label>
                                    <input id="name" type="text" name="Address" class="form-control" >
                                    <label for="name"   class="mr-sm-2">password :</label>
                                    <input id="name" type="password" name="password" class="form-control" >
                                </div>
                            </div>
                            <div class="col">
                             <div class="box">
                                <select class="fancyselect" name="gender" required>
                                    <option value="male" >Male</option>
                                    <option value="female">Female </option>
                                </select>
                             </div>
                            </div>
                             <div class="col">
                               <label for="inputName" class="control-label">certificates</label>
                                  <select multiple name="certificate_id[]" class="form-control" id="exampleFormControlSelect2">
                                      @foreach($certificates as $certificate)
                                         <option value="{{$certificate->id}}">{{$certificate->name}}</option>
                                    @endforeach
                                 </select>
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
