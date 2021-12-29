<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeleteSiswaProc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        CREATE OR REPLACE PROCEDURE deleteSiswa(id_user INT)
        LANGUAGE plpgsql    
        AS $$
        BEGIN
          DELETE FROM users WHERE id = id_user;
          DELETE FROM role_user WHERE user_id = id_user;
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
        $sql = "DROP PROCEDURE IF EXISTS deleteSiswa";
        DB::connection()->getPdo()->exec($sql);
    }
}
