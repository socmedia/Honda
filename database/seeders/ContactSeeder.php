<?php

namespace Database\Seeders;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Info Umum',
                'url' => null,
                'phone' => '02486569000',
                'fax' => '02486569002',
                'description' => 'Jl. Gajahmada No.88, Bangunharjo, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50139',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Instagram',
                'url' => 'https://www.instagram.com/hondajateng/',
                'phone' => null,
                'fax' => null,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Facebook',
                'url' => 'https://www.facebook.com/hondamotorjateng',
                'phone' => null,
                'fax' => null,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Whatsapp',
                'url' => 82233,
                'phone' => null,
                'fax' => null,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Twitter',
                'url' => 'https://twitter.com/HondaJateng',
                'phone' => null,
                'fax' => null,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Youtube',
                'url' => 'https://www.youtube.com/channel/UCJOKlXJsD-wj5mBMQddqJpg',
                'phone' => null,
                'fax' => null,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'TikTok',
                'url' => 'https://www.tiktok.com/@hondajateng',
                'phone' => null,
                'fax' => null,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        return Contact::insert($data);
    }
}
