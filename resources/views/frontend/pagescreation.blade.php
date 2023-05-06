@extends('frontend.app')

@section('content')

<div class="container" >
	<div class="col-sm-3" >
		<h5 >Infomation</h5>
	<ul  class="page-sidebar">
	@foreach($pages as $page)
		<li>
			<a href="{{url('page/'.$page->link)}}" class="{{($page->link==$single->link)?'active':''}}"> <i class="fa fa-angle-double-right"></i> {{$page->name}}</a>
		</li>

	@endforeach
	</ul>
	</div>

				<div class="col-sm-8" >
				<div class="details text-center" >
						<h2 >{{$single->title}}</h2>
						<br>
						<div class="text-center">
							@foreach($pagePics as $pagePic)
                            
                                @if ( strpos($pagePic->photo,'assets') )
                                    <img width="300" height="200"  src="{{asset($pagePic->photo)}}" alt="">
                                @else
                                    <img width="300" height="200"  src="{{asset('img/page/'.$pagePic->photo)}}" alt="">
                                @endif

							@endforeach
						</div>
						<div class="text-center">
						<?php echo $single->description; ?>
						</div>

	</div>
</div>
</div>
@stop
