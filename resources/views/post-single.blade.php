@extends('layouts/app')

@section('script')

<script type="text/javascript">
	var post_id={{$id}};
	$(function(){
		$.getJSON('/api/posts/'+post_id,function(data){
			console.log(data);
			$('#title').html(data.title);
			$('#body').html(data.note);
			$('#title').append('<hr>'+data.created_at);
		})
	});

</script>

@endsection('script')

@section('content')
<!-- 自動map到yield -->

<h1>All My Post</h1>

<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
        	<div class="panel-heading" id="title">Title</div>

        	<div class="panel-body" id="body"></div>
		</div>
	</div>
</div>

@endsection