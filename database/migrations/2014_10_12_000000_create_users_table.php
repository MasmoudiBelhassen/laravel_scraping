<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        if (!Schema::hasTable('sexes')) {
            Schema::create('sexes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('wording');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('ages')) {
            Schema::create('ages', function (Blueprint $table) {
                $table->increments('id');
                $table->string('wording');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('interests')) {
            Schema::create('interests', function (Blueprint $table) {
                $table->increments('id');
                $table->string('wording');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('languages')) {
            Schema::create('languages', function (Blueprint $table) {
                $table->increments('id');
                $table->string('wording');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('first_name');
                $table->string('last_name');

                $table->date('date_of_birth');
                $table->boolean('role')->default(0);
                $table->string('email')->unique();
                $table->string('password');
                $table->integer('age_id')->unsigned();
                $table->foreign('age_id')->references('id')->on('ages')->onDelete('cascade');
                $table->integer('sexe_id')->unsigned();
                $table->foreign('sexe_id')->references('id')->on('sexes')->onDelete('cascade');
                $table->rememberToken();
                $table->timestamps();
            });
        }


        if (!Schema::hasTable('typesources')) {
            Schema::create('typesources', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name_source');
                $table->string('url');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('sources')) {
            Schema::create('sources', function (Blueprint $table) {
                $table->increments('id');
                $table->string('url');
                $table->integer('typesource_id')->unsigned();
                $table->foreign('typesource_id')->references('id')->on('typesources')->onDelete('cascade');
                $table->integer('interest_id')->unsigned();
                $table->foreign('interest_id')->references('id')->on('interests')->onDelete('cascade');
                $table->integer('language_id')->unsigned();
                $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('articles')) {
            Schema::create('articles', function (Blueprint $table) {
                $table->increments('id');
                $table->string('image');
                $table->string('date');
                $table->string('url');
                $table->string('title');
                $table->longText('description');
                $table->integer('source_id')->unsigned();
                $table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('age_article')) {
            Schema::create('age_article', function (Blueprint $table) {

                $table->integer('article_id')->unsigned();
                $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
                $table->integer('age_id')->unsigned()->index();
                $table->foreign('age_id')->references('id')->on('ages')->onDelete('cascade');
                $table->primary(['age_id', 'article_id']);
            });
        }

        if (!Schema::hasTable('interest_article')) {
            Schema::create('interest_article', function (Blueprint $table) {
                $table->integer('interest_id')->unsigned();
                $table->foreign('interest_id')->references('id')->on('interests')->onDelete('cascade');
                $table->integer('article_id')->unsigned();
                $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
                $table->primary(['interest_id', 'article_id']);

            });
        }

        if (!Schema::hasTable('language_user')) {
            Schema::create('language_user', function (Blueprint $table) {
                $table->integer('language_id')->unsigned();
                $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->primary(['language_id', 'user_id']);

            });
        }

        if (!Schema::hasTable('password_resets')) {
            Schema::create('password_resets', function (Blueprint $table) {
                $table->string('email')->index();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            });
        }


        if (!Schema::hasTable('language_article')) {
            Schema::create('language_article', function (Blueprint $table) {
                $table->integer('article_id')->unsigned()->index();
                $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
                $table->integer('language_id')->unsigned()->index();
                $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
                $table->primary(['language_id', 'article_id']);
            });
        }

        if (!Schema::hasTable('sexe_article')) {
            Schema::create('sexe_article', function (Blueprint $table) {

                $table->integer('article_id')->unsigned();
                $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
                $table->integer('sexe_id')->unsigned();
                $table->foreign('sexe_id')->references('id')->on('sexes')->onDelete('cascade');
                $table->primary(['sexe_id', 'article_id']);
            });
        }

        if (!Schema::hasTable('interest_user')) {
            Schema::create('interest_user', function (Blueprint $table) {

                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
                $table->integer('interest_id')->unsigned();
                $table->foreign('interest_id')->references('id')->on('interests');
                $table->primary(['interest_id', 'user_id']);

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('sexes');
        Schema::dropIfExists('ages');
        Schema::dropIfExists('interests');
        Schema::dropIfExists('languages');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('sources');
        Schema::dropIfExists('typesources');
        Schema::dropIfExists('sexe_article');
        Schema::dropIfExists('language_article');
        Schema::dropIfExists('language_user');
        Schema::dropIfExists('interest_article');
        Schema::dropIfExists('age_article');
        Schema::dropIfExists('interest_user');


    }
}
