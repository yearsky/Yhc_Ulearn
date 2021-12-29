<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdateSiswaProc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        CREATE OR REPLACE PROCEDURE updateSiswa(IN n_depan VARCHAR, IN n_belakang VARCHAR, IN s_email VARCHAR, IN s_password VARCHAR, IN s_active INT, IN role_id INT, IN id_user INT, IN kelas_id INT)
        LANGUAGE plpgsql    
        AS $$
        BEGIN
          UPDATE users SET first_name = n_depan, last_name = n_belakang, email = s_email, password = s_password, is_active = s_active WHERE id=id_user;
          UPDATE role_user SET role_id = role_id, user_id = id_user, kelas_id = kelas_id FROM role_user WHERE user_id = id_user;
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
        $sql = "DROP PROCEDURE IF EXISTS updateSiswa";
        DB::connection()->getPdo()->exec($sql);
    }
}
