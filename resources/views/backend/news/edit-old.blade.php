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
                    <a href="#">Blog</a>
                </li>
                <li class="active">Add</li>
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
                    <b>Adding Blog</b>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Common form elements and layouts
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('manage-news.update',$target_ads->id) }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="left col-lg-5" style="margin-left: 20px">
                                <div class="form-group">
                                    <select name="fk_category_id" class="form-control">
                                        <option value="" >-Select Category-</option>
                                        @foreach ($category_infos as $category)
                                            <option value="{{ $category->id }}" {{ ( $category->id )== $target_ads->relationtocategory->id ? 'selected' : "" }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="subcategory_id">Sub Category</label>
                                    <select name="fk_sub_category_id" class="form-control" id="subcat_dropdown">
                                        @foreach ($subcategory_infos as $subcategory)
                                            <option value="{{ $subcategory->id }}" {{ ( $subcategory->id )== $target_ads->relationtoSubCategory->id ? 'selected' : "" }}>{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="subcategory_id">Sub Category</label>
                                    <select name="fk_sub_category_id" class="form-control" id="subcat_dropdown">
                                        <option value="">--Select one--</option>
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> News title </label>
                                    <div >
                                        <input value="{{ $target_ads->title }}" name="title" type="text" id="form-field-1" placeholder="News title" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> News link </label>
                                    <div >
                                        <input value="{{ $target_ads->link }}" name="link" type="text" id="form-field-1" placeholder="News link " class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Short Description </label>
                                    <div >
                                        <textarea name="short_description" class="form-control" placeholder="short description">{{ $target_ads->short_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">Description </label>
                                    <div >
                                        <textarea name="description" class="form-control" placeholder="long description">{{ $target_ads->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Previous Image </label>
                                    <div >
                                        <div class=" no-padding-right" style="padding-left: 0px !important;">
                                            @if ( strpos($target_ads->photo,'assets') )
                                                <img src="{{ asset($target_ads->photo) }}" alt="not found" width="80px">
                                            @else
                                                <img src="{{asset('assets/backend/news/'.$target_ads->photo)}}" alt="not found" width="80px">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Choose News Image </label>
                                    <div >
                                        <div class="control-label no-padding-right" style="padding-left: 0px !important;">
                                            <label class="ace-file-input ace-file-multiple"><input  name="photo" type="file" id="id-input-file-3"><span class="ace-file-container" data-title="Drop files here or click to choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon ace-icon fa fa-cloud-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
                                        </div>
                                        <small class="text-danger">* Photo size must be 110 x 50</small>
                                    </div>
                                </div>
                            </div>
                            <div class="right col-lg-5" style="margin-left: 20px">
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">Status </label>
                                    <div >
                                        <input value="{{ $target_ads->status }}" name="status" type="number" id="form-field-1" placeholder="Ex: 1 or 0" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">Public Status </label>
                                    <div >
                                        <input value="{{ $target_ads->publish_status }}" name="publish_status" type="number" id="form-field-1" placeholder="Ex: 1 or 0" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> hit_counter </label>
                                    <div >
                                        <input value="{{ $target_ads->hit_counter }}" name="hit_counter" type="number" id="form-field-1" placeholder="hit_counter" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> is_featured </label>
                                    <div >
                                        <input value="{{ $target_ads->is_featured }}" name="is_featured" type="number" id="form-field-1" placeholder="is_featured" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> is_not_home </label>
                                    <div >
                                        <input value="{{ $target_ads->is_not_home }}" name="is_not_home" type="number" id="form-field-1" placeholder="is_not_home" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> is_slider </label>
                                    <div >
                                        <input value="{{ $target_ads->is_slider }}" name="is_slider" type="number" id="form-field-1" placeholder="is_slider" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> tags </label>
                                    <div >
                                        <input value="{{ $target_ads->tags }}" name="tags" type="number" id="form-field-1" placeholder="tags" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> created_by </label>
                                    <div >
                                        <input value="{{ $target_ads->created_by }}" name="created_by" type="number" id="form-field-1" placeholder="created_by" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> updated_by </label>
                                    <div >
                                        <input value="{{ $target_ads->updated_by }}" name="updated_by" type="number" id="form-field-1" placeholder="updated_by" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-left" style="margin-top: 40px;">
                            <button type="submit" class="btn btn-primary" style="margin-left: 15px;">Submit</button>
                        </div>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div>
@endsection
{{-- @section('ajax_dropdown')
$('#cat_dropdown').change(function(){
    var catx_id = $(this).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:'POST',
        url:'/get/subcat/data/edit',
        data:{catx_id:catx_id},
        success:function(data){
            $('#subcat_dropdown').html(data);
        }
    });
});
@endsection --}}
