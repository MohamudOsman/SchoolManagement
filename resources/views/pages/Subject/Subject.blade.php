@extends('layouts.master')
@section('css')

@endsection
@section('title')
    Subjects
@stop

@section('page-header')
    <!-- breadcrumb -->
@endsection
@section('PageTitle')
    Subjects
@stop
<!-- breadcrumb -->

@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12 mb-30 mt-4">
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

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Add Subject
                    </button>
                    <br><br>




                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-dark text-white">
                            <tr>
                                <th>Subject name </th>
                                <th> Max mark </th>
                                 <th> Min mark </th>
                                <th>Note </th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>

                        <?php $i = 0; ?>

                        @foreach ($subjects as $subject)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{$subject->max_mark}}</td>
                                     <td>{{$subject->min_mark}}</td>
                                    <td>{{ $subject->note }}</td>
                                    <td>
                                        <button type="button"  class="btn btn-primary mb-1" data-toggle="modal"
                                                data-target="#edit{{ $subject->id }}"
                                                title="Edit"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button"  class="btn btn-danger mb-1" data-toggle="modal"
                                                data-target="#delete{{ $subject->id }}"
                                                title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>


                           <div class="modal fade" id="edit{{ $subject->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                               Edit subject
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('Subject.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">Subject name
                                                            :</label>
                                                        <input id="Name" type="text" name="name"
                                                               class="form-control"
                                                               value="{{ $subject->name }}"
                                                               required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $subject->id }}">
                                                    </div>
                                                </div>

                              <div class="row">
                                <div class="col">
                                    <label for="name"
                                           class="mr-sm-2">Max mark
                                        :</label>
                                    <input id="name" type="number" name="max_mark" class="form-control"  value="{{ $subject->max_mark }}"required>
                                     <label for="name"
                                           class="mr-sm-2">Min mark
                                        :</label>
                                    <input id="name" type="number" name="min_mark" class="form-control" value="{{ $subject->min_mark }}" required>
                                </div>
                            </div>
                             <div class="col">
                               <label for="inputName" class="control-label">class name</label>
                                  <select multiple name="class_id[]" class="form-control"
                                  id="exampleFormControlSelect2" required>
                                      @foreach($classes as $class)
                                         <option value="{{$class->id}}"><p>{{$class->name}}</p><p>/{{$class->Levels->name}}</p></option>
                                    @endforeach
                                 </select>
                            </div>

                                          <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">Notes
                                                            :</label>
                                                        <textarea class="form-control" name="note"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3">{{ $subject->note }}</textarea>
                                                    </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                            class="btn btn-success">submit</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>






                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $subject->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Delete Subject
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Subject.destroy','test')}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    Are you sure you want to delete this subject ???
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $subject->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">submit</button>
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


  <!-- add_modal_subject -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            Add subject
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('Subject.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="name"
                                           class="mr-sm-2">Name
                                        :</label>
                                    <input id="name" type="text" name="name" class="form-control" required>
                                </div>
                            </div>

                              <div class="row">
                                <div class="col">
                                    <label for="name"
                                           class="mr-sm-2">Max mark
                                        :</label>
                                    <input id="name" type="number" name="max_mark" class="form-control" required>
                                     <label for="name"
                                           class="mr-sm-2">Min mark
                                        :</label>
                                    <input id="name" type="number" name="min_mark" class="form-control" required>
                                </div>
                            </div>
                                <div class="col">
                               <label for="inputName" class="control-label">Classes</label>
                                  <select multiple name="class_id[]" class="form-control" id="exampleFormControlSelect2">
                                      @foreach($classes as $class)
                                         <option value="{{$class->id}}"><p>{{$class->name}}</p><p>/{{$class->Levels->name}}</p></option>
                                    @endforeach
                                 </select>
                            </div>
                            <div class="form-group">
                                <label
                                    for="exampleFormControlTextarea1">Notes
                                    :</label>
                                <textarea class="form-control" name="note" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
                            </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                                data-dismiss="modal">Close</button>
                        <button type="submit"
                                class="btn btn-success">submit</button>
                    </div>
                    </form>

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
