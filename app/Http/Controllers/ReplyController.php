<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $reply = new Reply;

      $replyBody = $request->replyBody;
      $replyThread_id = $request->threadID;
      $replyUserId = Auth::id();

      $reply->user_id = $replyUserId;
      $reply->thread_id = $replyThread_id;
      $reply->body = $replyBody;

      $reply->save();

      $request->session()->flash('newReplySuccessfullySaved', 'Your reply has been successfully stored and is now visible on the website.');

      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

//  make selected reply the solution
    public function makeReplySolution(Request $request, $threadID, $replyID) {
//      return $replyID . ' ' . $threadID;
//      return $replyID;
      $thread = Thread::find($threadID);
      $thread->solution_reply_id = $replyID;
      $thread->save();

      $reply = Reply::find($replyID);

      $request->session()->flash('replySolutionsUpdated', 'Reply #' . $replyID . ' by ' . $reply->user->name . ' has been successfully chosen as the solution.');

      return redirect()->route('thread.show', ['thread' => $threadID]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        //
    }
}
