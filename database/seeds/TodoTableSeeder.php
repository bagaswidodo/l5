<?php

use App\Todo;
use Illuminate\Database\Seeder;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->delete();

        $todos_entries = array(
        	['body' => 'Learn Angular', 'completed' => 1],
        	['body' => 'Build Angular App', 'completed' => 0],
        	['body' => 'Buy Food', 'completed' => 0],

        );

        foreach($todos_entries as $entry)
        {
            Todo::create($entry); 
        }   
    }
}
