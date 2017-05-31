@if (session('newThreadSuccessfullySaved'))
  <div class="alert alert-success">
    <p>Your new thread '{{ session('newThreadSuccessfullySaved') }}' has been successfully created and is now visible.</p>
  </div>
@endif

@if (session('newReplySuccessfullySaved'))
  <div class="alert alert-success">
    <p>You reply has been successfully saved and is now visible.</p>
  </div>
@endif