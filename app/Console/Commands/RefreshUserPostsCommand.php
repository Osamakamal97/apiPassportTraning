<?php

namespace App\Console\Commands;

use App\Mail\MonthlyUserEmail;
use App\Post;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class RefreshUserPostsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh post for all users';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Post::refreshUsersPosts();
        $this->info('post has been refreshed successfully');
    }
}
