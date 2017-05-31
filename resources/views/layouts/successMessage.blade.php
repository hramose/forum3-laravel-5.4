@if (session('newThreadSuccessfullySaved'))
  <div class="alert alert-success">
    <p>{{ session('newThreadSuccessfullySaved') }}</p>
  </div>
@endif

@if (session('newReplySuccessfullySaved'))
  <div class="alert alert-success">
    <p>{{ session('newReplySuccessfullySaved') }}</p>
  </div>
@endif

@if (session('replySolutionsUpdated'))
  <div class="alert alert-success">
    <p>{{ session('replySolutionsUpdated') }}</p>
  </div>
@endif