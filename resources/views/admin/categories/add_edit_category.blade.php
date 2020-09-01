@extends('layouts.admin_layout.admin_layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Catalogues</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Categories</li>
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
                <form name="categoryForm" id="categoryForm" @if(empty( $categoryData['id']))
                 action="{{url('admin/add-edit-category')}}"
                @else
                action="{{url('admin/add-edit-category/'.$categoryData['id'])}}" @endif method="post" enctype="multipart/form-data" >
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
                                    <label for="category_name">Category Name</label>
                                    <input name="category_name"  type="text" class="form-control" id="category_name" placeholder="Enter Category"
                                     @if(!empty($categoryData['category_name'])) value="{{$categoryData['category_name']}}"  @else value="{{old('category_name')}}" @endif>
                                </div>
                                <div class="form-group">
                                    <label>Select Section</label>
                                    <select name="section_id" id="section_id" class="form-control select2" style="width: 100%;">
                                        <option value="">Select</option>
                                        @foreach($getSections as $section)
                                            <option  value="{{$section->id}}" @if(!empty($categoryData['section_id'])&& $categoryData['section_id']==$section->id) selected @endif >{{$section->section_name}}</option>
                                        @endforeach

                                    </select>
                                </div>


                                <!-- /.form-group -->
                                <div id="appendCategoriesLevel">
                                    @include('admin.categories.append_categories_level')
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">


                            </div>

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->


                        <div class="row">
                            <div class="col-12 col-sm-6">

                                <div class="form-group">
                                    <label for="category_name">Category Description</label>
                                    <textarea  rows="3" type="text" class="form-control" id="description" name="description" placeholder="Enter Category Description"
                                               @if(!empty($categoryData['description'])) value="{{$categoryData['description']}}"  @else value="{{old('description')}}" @endif></textarea>
                                </div>

                            <!-- /.col -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    <!-- /.card-body -->
                    </div>
                </div>


                <!-- /.row -->

                </form>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
