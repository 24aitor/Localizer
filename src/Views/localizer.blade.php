@extends('localizer::template')
@section('title', 'Localizer')
@section('content')
<center>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<h1>Localizer</h1>
		</div>
		<br><br>
		<br><br>
		<div class="container">

			<div class="row">
			@foreach(Laralang::allLanguages() as $key => $value)
				<?php
					$flag = $value;
					$array = ['en' => 'gb','zh' => 'cn', 'ja' => 'jp', 'ca' => 'img'];
					if (array_key_exists($value, $array)) {
						$flag = $array[$value];
					}
				 ?>
				 <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2 col-xl" style="padding-bottom:10px">
				 <button type="button" class="btn btn-secondary">
				 @if($flag == 'img')
				 <img src="{{asset('vendor/aitor24/Localizer/Flags/'.$value.'.jpg')}}" style="height:16px;">
				 @else
				 <span class="{{'flag-icon flag-icon-'.$flag}}" ></span>
				 @endif
				 &nbsp;
				{{$key}}
				</button>
			</div>
			@endforeach
			</div>

		</div>
	</div>
</div>
<br><br>
<a href="https://github.com/24aitor/Localizer">Localizer on github</a>
<br><br>
</center>



@endsection
