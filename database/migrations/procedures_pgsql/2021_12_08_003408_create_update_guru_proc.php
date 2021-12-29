<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdateGuruProc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        CREATE OR REPLACE PROCEDURE updateGuru(IN n_depan VARCHAR, IN n_belakang VARCHAR, IN n_email VARCHAR, IN pass VARCHAR, IN active INT, IN id_role INT, IN id_user INT, IN id_kelas INT)
        LANGUAGE plpgsql    
        AS $$
        BEGIN
          UPDATE users SET first_name = n_depan, last_name = n_belakang, email = n_email, password = pass, is_active = active WHERE id = id_user;
          UPDATE role_user SET role_id = id_role, user_id = id_user, kelas_id = id_kelas WHERE user_id = id_user;
          UPDATE instructors SET first_name = n_depan, last_name = n_belakang, contact_email = n_email WHERE user_id = id_user;
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
        $sql = "DROP PROCEDURE IF EXISTS updateGuru";
        DB::connection()->getPdo()->exec($sql);
    }
}
