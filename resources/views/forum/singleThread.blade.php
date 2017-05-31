@extends('layouts.app')

@section('content')
  <div class="container" style="padding-bottom: 100px;">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        @include('layouts.successMessage')

        <div class="panel panel-primary">
          <div class="panel-heading"><strong>Main Post:</strong> {{ $thread->title }} by {{ $thread->user->name }} {{ $thread->created_at->diffForHumans() }}</div>
          <div class="panel-body">
            {{ $thread->body }}
          </div>
        </div>

        @foreach ($replies as $reply)
          <div class="panel panel-default">

            <div class="panel-heading">Reply post by <strong>{{ $reply->user->name }}</strong> {{ $reply->created_at->diffForHumans() }}

              {{--display the 'Make this the solution' button if the user is logged in and the logged in user matches the user id of the thread creator.--}}
              @if (Auth::check() && (Auth::id() == $thread->user_id))
                <div class="pull-right">
                  <form action="{{ action('ReplyController@makeReplySolution', ['threadID' => $thread->id, 'replyID' => $reply->id]) }}" method="post">
                    {{ csrf_field() }}
{{--<p>thread id is {{ $thread->id }}</p>--}}
                    <input type="hidden" name="_method" value="PUT">

                    <input type="submit" value="Make this the solution" class="btn btn-link">
                  </form>
                </div>
              @endif
            </div>

            <div class="panel-body">
              {{ $reply->body }}
            </div>
          </div>
        @endforeach

        @if (!Auth::check())
          <div>To post a reply, please <a href="{{ route('login') }}">login</a>.</div>
        @else
          <form action="{{ route('reply.store') }}" method="POST">
            {{ csrf_field() }}

            {{--pass on the thread ID--}}
            <input type="hidden" name="threadID" value="{{ $thread->id }}">

            <div class="form-group">
              <textarea name="replyBody" id="" cols="30" rows="8" class="form-control" placeholder="Enter your reply here"></textarea>
            </div>

            <input type="submit" class="btn btn-primary" value="Submit Reply">
          </form>
        @endif

        <div class="text-center">
          {{ $replies->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
