<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $channels = ['SMS', 'E-Mail', 'Push Notification'];

        foreach ($channels as $channel) {
            Channel::create(['channel' => $channel]);
        }
    }
}
