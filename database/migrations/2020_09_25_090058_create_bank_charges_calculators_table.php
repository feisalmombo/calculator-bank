<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankChargesCalculatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_charges_calculators', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bank_id')->unsigned();
            $table->integer('accountTypes_id')->unsigned();
            $table->integer('currencies_id')->unsigned();

            // Statement
            $table->string('statement_duplicate')->nullable();
            $table->string('statement_interim')->nullable();

            // ATM VISA Debit Card
            $table->string('atm_withdrawal_transaction')->nullable();
            $table->string('atm_withdrawal_non')->nullable();
            $table->string('atm_ministatement')->nullable();
            $table->string('atm_daily_limit')->nullable();
            $table->string('atm_minimum_withdrawals')->nullable();
            $table->string('atm_card_replacement')->nullable();
            $table->string('atm_card_renewal')->nullable();

            // Standing Order
            $table->string('standing_within_kcb')->nullable();
            $table->string('standing_outward')->nullable();
            $table->string('standing_setup_amend')->nullable();
            $table->string('standing_unpaid_penalty')->nullable();

            // Cheques
            $table->string('cheques_unpaid_outward')->nullable();
            $table->string('cheques_unpaid_inward')->nullable();
            $table->string('cheques_unpaid_technical')->nullable();
            $table->string('cheques_counter_leaves')->nullable();
            $table->string('cheques_bankers_cheque')->nullable();
            $table->string('cheques_stop_payment')->nullable();

            // Transfers Local
            $table->string('transferslocal_KCB')->nullable();
            $table->string('transferslocal_EFT')->nullable();
            $table->string('transferslocal_TISS')->nullable();
            $table->string('transferslocal_EAPS')->nullable();
            $table->timestamps();

            $table->foreign('bank_id')
            ->references('id')->on('banks')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('accountTypes_id')
            ->references('id')->on('account_types')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('currencies_id')
            ->references('id')->on('currencies')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_charges_calculators');
    }
}
