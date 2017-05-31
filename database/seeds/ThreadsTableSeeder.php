<?php

use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $threads = factory(App\Thread::class, 10)->create();

//      $users = App\User::class->get()->all();

      $threads->each(function ($thread) {
        factory(App\Reply::class, 10)->create(['thread_id' => $thread->id]);
      });
    }
}
