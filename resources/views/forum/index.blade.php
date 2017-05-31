@extends('layouts.app')

@section('content')
<div class="container" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach ($threads as $thread)
              <div class="panel panel-success">
                <div class="panel-heading"><a href="{{ url('/thread/' . $thread->id) }}">{{ $thread->title }}</a> by {{ $thread->user->name }}</div>

                <div class="panel-body">
                  {{ $thread->body }}
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
