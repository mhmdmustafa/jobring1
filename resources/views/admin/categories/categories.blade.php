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
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

                            <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Categories</h3>
                                <a href="{{url('/admin/add-edit-category')}}" style="max-width: 150px; float:right;display: inline-block;" class="btn btn-block btn-success" >Add Category</a>
                            </div>
                                @if(\Illuminate\Support\Facades\Session::has('success_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{\Illuminate\Support\Facades\Session::get('success_message')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                            @endif
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="categories" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Parent Category</th>
                                        <th>Section</th>
                                        <th>Url</th>
                                        <th>Status</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                    @if(!isset($category->parentCategory->category_name))
                                    <?php $parent_Category='Root'; ?>
                                    @else
                                   <?php $parent_Category= $category->parentCategory->category_name; ?>
                                   @endif
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->category_name}}</td>
                                        <td>{{$parent_Category}}</td>
                                        <td>{{$category->section->name}}</td>
                                        <td>{{$category->url}}</td>

                                        <td>@if ($category->status==1)
                                               <a  class="updateCategoryStatus" id="category-{{$category->id}}" category_id="{{$category->id}}" href="javascript:void(0)" >Active</a>
                                            @else
                                                <a  class="updateCategoryStatus" id="category-{{$category->id}}" category_id="{{$category->id}}" href="javascript:void(0)" >InActive</a>
                                            @endif
                                        </td>
                                        <td><a href="{{url('admin/add-edit-category/'.$category->id)}}" >Edit </a>
                                        &nbsp;
                                        <a href="javascript:void(0)" class="confirmDelete" record="category" recordid="{{$category->id}}" <?php /* href="{{url('admin/delete-category/'.$category->id)}}" */?> >Delete </a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

@endsection
