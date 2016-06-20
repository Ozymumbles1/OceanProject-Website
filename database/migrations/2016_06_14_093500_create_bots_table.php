<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bots', function (Blueprint $table) {
            $table->Bigincrements('id')->unsigned();
            $table->integer('botstatus_id')->nullable()->index();
            $table->BigInteger('premium')->default(1);
            $table->integer('server_id')->nullable()->index();
            $table->string('nickname')->default('OceanProject');
            $table->string('avatar')->default('http://i.imgur.com/8YnvOxR.jpg');
            $table->string('homepage')->default('OceanProject.fr');
            $table->bigInteger('chatid')->unique();
            $table->string('chatname')->unique();
            $table->integer('chatpw')->nullable();
            $table->string('nameglow', 6)->default('006fff');
            $table->string('namecolor', 6)->default('ffffff');
            $table->string('namegrad')->default('(glow#1cb6d6#grad#r50#s35#1cb6d9#ffffff#ffffff)');
            $table->string('status')->default('OceanProject.fr');
            $table->string('statusglow', 6)->default('006fff');
            $table->string('statuscolor', 6)->default('ffffff');
            $table->integer('hat_id')->default(1);
            $table->string('hatcolor', 6)->default('007fff');
            $table->string('pcback')->default('http://i.imgur.com/dZJn3gA.png');
            $table->string('autowelcome')->nullable();
            $table->string('ticklemessage')->nullable('');
            $table->integer('maxkick')->default('3');
            $table->integer('maxkickban')->default('1');
            $table->integer('maxflood')->default('10');
            $table->integer('maxchar')->default('10');
            $table->integer('maxsmilies')->default('10');
            $table->string('powerdisabled', 500);
            $table->string('automessage')->nullable();
            $table->integer('automessagetime')->nullable();
            $table->bool('tooglelinkfilter')->default('0');
            $table->bool('tooglefilterlinkaction')->default('0');
            $table->bool('toogleyoutubemessage')->default('0');
            $table->bool('tooglelogs')->default('1');
            $table->bool('autorestart')->default('0');
            $table->integer('automember_id')->default(1);
            $table->integer('creator_user_id')->index();
            $table->timestamps();
            $table->foreign('botstatus_id')->references('id')->on('botstatuses');
            $table->foreign('creator_user_id')->references('id')->on('users');
            $table->foreign('hat_id')->references('id')->on('hats');
            $table->foreign('server_id')->references('id')->on('servers');
            $table->foreign('automember_id')->references('id')->on('automembers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bots');
    }
}
