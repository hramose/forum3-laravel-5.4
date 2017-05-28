@extends('layouts.app')

@section('content')
<div class="container" style="padding-bottom: 100px;">
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

          @if (!Auth::check())
            <div>To post a reply, please <a href="{{ route('login') }}">login</a>.</div>
          @else
            <form action="">
              <div class="form-group">
                <textarea name="reply" id="" cols="30" rows="7" class="form-control" placeholder="Enter your reply here"></textarea>
              </div>

              <input type="submit" class="btn btn-primary" value="Submit Reply">
            </form>
          @endif
        </div>
    </div>
</div>
@endsection
