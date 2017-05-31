@extends('layouts.app')

@section('content')
  <div class="container container-bottom-margin">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h2>Create New Thread</h2>

        <form action="{{ route('thread.store') }}" method="POST">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="threadTitle">Threat Title:</label>
            <input type="text" placeholder="Thread Title" name="threadTitle" class="form-control">
          </div>

          <div class="form-group">
            <label for="threadBody"></label>
            <textarea name="threadBody" id="" cols="30" rows="10" class="form-control" placeholder="Type your message here"></textarea>
          </div>

          <input type="submit" value="Submit New Thread" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
@endsection
