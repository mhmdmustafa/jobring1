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

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>
                <a href="{{url('/admin/add-edit-section')}}" style="max-width: 150px; float:right;display: inline-block;" class="btn btn-block btn-success" >Add Section</a>
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
                                <table id="sections" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sections as $section)
                                    <tr>
                                        <td>{{$section->id}}</td>
                                        <td>{{$section->section_name}}</td>
                                        <td>{{$section->description}}</td>
                                        <td>@if ($section->status==1)
                                               <a  class="updateSectionStatus" id="section-{{$section->id}}" section_id="{{$section->id}}" href="javascript:void(0)" >Active</a>
                                            @else
                                                <a  class="updateSectionStatus" id="section-{{$section->id}}" section_id="{{$section->id}}" href="javascript:void(0)" >InActive</a>
                                            @endif
                                        </td>
                                        <td><a href="{{url('admin/add-edit-section/'.$section->id)}}" >Edit </a>
                                            &nbsp;
                                            <a href="javascript:void(0)" class="confirmDelete" record="section" recordid="{{$section->id}}" <?php /* href="{{url('admin/delete-category/'.$category->id)}}" */?> >Delete </a></td>

                                    </tr>
                                    @endforeach


                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
