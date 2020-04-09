<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttachmentToLocAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loc_attendances', function (Blueprint $table) {
            $table->string('image_front')->nullable();
            $table->string('image_back')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loc_attendances', function (Blueprint $table) {
            $table->dropColumn('image_front');
            $table->dropColumn('image_back');
        });

    }
}
