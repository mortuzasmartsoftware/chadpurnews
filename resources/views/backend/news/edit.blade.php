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
                <li class="active">Edit</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">

            <div class="page-header widget-header">
                <h4 class="widget-title">
                    <i class="menu-icon fa fa-edit"></i> Edit News
                </h4>
                <span class="widget-toolbar">
                    <!--------------- CREATE---------------->
                    <a href="{{ route('manage-news.index') }}" class="">
                        <i class="fa fa-list"></i> View <span class="hide-in-sm">News</span>
                    </a>
                </span>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('manage-news.update',$news->id) }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="left col-lg-11" style="margin-left: 20px">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="fk_category_id" class="form-control">
                                        <option value="" >-Select Category-</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $news->fk_category_id ? 'selected' : "" }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="subcategory_id">Sub Category</label>
                                    <select name="fk_sub_category_id" class="form-control" id="subcat_dropdown">
                                        <option value="">-Select-</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $news->fk_sub_category_id ? 'selected' : "" }}>{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> News title </label>
                                    <div >
                                        <input value="{{ $news->title }}" name="title" type="text" id="form-field-1" placeholder="News title" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> News link </label>
                                    <div >
                                        <input value="{{ $news->link }}" name="link" type="text" id="form-field-1" placeholder="News link " class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> News video link </label>
                                    <div >
                                        <input value="{{ $news->video_link }}" name="video_link" type="text" id="form-field-1" placeholder="News video link " class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Short Description </label>
                                    <div >
                                        <textarea name="short_description" cols="30" rows="8" placeholder="Short description..." class="form-control">{{ $news->short_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">Description </label>
                                    <div >
                                        <textarea name="description" cols="30" rows="15" placeholder="Long description...." class="form-control">{{ $news->description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Previous Image </label>
                                    <div >
                                        <div class=" no-padding-right" style="padding-left: 0px !important;">
                                            @if ( strpos($news->photo,'assets') )
                                                <img src="{{ asset($news->photo) }}" alt="not found" width="80px">
                                            @else
                                                <img src="{{asset('img/news/'.$news->photo)}}" alt="not found" width="80px">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="file-upload form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Choose New Image </label>
                                    <div class="file-upload-select">
                                        <div class="file-select-button" >Choose File</div>
                                    <div class="file-select-name">No file chosen...</div>
                                    <input type="file" name="photo" id="file-upload-input">
                                    </div>
                                    <small class="text-danger">* News Image size 470 x 360 (Max)</small>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Special Quote/Speech <small class="text-danger">(if exist)</small> </label>
                                    <div >
                                        <input value="{{ $news->quote }}" name="quote" type="text" id="form-field-1" placeholder="quote" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">Whose Special Quote/Speech?</label>
                                    <div >
                                        <input value="{{ $news->whose_quote }}" name="whose_quote" type="text" id="form-field-1" placeholder="whose_quote" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> tags </label>
                                    <div >
                                        <input value="{{ $news->tags }}" name="tags" type="text" id="form-field-1" placeholder="tags" class="form-control">
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: space-around; text-align: center; margin-top:50px">
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-1">Status </label>
                                        <div >
                                            <div class="toggle-btn {{ $news->status == 1 ? 'active' : " " }}">
                                                <input type="checkbox" name="status" {{ $news->status == 1 ? 'checked' : " " }} class="cb-value" />
                                                <span class="round-btn"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-1">Public Status </label>
                                        <div >
                                            <div class="toggle-btn {{ $news->publish_status == 1 ? 'active' : " " }}">
                                                <input type="checkbox" name="publish_status"  {{ $news->publish_status == 1 ? 'checked' : " " }}  class="cb-value" />
                                                <span class="round-btn"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-1"> Is Featured </label>
                                        <div >
                                            <div class="toggle-btn {{ $news->is_featured == 1 ? 'active' : " " }}">
                                                <input type="checkbox" name="is_featured"  {{ $news->is_featured == 1 ? 'checked' : " " }}  class="cb-value" />
                                                <span class="round-btn"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-1"> Is Home </label>
                                        <div >
                                            <div class="toggle-btn {{ $news->is_not_home == 1 ? 'active' : " " }}">
                                                <input type="checkbox" name="is_not_home"  {{ $news->is_not_home == 1 ? 'checked' : " " }}  class="cb-value" />
                                                <span class="round-btn"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-1"> Is Slider </label>
                                        <div >
                                            <div class="toggle-btn {{ $news->is_slider == 1 ? 'active' : " " }}">
                                                <input type="checkbox" name="is_slider" {{ $news->is_slider == 1 ? 'checked' : " " }}  class="cb-value" />
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
@section('ajax_dropdown')
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
    });
@endsection
@section('footer_scripts')
    <script>

        // Slug Creator

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




        // Toogle switch

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
