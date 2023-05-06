@extends('frontend.app')
@section('content')
<section class="block-wrapper">
	<div class="container">
		<div class="row">
			<div class="media-iframe">
				<iframe src="<?php echo $data->media_link ?>" width="100%" >
					
				</iframe>
			</div>	
		</div>
	</div><!-- Container end -->
</section><!-- First block end -->
@endsection('content')