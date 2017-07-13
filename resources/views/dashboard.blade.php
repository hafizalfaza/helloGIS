@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
					<a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <h3>Your Blog Posts</h3>
					@if(count($posts) > 0)
						<table class="table table-striped">
							<tr>
								<th>Title</th>
								<th></th>
								<th></th>
							</tr>
							@foreach($posts as $post)
								<tr>
									<th>{{$post->title}}</th>
									<th><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></th>
									<th></th>
								</tr>
							@endforeach
						</table>
					@else
						<p>You have no posts</p>
					@endif					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
