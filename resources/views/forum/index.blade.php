@extends('layouts.app')

@section('content')
  <div class="container container-bottom-margin">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        @include('layouts.successMessage')

        <div class="row row-bottom-margin">
          <div class="col-md-12">
            @if (!Auth::check())
              <div>If you would like to join in the discussion, please <a
                  href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a>.</div>
            @else
              <a href="{{ route('thread.create') }}" class="btn btn-primary">Create a New Thread</a>
            @endif
          </div>
        </div>

        @foreach ($threads as $thread)
          <div class="panel panel-default">
            <div class="panel-heading"><a href="{{ url('thread/'. $thread->id) }}">{{ $thread->title }}</a> by {{ $thread->user->name }} {{ $thread->created_at->diffForHumans() }}</div>
            <div class="panel-body">
              {{ $thread->body }}
            </div>
          </div>
        @endforeach

        <div class="text-center">
          {{ $threads->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
