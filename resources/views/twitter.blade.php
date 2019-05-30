<!DOCTYPE html>
<html>
<head>
	<title>My Tweetz</title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
		<a class="navbar-brand" href="#">My Tweetz</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarColor01">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="#">Tweetz</span></a>
		      </li>
		    </ul>
		  </div>
		</div>
	</nav>

<div class="container">
	<form class="form-group" action="{{ route('post.tweet') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		@if(count($errors) > 0)
			@foreach($errors->all() as $error)
				<div class="alert alert-danger">
					{{ $error }}
				</div>
			@endforeach
		@endif
		<div class="form-group">
			<label>Tweet Text</label>
			<input type="text" name="tweet" class="form-control">
		</div>
		<div class="form-group">
			<label>Upload Images</label>
			<input type="file" name="images[]" multiple class="form-control">
		</div>
		<div class="form-group">
			<button class="btn btn-success">Create Tweet</button>
		</div>
	</form>
	@if(!empty($data))
		@foreach($data as $key => $tweet)
			<div class="card mt-3 mb-3 p-3">
				<h3>{{ $tweet['text'] }}
					<i class="glyphicon glyphicon-heart"></i> {{ $tweet['favorite_count']}}
					<i class="glyphicon glyphicon-repeat"></i> {{ $tweet['retweet_count']}}
				</h3>
				@if(!empty($tweet['extended_entities']['media']))
					@foreach($tweet['extended_entities']['media'] as $i)
						<img src="{{ $i['media_url_https'] }}" style="width: 100px;">
					@endforeach
				@endif
			</div>
		@endforeach
	@else
		<p>No tweetz found</p>
	@endif
</div>

</body>
</html>