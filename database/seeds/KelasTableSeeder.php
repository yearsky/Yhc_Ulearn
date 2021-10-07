<?php

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $is_exist = Kelas::all();

        
            $kelas = new Kelas();
            $kelas->nama = 'X';
            $kelas->save();
            $kelas = new Kelas();
            $kelas->nama = 'XI';
            $kelas->save();
            $kelas = new Kelas();
            $kelas->nama = 'XII';
            $kelas->save();

           
        
    }
}
