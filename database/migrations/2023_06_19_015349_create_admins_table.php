<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_td', function (Blueprint $table) {
            $table->id();
            $table->string('admin_name',70);
            $table->string('admin_email',70);
            $table->string('admin_mobile',70);
            $table->string('admin_village',70);
            $table->string('admin_post',70);
            $table->string('admin_about',70);
            $table->string('admin_img',70);
            $table->string('admin_pass',70);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
