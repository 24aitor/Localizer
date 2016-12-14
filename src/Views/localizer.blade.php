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
			<br>
		</div>

		<br><br>
		<div class="hidden-md-down">
			<br><br>
			<br><br>
			<br><br>
		</div>

		<div class="container">

			<div class="row">

			@foreach(Aitor24\Localizer\Facades\LocalizerFacade::allowedLanguages() as $code => $value)

				 <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2 col-xl" style="padding-bottom:70px">
					 <a href="{{ Aitor24\Localizer\Facades\LocalizerFacade::setRoute($code) }}" class="but">

						 {!! Aitor24\Localizer\Facades\LocalizerFacade::getHtmlFlag($code, '15px') !!}

						 &nbsp; {{$value}}
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
<div class="container">
<div class="row">
	<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-xs-10 offset-xs-1" style="border-radius:50px; -webkit-box-shadow: 0px 0px 16px 0px rgba(0,0,0,0.75); -moz-box-shadow: 0px 0px 16px 0px rgba(0,0,0,0.75); box-shadow: 0px 0px 16px 0px rgba(0,0,0,0.75);">
		<strong>Selected:</strong> &nbsp;
		{!! Aitor24\Localizer\Facades\LocalizerFacade::getCurrentHtmlFlag('es', '15px') !!}
		{!! Aitor24\Localizer\Facades\LocalizerFacade::getCurrentLanguage() !!}
	</div>
</div>
</div>
<br><br>
<a href="https://github.com/24aitor/Localizer" style="color:black">Localizer on GitHub</a>
@endsection
