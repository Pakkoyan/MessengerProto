<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });

        Schema::table('chats_participants', function (Blueprint $table) {
            $table->foreign('chat_id')->references('chat_id')->on('chats')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('chat_id')->references('chat_id')->on('chats')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });

        Schema::table('message_status', function (Blueprint $table) {
            $table->foreign('message_id')->references('message_id')->on('messages')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Удаляем внешний ключ из таблицы message_status
        Schema::table('message_status', function (Blueprint $table) {
            $table->dropForeign(['message_id']);
            $table->dropForeign(['user_id']);
        });

        // Удаляем внешний ключ из таблицы chats_participants
        Schema::table('chats_participants', function (Blueprint $table) {
            $table->dropForeign(['chat_id']);
            $table->dropForeign(['user_id']);
        });

        // Удаляем внешний ключ из таблицы messages
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['chat_id']);
            $table->dropForeign(['user_id']);
        });
    }
};
