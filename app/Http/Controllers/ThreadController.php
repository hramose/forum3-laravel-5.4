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
        return view('forum.createThread');
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

        $threadTitle = $request->threadTitle;
        $threadBody = $request->threadBody;
        $threadUserID = Auth::id();

        $thread->user_id = $threadUserID;
        $thread->title = $threadTitle;
        $thread->body = $threadBody;

        $thread->save();

        $request->session()->flash('newThreadSuccessfullySaved', $threadTitle);

        return redirect()->route('forumHome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
//      $replies = $thread->replies->orderBy('created_at', 'desc')->paginate(10);

      $replies = Reply::where('thread_id', $thread->id)->orderBy('created_at', 'desc')->paginate(10);

      return view('forum.singleThread')->with(compact('thread'))->with(compact('replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
