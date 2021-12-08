<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNSiswaProc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        CREATE OR REPLACE PROCEDURE n_siswa()
        LANGUAGE plpgsql    
        AS $$
        BEGIN
          SELECT Concat(first_name, ' ',last_name) AS Siswa From role_user INNER JOIN users On role_user.user_id = users.id WHERE role_id = '1';
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
        $sql = "DROP PROCEDURE IF EXISTS n_siswa";
        DB::connection()->getPdo()->exec($sql);
    }
}
