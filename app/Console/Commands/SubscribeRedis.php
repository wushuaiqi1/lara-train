<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class SubscribeRedis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '订阅Redis消息';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Redis::set("name",1);
        echo env('REDIS_TIMEOUT');
        echo '可以成功连接。';
        // 注意，默认database中会设置通道的prefix，可能与订阅的通道不一致。
        //导致一直没有消息，会自己断开。
        Redis::subscribe(['test-channel'], function ($message) {
            echo $message;
        });
    }
}
