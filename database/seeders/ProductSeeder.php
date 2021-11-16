<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'nama'=>'Gaming Monitor',
                'harga'=>'4.999.000',
                'deskripsi'=>'sebuah Monitor untuk bermain game dan banyak fitur lainnya',
                'kategori'=>'computer',
                'gallery'=>'https://www.lg.com/in/images/monitors/md07528978/gallery/27GL650F-B-D-01.jpg'
            ],
            [
                'nama'=>'UHD 4K HDR Monitor',
                'harga'=>'6.000.000',
                'deskripsi'=>'sebuah Monitor untuk bermain game dan nonton film dan banyak fitur lainnya',
                'kategori'=>'computer',
                'gallery'=>'https://www.lg.com/in/images/monitors/md06106776/gallery/01-1100.jpg'
            ],
            [
                'nama'=>'LG Smart TV',
                'harga'=>'10.000.000',
                'deskripsi'=>'sebuah TV yang sangat bagus dan banyak fitur lainnya',
                'kategori'=>'elektronik',
                'gallery'=>'https://www.lg.com/in/images/tvs/md07511862/gallery/32LM563BPTC-D-01.jpg'
            ],
            [
                'nama'=>'Smart Watch',
                'harga'=>'1.499.999',
                'deskripsi'=>'sebuah Smart Watch dan banyak fitur lainnya',
                'kategori'=>'elektronik',
                'gallery'=>'https://www.lg.com/in/images/smart-watches/lg-w100/gallery/medium02.jpg'
            ],
            [
                'nama'=>'Party Speaker',
                'harga'=>'3.999.000',
                'deskripsi'=>'sebuah Speaker dan banyak fitur lainnya',
                'kategori'=>'elektronik',
                'gallery'=>'https://www.lg.com/in/images/home-entertainment/md06079297/gallery/Desk-01.jpg'
            ],
        ]);
    }
}
