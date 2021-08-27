@extends('layouts.master')

@section('css')

@endsection
@section('title')
    Levels
@stop

@section('page-header')
    <!-- breadcrumb -->
@endsection
@section('PageTitle')
    Levels
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
                        Add Level
                    </button>
                    <br><br>




                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-dark text-white">
                            <tr>
                                <th>Level name</th>
                                <th>Note</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($Levels as $level)
                                <tr>
                                    <td>{{ $level->name }}</td>
                                    <td>{{ $level->note }}</td>
                                    <td>
                                        <button type="button"  class="btn btn-primary mb-1" data-toggle="modal"
                                                data-target="#edit{{ $level->id }}"
                                                title="Edit"><i
                                                class="fa fa-edit"></i></button>

                                        <button type="button"  class="btn btn-danger mb-1" data-toggle="modal"
                                                data-target="#delete{{ $level->id }}"
                                                title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>



                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $level->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Edit level
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{route('Levels.update','test')}}" method="post">
                                                    {{method_field('patch')}}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                   class="mr-sm-2">Name
                                                                :</label>
                                                            <input id="Name" type="text" name="name"
                                                                   class="form-control"
                                                                   value="{{$level->name}}"
                                                                   required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                             value="{{ $level->id }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">Notes
                                                            :</label>
                                                        <textarea class="form-control" name="note"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3">{{ $level->note }}</textarea>
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
                                <div class="modal fade" id="delete{{ $level->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Delete Level
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Levels.destroy','test')}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    Are you sure you want to delete this Level ???
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $level->id }}">
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
                            Add level
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('Levels.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="name"
                                           class="mr-sm-2">Name
                                        :</label>
                                    <input id="name" type="text" name="name" class="form-control" required>
                                </div>
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
