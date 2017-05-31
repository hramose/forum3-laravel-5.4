@extends('layouts.app')

@section('content')
  <div class="container" style="padding-bottom: 100px;">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>Create a New Thread</h1>

        <form action="{{ route('thread.store') }}" method="POST">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="threadTitle">Thread Title:</label>
            <input type="text" name="threadTitle" class="form-control" placeholder="Type your Thread Title Here">
          </div>
          
          <div class="form-group">
            <label for="threadBody">Thread Body:</label>
            <textarea name="threadBody" id="" cols="30" rows="10" class="form-control" placeholder="Type your thread body here"></textarea>
          </div>

          <input type="submit" value="Submit New Thread" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
@endsection
