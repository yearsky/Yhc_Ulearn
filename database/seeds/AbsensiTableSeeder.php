<?php

use Illuminate\Database\Seeder;
use App\Models\Absensi;

class AbsensiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $is_exist = Absensi::all();

    if (!$is_exist->count()) {
        $absensi = new Absensi();
        $absensi->id_instructor = '1';
        $absensi->id_siswa = '5';
        $absensi->id_course = '2';
        $absensi->id_kelas = '1';
        $absensi->keterangan = 'Hadir';
        $absensi->save();
    }
    }
}
