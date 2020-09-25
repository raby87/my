<?php

namespace App\Console\Commands\Rabbitmq;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Connection\AMQPSSLConnection;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class TwoThousand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bigdata:build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $data = [];
//        foreach (range(0, 10) as $index) {
//            $products = [];
//            $date = $faker->dateTime;
//            foreach (range(0, 2000) as $index) {
//                $products[] = [
//                    'code'                   => $faker->word,
//                    'name'                   => $faker->word,
//                    'name_en'                => $faker->word,
//                    'fabrication_id'         => $faker->randomElement($fabrication_ids),
//                    'fabric_width_id'        => $faker->randomElement($fabric_width_ids),
//                    'fabric_weight_id'       => $faker->randomElement($fabric_weight_ids),
//                    'gauge_id'               => $faker->randomElement($gauge_ids),
//                    'diameter_id'            => $faker->randomElement($diameter_ids),
//                    'production_property_id' => $faker->randomElement($production_property_ids),
//                    'content_id'             => $faker->randomElement($content_ids),
//                    'creator_id'             => $faker->randomElement($creator_ids),
//                    'remark'                 => $faker->text(200),
//                    'created_at'             => $date,
//                    'updated_at'             => $date
//                ];
//            }
//            DB::table('bigdata_two_thousand')->insert($products);
//        }
    }
}
