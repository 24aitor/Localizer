@extends('localizer::template')
@section('title', 'Localizer')
@section('content')
<center>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<h1>Localizer</h1>
			<br>
			<h2>Select your language</h2>
		</div>
		<br><br>
		<br><br>
		<br><br>
		<br><br>
		<div class="container">

			<div class="row">
			@foreach(Laralang::allLanguages() as $key => $value)
				@php
					$flag = $value;
					$array = ['en' => 'gb','zh' => 'cn', 'ja' => 'jp', 'ca' => 'img'];
					if (array_key_exists($value, $array)) {
						$flag = $array[$value];
					}
				 @endphp
				 <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2 col-xl" style="padding-bottom:70px">
					 <a href="{{ route('localizer::setLocale',['locale' => $value ]) }}" class="but">
						 @if($flag == 'img')
						 <img src="{{asset('vendor/aitor24/Localizer/Flags/'.$value.'.jpg')}}" style="height:15px;">
						 @else
						 <span class="{{'flag-icon flag-icon-'.$flag}}" ></span>
						 @endif


					 &nbsp;
					{{$key}}
				</a>
			</div>
			@endforeach
			</div>

		</div>
	</div>
</div>
</center>
@endsection
@section('footer')
<a href="https://github.com/24aitor/Localizer" style="color:black">Localizer on GitHub</a>
@endsection
