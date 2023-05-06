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
                    <a href="#">News</a>
                </li>
                <li class="active">Add</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">

            <div class="page-header widget-header">
                <h4 class="widget-title">
                    <i class="menu-icon fa fa-plus"></i> Add News
                </h4>
                <span class="widget-toolbar">
                    <!--------------- CREATE---------------->
                    <a href="{{ route('manage-news.index') }}" class="">
                        <i class="fa fa-list-alt"></i> View <span class="hide-in-sm">News</span>
                    </a>
                </span>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('manage-news.store') }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="left col-lg-11" style="margin-left: 20px">

                                <div class="form-group">
                                    <label for="category_id">News Main Category <span class="text-danger">*</span></label>   {{-- category --}}
                                    <select name="fk_category_id" id="cat_dropdown" class="form-control">
                                        <option value="">-Select a Category-</option>

                                        @foreach ($category_infos as $category_info)
                                            <option value="{{ $category_info->id }}">{{ $category_info->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('fk_category_id'))
                                        <span class="text-danger">Please insert a category for news</span>
                                    @endif
                                </div>

                                <div class="form-group">    {{-- sub category --}}
                                    <label for="subcategory_id">Sub Category <span class="text-danger">*</span></label>

                                    <select name="fk_sub_category_id" id="subcat_dropdown" class="form-control">
                                        <option value="">-Select a Category First-</option>
                                    </select>
                                    @if($errors->has('fk_sub_category_id'))
                                        <span class="text-danger">Please insert a sub category for news</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> News title <span class="text-danger">*</span></label>
                                    <div >
                                        <input name="title" type="text" id="form-field-1" placeholder="News title" class="form-control slug-input">
                                        @if($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> News link <span class="text-danger">*</span></label>
                                    <div >
                                        <input name="link" type="text" id="form-field-1" placeholder="News link " class="form-control slug-output">
                                        @if($errors->has('link'))
                                            <span class="text-danger">{{ $errors->first('link') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> News video link <span class="text-danger">(if exist)</span></label>
                                    <div >
                                        <input name="video_link" type="text" id="form-field-1" placeholder="Input a youtube link if exist" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Short Description <span class="text-danger">*</span></label>
                                    <div >
                                        <textarea name="short_description" cols="30" rows="8" placeholder="Short description..." class="form-control"></textarea>
                                        @if($errors->has('short_description'))
                                            <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">Description <span class="text-danger">*</span></label>
                                    <div >
                                        <textarea name="description" cols="30" rows="15" placeholder="Long description...." class="form-control"></textarea>
                                        @if($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="file-upload form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Choose New Image <span class="text-danger">*</span></label>
                                    <div class="file-upload-select">
                                        <div class="file-select-button" >Choose File</div>
                                    <div class="file-select-name">No file chosen...</div>
                                    <input type="file" name="photo" id="file-upload-input">
                                    </div>
                                    <small class="text-danger">* News Image size 470 x 360 (Max)</small>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">Special Quote/Speech <small class="text-danger">(if exist)</small></label>
                                    <div >
                                        <input name="quote" type="text" id="form-field-1" placeholder="Related Qoute/Speech" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label no-padding-right" for="form-field-1">Whose Quote/Speech?</label>
                                    <div >
                                        <input name="whose_quote" type="text" id="form-field-1" placeholder="Name of the Person" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Tags </label>
                                    <div >
                                        <input name="tags" type="text" id="form-field-1" placeholder="Related Tags" class="form-control">
                                    </div>
                                </div>

                                <div style="display: flex; justify-content: space-around; text-align: center; margin-top:50px">
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-1">Status </label>
                                        <div >
                                            <div class="toggle-btn active">
                                                <input type="checkbox" name="status"  checked class="cb-value" />
                                                <span class="round-btn"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-1">Public Status </label>
                                        <div >
                                            <div class="toggle-btn active">
                                                <input type="checkbox" name="publish_status"  checked class="cb-value" />
                                                <span class="round-btn"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-1"> Is Featured </label>
                                        <div >
                                            <div class="toggle-btn active">
                                                <input type="checkbox" name="is_featured"  checked class="cb-value" />
                                                <span class="round-btn"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-1"> Is Home </label>
                                        <div >
                                            <div class="toggle-btn active">
                                                <input type="checkbox" name="is_not_home"  checked class="cb-value" />
                                                <span class="round-btn"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-1"> Is Slider </label>
                                        <div >
                                            <div class="toggle-btn">
                                                <input type="checkbox" name="is_slider"  checked class="cb-value" />
                                                <span class="round-btn"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group text-right" style="margin-top: 40px; margin-right:6%">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div>
@endsection

@section('footer_scripts')
    <script>


    /*
    |--------------------------------------------------------------------------
    |   sub category dropdown ajax
    |--------------------------------------------------------------------------
    */
        $('#cat_dropdown').change(function(){
            var catx_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/get/subcat/data',
                data:{catx_id:catx_id},
                success:function(data){
                    $('#subcat_dropdown').html(data);
                }
            });

            chosenSelectInit();
        });

    </script>
@endsection
