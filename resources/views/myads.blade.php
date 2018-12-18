@extends('layouts.app')

@section('title','Meus anúncios')

@section('content')

    <div>
        <div>

        	@if(count($ads) > 0)

	            @foreach($ads as $ad)
		        	<div class="card">

					<!-- IMAGENS -->
	            <a href="/anuncios/{{ $ad->id }}">
							@if(count($ad->images) > 0)
											@foreach($ad->images as $image)
													<div class="slide"><img src="{{ $image }}"></div>
											@endforeach

						@else
							<div class="slide"><img src="{{ asset('storage/images/ads/none.png') }}"></div>
						@endif

					<!-- INFO -->
					<div class="adcard-info">
							<h4 class="text-center">{{ $ad->title }}</h4>
							<h5 class="text-center">{{ $ad->description }}</h5>
					</div>
							    </a>

					<!-- ACTIONS -->
					<div class="adcard-actions">
							<button class="btn btn-lg btn-primary fa fa-edit"/>
							<form method="POST" action="{{ route('myads.destroy', $ad->id) }}">{{ csrf_field() }}
								<button type="submit" class="btn btn-lg btn-danger fa fa-trash"/>
							</form>
					</div>

		            </div>

	            @endforeach

	      @else

	      	<div class="shadow bg-white p-5">
	      		<h5 class="text-center font-italic p-5">Sem anúncios</h5>
	      	</div>

	      @endif

        </div>
    </div>
@endsection

<link rel="stylesheet" href="{{ asset('css/myads.css') }}"/>
