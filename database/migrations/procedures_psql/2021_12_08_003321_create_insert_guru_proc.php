<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsertGuruProc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        CREATE OR REPLACE PROCEDURE public.insertGuru(n_depan VARCHAR(100), n_belakang VARCHAR(100), mail VARCHAR(100), pass VARCHAR(100), active TINYINT(1), id_role INT(10), id_user INT(10), id_kelas INT(10))
        LANGUAGE plpgsql    
        AS $$
        BEGIN
          INSERT INTO Users(first_name, last_name, email, password, is_active) VALUES(n_depan, n_belakang, mail, pass, active);
          SET id_user := LAST_INSERT_ID();
          INSERT INTO role_user(role_id, user_id, kelas_id) VALUES (id_role,id_user,kelas_id);
          INSERT INTO instructors(user_id, first_name, last_name, contact_email) VALUES (id_user, n_depan, n_belakang, mail);
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
        $sql = "DROP PROCEDURE IF EXISTS public.insertGuru";
        DB::connection()->getPdo()->exec($sql);
    }
}
