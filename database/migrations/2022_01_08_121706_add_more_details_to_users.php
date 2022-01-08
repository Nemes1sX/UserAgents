<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreDetailsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone');
            $table->integer('age');
            $table->foreignIdFor(\App\Models\Agent::class)->constrained();
            $table->string('address')->nullable();
            $table->string('password')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('agent_id');
            $table->dropColumn('phone', 'age', 'address', 'agent_id');
            $table->string('password')->nullable(true)->change();
        });
    }
}
