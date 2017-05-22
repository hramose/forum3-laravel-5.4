@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-primary">
            <div class="panel-heading">{{ $thread->title }} by {{ $thread->user->name }}</div>

            <div class="panel-body">
              {{ $thread->body }}
            </div>
          </div>

          @foreach ($replies as $reply)
            <div class="panel panel-default">
              <div class="panel-heading">Reply by {{ $reply->user->name }}</div>

              <div class="panel-body">
                {{ $reply->body }}
              </div>
            </div>
          @endforeach
        </div>
    </div>
</div>
@endsection
