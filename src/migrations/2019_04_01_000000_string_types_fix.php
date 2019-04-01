<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StringTypesFix extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounting_journal_transactions', function (Blueprint $table) {
            $table->string('memo', 120)->nullable();
            $table->dropColumn('tags')->nullable();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounting_journal_transactions', function (Blueprint $table) {
            $table->text('memo')->nullable();
            $table->text('tags')->nullable();
        });
    }
}