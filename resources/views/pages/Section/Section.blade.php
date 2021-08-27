@extends('layouts.master')
@section('css')

@endsection
@section('title')
  Section
@stop

@section('page-header')
    <!-- breadcrumb -->
@endsection
@section('PageTitle')
    Section
@stop
<!-- breadcrumb -->

@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12 mb-30 mt-4 ">
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
                        Add Section
                    </button>
                    <br><br>




                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-dark text-white">
                            <tr>
                                <th>Section name </th>
                                <th>Class name </th>
                                 <th>Note </th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>

                    @if (isset($details))

                        <?php $List_Section = $details; ?>
                    @else

                        <?php $List_Section = $sections; ?>
                    @endif

                        <?php $i = 0; ?>

                        @foreach ($List_Section as $section)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $section->name }}</td>
                                    <td>{{$section->Class->name}}</td>
                                    <td>{{ $section->note }}</td>
                                    <td>
                                        <button type="button"  class="btn btn-primary mb-1" data-toggle="modal"
                                                data-target="#edit{{ $section->id }}"
                                                title="Edit"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button"  class="btn btn-danger mb-1" data-toggle="modal"
                                                data-target="#delete{{ $section->id }}"
                                                title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>


                           <div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                               Edit section
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('Section.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">Section name
                                                            :</label>
                                                        <input id="Name" type="text" name="name"
                                                               class="form-control"
                                                               value="{{ $section->name }}"
                                                               required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $section->id }}">
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">Class name
                                                        :</label>
                                                    <select class="form-control form-control-lg"
                                                            id="exampleFormControlSelect1" name="class_id">
                                                        <option value="{{ $section->Class->id }}">
                                                            {{ $section->Class->name }}
                                                        </option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class->id }}">
                                                                {{ $class->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>



                                                </div>

                                          <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">Notes
                                                            :</label>
                                                        <textarea class="form-control" name="note"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3">{{ $section->note }}</textarea>
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
                                <div class="modal fade" id="delete{{ $section->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Delete section
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Section.destroy','test')}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    Are you sure you want to delete this section ???
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $section->id }}">
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


  <!-- add_modal_Grade -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            Add section
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('Section.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="name"
                                           class="mr-sm-2">Name
                                        :</label>
                                    <input id="name" type="text" name="name" class="form-control" required>
                                </div>

                            </div>
                             <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">Class name
                                                :</label>

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
