@extends('layouts.admin_layout.admin_layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sections</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Sections</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->

        <section  class="content" >
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(\Illuminate\Support\Facades\Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{\Illuminate\Support\Facades\Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    <form name="sectionForm" id="sectionForm" @if(empty( $sectionData['id']))
                 action="{{url('admin/add-edit-section')}}"
                @else
                action="{{url('admin/add-edit-section/'.$sectionData['id'])}}" @endif method="post" enctype="multipart/form-data" >
                    @csrf

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="section_name">Section Name</label>
                                    <input name="section_name"  type="text" class="form-control" id="section_name" placeholder="Enter section"
                                     @if(!empty($sectionData['section_name'])) value="{{$sectionData['section_name']}}"  @else value="{{old('section_name')}}" @endif>
                                </div>

                                <!-- /.form-group -->

                                <!-- /.form-group -->
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-12 col-sm-6">

                                <div class="form-group">
                                    <label for="description">Section Description</label>
                                    <label for="description"></label>
                                  <input type="text" class="form-control" id="description" name="description" placeholder="Enter section Description"
                                         @if(!empty($sectionData['description'])) value="{{$sectionData['description']}}" @else value="{{old('description')}}" @endif>
                                </div>

                            <!-- /.col -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    <!-- /.card-body -->
                    </div>
                       </div>
        </section>
        <!-- /.content -->

@endsection
