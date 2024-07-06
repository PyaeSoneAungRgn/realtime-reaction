<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\User;
use Illuminate\Console\Command;

class Playground extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'playground';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Playground';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user1 = User::query()->find(1);
        $article1 = Article::query()->find(1);
        $user1->reactTo($article1, 'like');
        $user1->removeReactionFrom($article1);

        $user2 = User::query()->find(2);
        $article2 = Article::query()->find(2);
        $user2->reactTo($article2, 'like');
        $user2->removeReactionFrom($article2);
    }
}
