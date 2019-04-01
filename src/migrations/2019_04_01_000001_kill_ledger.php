<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KillLedger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounting_journals', function (Blueprint $table) {
            $table->dropColumn('ledger_id')->nullable();
        });
        Schema::dropIfExists('accounting_ledgers');
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('accounting_ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type', ['asset', 'liability', 'equity', 'income', 'expense']);
            $table->timestamps();
        });
        Schema::table('accounting_journals', function (Blueprint $table) {
            $table->unsignedInteger('ledger_id')->nullable();
        });

    }
}