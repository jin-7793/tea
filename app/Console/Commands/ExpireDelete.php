<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class ExpireDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ExpireDelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete expired posts';

    /**
     * Execute the console command.
     *
     * @return int
     */
    protected $table='posts';
     
    public function handle()
    {
        Post::where('expired_at','<=',now())->delete();
    }
}
