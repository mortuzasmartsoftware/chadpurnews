	@extends('frontend.app')

@section('content')

<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<ol class="breadcrumb">
     					<li><a href="{{URL::to('/')}}">Home</a></li>
     					<li>All Media</li>
     				</ol>
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Page title end -->
<section class="block-wrapper">
		<div class="container">
				@foreach($mediaWithCategories as $category)
                    <div class="row text-center" >

                        <div class="col-lg-12" class="title" style="background-color:#dcdcdc;">
                            <h4>{{$category->category_name}}</h4>
                        </div>
                        @foreach($category->all_medias as $media)
                            <div class="col-sm-2 min-padding">
                                <label class="slide_upload medial-list-item" for="file">
                                <a href='{{URL::to("media?url=$media->media_link")}}' >

                                    @if ( strpos($media->photo,'assets') )
                                        <img src="{{asset($media->photo)}}" id="image_load" class="text-center" width="110" height="50">
                                    @else
                                        <img src="{{asset('img/allMedia/'.$media->photo)}}" id="image_load" class="text-center" width="110" height="50">
                                    @endif

                                    <div class="media_name">
                                        {{$media->media_name}}
                                    </div>
                                </a>
                                    <a href='{{URL::to("media?url=$media->media_link")}}'><span style="font-size: 11px;color: black;">{{$media->media_link}}</span></a>
                                </label>
                            </div>
                        @endforeach
                        {{-- @foreach($category->all_medias as $media)
                            <div class="col-sm-2 min-padding">
                                <label class="slide_upload medial-list-item" for="file">
                                <a href='{{URL::to("media?url=$media->media_link")}}' >

                                    <img src="{{asset($media->photo)}}" id="image_load" class="text-center" width="110" height="50">

                                    <div class="media_name">
                                        {{$media->media_name}}
                                    </div>
                                </a>
                                    <a href='{{URL::to("media?url=$media->media_link")}}'><span style="font-size: 11px;color: black;">{{$media->media_link}}</span></a>
                                </label>
                            </div>
                        @endforeach --}}
                        {{-- @foreach($allMedia[$cat->id] as $media)
                        <div class="col-sm-2 min-padding">
                            <label class="slide_upload medial-list-item" for="file">
                            <a href='{{URL::to("media?url=$media->media_link")}}' >
                                <img src="{{asset($media->photo)}}" id="image_load" class="text-center" width="110" height="50">
                                <div class="media_name">{{$media->media_name}}
                                </div>
                            </a>
                                <a href='{{URL::to("media?url=$media->media_link")}}'><span style="font-size: 11px;color: black;">{{$media->media_link}}</span></a>
                            </label>
                        </div>

                        @endforeach --}}

                    </div>
				@endforeach

		</div><!-- Container end -->
	</section><!-- First block end -->
	<style type="text/css">

	</style>
@endsection('content')
