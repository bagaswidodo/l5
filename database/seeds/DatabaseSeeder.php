<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
// use CommentTableSeeder;
// use App\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(TimeEntriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->command->info('User and Time entry seeded');


        // $this->call(UserTableSeeder::class);
        // $this->call(CommentTableSeeder::class);

        // Comment::create([
        //     'author' => 'Chris Sevilleja',
        //     'text' => 'Look I am a test comment.'
        // ]);
    
        // Comment::create(array(
        //     'author' => 'Nick Cerminara',
        //     'text' => 'This is going to be super crazy.'
        // ));
    
        // Comment::create(array(
        //     'author' => 'Holly Lloyd',
        //     'text' => 'I am a master of Laravel and Angular.'
        // ));


        // $this->command->info('Comment table seeded.');

        Model::reguard();
    }


}
