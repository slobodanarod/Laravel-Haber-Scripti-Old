<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        //
        DB::table('settings')->insert(
            [

                [
                    'description' => "Başlık",
                    'key' => 'title',
                    'value' => 'Laravel ECMS Learning',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'

                ],
                [
                    'description' => "Açıklama",
                    'key' => 'description',
                    'value' => 'Laravel ECMS Learning',
                    'type' => 'text',
                    'must' => 1,
                    'delete' => '0',
                    'status' => '1'

                ],
                [
                    'description' => "Logo",
                    'key' => 'logo',
                    'value' => 'logo.png',
                    'type' => 'file',
                    'must' => 2,
                    'delete' => '0',
                    'status' => '1'

                ],
                [
                    'description' => "Icon",
                    'key' => 'icon',
                    'value' => 'icon.ico',
                    'type' => 'file',
                    'must' => 3,
                    'delete' => '0',
                    'status' => '1'

                ],
                [
                    'description' => "Anahtar Kelimeler",
                    'key' => 'keywords',
                    'value' => 'laravel,cms,mertcan,yürekli',
                    'type' => 'text',
                    'must' => 4,
                    'delete' => '0',
                    'status' => '1'

                ],
                [
                    'description' => "Telefon Sabit",
                    'key' => 'phone_sabit',
                    'value' => '0850 XXX XX XX',
                    'type' => 'text',
                    'must' => 5,
                    'delete' => '0',
                    'status' => '1'

                ],
                [
                    'description' => "Telefon GMS",
                    'key' => 'phone_gsm',
                    'value' => '0850 XXX XX XX',
                    'type' => 'text',
                    'must' => 6,
                    'delete' => '0',
                    'status' => '1'

                ],
                [
                    'description' => "Mail",
                    'key' => 'mail',
                    'value' => 'mertcanyurekli@gmail.com',
                    'type' => 'text',
                    'must' => 7,
                    'delete' => '0',
                    'status' => '1'

                ],
                [
                    'description' => "İl",
                    'key' => 'il',
                    'value' => 'İzmir',
                    'type' => 'text',
                    'must' => 8,
                    'delete' => '0',
                    'status' => '1'

                ],
                [
                    'description' => "İlçe",
                    'key' => 'ilce',
                    'value' => 'Bornova',
                    'type' => 'text',
                    'must' => 9,
                    'delete' => '0',
                    'status' => '1'

                ],
                [
                'description' => "Açık Adres",
                'key' => 'adres',
                'value' => 'Bornova Gaziosmanpaşa Mahallesi',
                'type' => 'text',
                'must' => 10,
                'delete' => '0',
                'status' => '1'

            ]
        ]);

    }
}
