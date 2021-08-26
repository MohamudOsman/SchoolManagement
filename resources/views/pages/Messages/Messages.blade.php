@extends('layouts.master')
@section('css')

@endsection
@section('title')
    Messages
@stop

@section('page-header')
    <!-- breadcrumb -->
@endsection
@section('PageTitle')
    Messages
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

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                      send
                    </button>
                    <br><br>




                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-secondary">
                            <tr>
                                <th>Messages</th>
                                <th> From</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sentmessages as $message)
                                <tr>
                                    <td>{{ $message->message }}</td>
                                    <td>{{ $message->from }}</td>
                                    <td>
                                        <button type="button"  class="btn btn-primary mb-1" data-toggle="modal"
                                                data-target="#edit{{ $message->id }}"
                                                title="Edit"><i
                                                class="fa fa-edit"></i></button>
                                    </td>
                                </tr>



                                <div class="modal fade" id="edit{{ $message->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Edit message
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{route('messages.update','test')}}" method="post">
                                                    {{method_field('patch')}}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                   class="mr-sm-2">to
                                                                :</label>
                                                            <input id="Name" type="text" name="to"
                                                                   class="form-control"
                                                                   value="{{$message->to}}"
                                                                   required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                             value="{{ $message->id }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">message
                                                            :</label>
                                                        <textarea class="form-control" name="message"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3">{{ $message->message }}</textarea>
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
                            @endforeach
                        </table>

                    </div>

                </div>
            </div>


  <!-- add_modal_Message -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                          Send Messages
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('Message.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="name"
                                           class="mr-sm-2">to
                                        :</label>
                                    <input id="name" type="text" name="to" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label
                                    for="exampleFormControlTextarea1">Message
                                    :</label>
                                <textarea class="form-control" name="message" id="exampleFormControlTextarea1"
                                          rows="4"></textarea>
                            </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                        <button type="submit"
                                class="btn btn-success">send</button>
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
