@extends('layouts.master')
@section('css')

@endsection

@section('title')
    Edit staff
@stop

@section('page-header')
    <!-- breadcrumb -->
@endsection
@section('PageTitle')
   Edit staff
@stop
<!-- breadcrumb -->

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-10 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-10">
                        <div class="col-md-10">
                            <br>
                            <form action="{{route('Staff.update','teat')}}" method="post">
                                 {{method_field('patch')}}
                             @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="name"  class="mr-sm-2">staff's name :</label>
                                    <input id="name" type="text" name="name" class="form-control" value="{{ $staff->name }}" required>
                                    <input id="id" type="hidden" name="id" class="form-control"  value="{{ $staff->id }}">
                                     <input id="id" type="hidden" name="user_id" class="form-control"  value="{{ $staff->user_id }}">

                                </div>
                                 <div class="col">
                                    <label for="name" class="mr-sm-2">phone :</label>
                                    <input id="name" type="number" name="phone" class="form-control" value="{{ $staff->phone }}" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col">
                                     <label for="name"   class="mr-sm-2">Address :</label>
                                    <input id="name" type="text" name="Address"   value="{{ $staff->Address }}"class="form-control" >
                                </div>
                                <div class="col">
                                    <label for="name"  class="mr-sm-2">date_of_birth :</label>
                                    <input id="name" type="date" name="date_of_birth" class="form-control" value="{{ $staff->date_of_birth }}" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                   <label for="name"  class="mr-sm-2">email :</label>
                                    <input id="name" type="email" name="email" class="form-control" value="{{ $staff->email }}"  required>
                                </div>

                                <div class="col">
                                   <label for="name"   class="mr-sm-2">password :</label>
                                    <input id="name" type="password" name="password" class="form-control" >
                                </div>
                            </div>
                            <br>




                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity"> certificates </label>
                                        <select multiple name="certificate_id[]" class="form-control" id="exampleFormControlSelect2">
                                      @foreach($certificates as $certificate)
                                         <option value="{{$certificate->id}}">{{$certificate->name}}</option>
                                    @endforeach
                                 </select>
                                </div>
                            </div>


                               <div class="form-row">
                            <div class="form-group col">
                                    <label for="inputState">Gender</label>
                                       <select class="fancyselect" name="gender" required>

                                    <option value="male" >Male</option>
                                    <option value="female">Female </option>
                                </select>
                            </div>
                             </div>


                        <button type="submit"
                                class="btn btn-success">submit
                        </button>

                    </form>
                        </div>
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
