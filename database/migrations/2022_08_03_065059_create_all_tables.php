<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->timestamp('email_verified_at');
            $table->string('password');
            $table->string('remember_token');
            $table->timestamps();
        });

        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->unsignedTinyInteger('type');
            $table->string('value');
            $table->timestamp('expire_at');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('todo_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
        });

        Schema::create('todo_rights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('list_id')->constrained('todo_lists')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->unsignedTinyInteger('value');
            $table->unique(['list_id', 'user_id']);
        });

        Schema::create('todo_items', function (Blueprint $table) {
            $table->id();
            $table->text('text');
        });

        Schema::create('todo_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('todo_items')->onDelete('cascade');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
        Schema::dropIfExists('tokens');
        Schema::dropIfExists('todo_lists');
        Schema::dropIfExists('todo_rights');
        Schema::dropIfExists('todo_items');
        Schema::dropIfExists('todo_tags');
    }
};
