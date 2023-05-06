@extends('layouts.app')

@section('main_content')
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Tables</a>
                </li>
                <li class="active">Simple &amp; Dynamic</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>

        <div class="page-content">
            

            <div class="page-header">
                <h1>
                    Tables
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Static &amp; Dynamic Tables
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table">
                                <thead class="thead-dark">
                                  <tr>
                                    <th>#</th>
                                        <th>name</th>
                                        <th>title</th>
                                        <th>description</th>
                                        <th>file</th>
                                        <th>link</th>
                                        <th>status</th>
                                        <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($all_adds as $all_adds)
                                        <tr>
                                                <th>{{ $loop->index+1 }}</th>
                                                file
                                                <td>{{ $all_adds->name }}</td>
                                                <td>{{ $all_adds->title }}</td>
                                                <td>{{ $all_adds->description }}</td>
                                                <td>
                                                    @if ( strpos($all_adds->photo,'assets') )
                                                        <a href="{{ asset($all_adds->file) }}" target="_blank" class="btn btn-sm btn-info">View File</a>
                                                    @else
                                                        <a href="{{ asset('assets/backend/page/'.$all_adds->file) }}" target="_blank" class="btn btn-sm btn-info">View File</a>
                                                    @endif

                                                    {{-- <embed src="{{ asset($all_adds->file) }}" width="475px" height="600px" /> --}}
                                                </td>
                                                <td>{{ $all_adds->link }}</td>
                                            <td>
                                                <div class="div" style="margin-top:-2px">
                                                    @if ($all_adds->status == 1)
                                                        <a href="{{ route('page_status',$all_adds->id) }}"><i class="fa fa-toggle-on" style="font-size: 24px"></i></a>
                                                    @else
                                                        <a href="{{ route('page_status',$all_adds->id) }}"><i class="fa fa-toggle-off" style="font-size: 24px"></i></a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td style="display: flex; ">
                                                <a href="{{ route('pages-problem.edit',$all_adds->id) }}" style="margin-bottom: 5px"><i class="fa fa-pencil-square-o" aria-hidden="true" style="margin-top: 0px; margin-right: 5px; font-size:22px;"></i></a>
                                                <form action="{{ route('pages-problem.destroy',$all_adds->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background: none; border:none;"><i class="fa fa-trash-o" aria-hidden="true"  style=" font-size:22px;margin-top: -2px;
                                                        color: red; cursor:pointer"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="50">
                                                <div class="alert alert-danger text-center">
                                                    No News to Show
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                              </table>
                        </div>
                    </div>

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div>
@endsection
