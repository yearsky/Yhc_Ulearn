<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsWhereProc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        CREATE OR REPLACE PROCEDURE Abs_Where(IN AbsensiId VARCHAR)
        LANGUAGE plpgsql    
        AS $$
        BEGIN
          SELECT Absensi.id,CONCAT(instructors.first_name,' ',instructors.last_name) AS instructors, CONCAT(Users.first_name, ' ',Users.last_name)AS Siswa, course_title AS Mapel, table_kelas.nama AS Kelas, keterangan FROM absensi INNER JOIN instructors ON Absensi.id_instructor = instructors.id INNER JOIN Users ON Absensi.id_siswa = Users.id INNER JOIN courses ON Absensi.id_course = courses.id INNER JOIN table_kelas ON Absensi.id_kelas = table_kelas.id WHERE Absensi.id = AbsensiId;
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
        $sql = "DROP PROCEDURE IF EXISTS Abs_Where";
        DB::connection()->getPdo()->exec($sql);
    }
}
