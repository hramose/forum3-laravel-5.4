<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $threads = Thread::orderBy('created_at', 'desc')->paginate(10);

      return view('forum.index')->with(compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.threadCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $thread = new Thread;

      $thread->user_id = Auth::id();
      $thread->title = $request->threadTitle;
      $thread->body = $request->threadBody;

      $thread->save();

      $request->session()->flash('newThreadSuccessfullySaved', 'Your new thread titled ' . $thread->title . ' has been successfully saved. Enjoy the Forum! :)');

      return redirect()->route('forumHomee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(thread $thread)
    {
      $replies = Reply::where('thread_id', $thread->id)->get();

      return view('forum.singleThread')->with(compact('thread'))->with(compact('replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(thread $thread)
    {
        //
    }
}
