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
                    <b>Adding News</b>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Common form elements and layouts
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('manage-news.store') }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="left col-lg-11" style="margin-left: 20px">

                                <div class="form-group">
                                    <label for="category_id">Category</label>   {{-- category --}}
                                    <select name="fk_category_id" id="cat_dropdown" class="chosen-select"  style="width:100%">
                                        <option value="">-Select a Category-</option>

                                        @foreach ($category_infos as $category_info)
                                            <option value="{{ $category_info->id }}">{{ $category_info->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">    {{-- sub category --}}
                                    <label for="subcategory_id">Sub Category</label>

                                    <select name="fk_sub_category_id" id="subcat_dropdown" class="chosen-select"  style="width:100%">
                                        <option value="">-Select a Category First-</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> News title </label>
                                    <div >
                                        <input name="title" type="text" id="form-field-1" placeholder="News title" class="form-control slug-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> News link </label>
                                    <div >
                                        <input name="link" type="text" id="form-field-1" placeholder="News link " class="form-control slug-output">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Short Description </label>
                                    <div >
                                        <textarea name="short_description" cols="30" rows="8" placeholder="Short description..." class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">Description </label>
                                    <div >
                                        <textarea name="description" cols="30" rows="15" placeholder="Long description...." class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Tags </label>
                                    <div >
                                        <input name="tags" type="text" id="form-field-1" placeholder="Related Tags" class="form-control">
                                    </div>
                                </div>
                                <div class="file-upload form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Choose New Image </label>
                                    <div class="file-upload-select">
                                        <div class="file-select-button" >Choose File</div>
                                    <div class="file-select-name">No file chosen...</div>
                                    <input type="file" name="photo" id="file-upload-input">
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
                                            <div class="toggle-btn active">
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







    /*
    |--------------------------------------------------------------------------
    |   Slug Creator Js
    |--------------------------------------------------------------------------
    */
        var slug = function(str) {
            var $slug = '';
            var trimmed = $.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        }

        $('.slug-input').keyup(function() {
            var takedata = $('.slug-input').val();
            $('.slug-output').val(slug(takedata));
        });







    /*
    |--------------------------------------------------------------------------
    |   Toogle switch Js
    |--------------------------------------------------------------------------
    */
        $('.cb-value').click(function() {
            var mainParent = $(this).parent('.toggle-btn');

            if($(mainParent).find('input.cb-value').is(':checked')) {
                $(mainParent).addClass('active');
            } else {
                $(mainParent).removeClass('active');
            }
        });



    </script>
@endsection
