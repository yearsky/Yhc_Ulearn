<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGetJadwalProc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        CREATE OR REPLACE PROCEDURE GetJadwal()
        LANGUAGE plpgsql    
        AS $$
        BEGIN
          SELECT penjadwalan.id, concat(instructors.first_name,' ',instructors.last_name) AS n_guru,  courses.course_title AS mapel, table_kelas.nama AS kelas, jam_mulai, jam_akhir, hari FROM penjadwalan INNER JOIN instructors ON instructor_id = instructors.id INNER JOIN courses ON penjadwalan.course_id = courses.id INNER JOIN table_kelas ON penjadwalan.kelas_id = table_kelas.id;
        END;$$
        ";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = "DROP PROCEDURE IF EXISTS GetJadwal";
        DB::connection()->getPdo()->exec($sql);
    }
}
