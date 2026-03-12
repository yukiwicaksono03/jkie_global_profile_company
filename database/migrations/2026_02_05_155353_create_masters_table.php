<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('masters', function (Blueprint $table) {
            $table->id();

            // Greeting & profile
            $table->text('greating_home_1')->nullable();
            $table->text('greating_home_2')->nullable();
            $table->text('greating_home_3')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('foto_sejarah')->nullable();
            $table->text('sejarah')->nullable();

            // Description sections
            $table->text('desc_wahana')->nullable();
            $table->text('desc_gallery')->nullable();
            $table->text('desc_facilities')->nullable();
            $table->text('desc_our_menu')->nullable();
            $table->text('desc_our_menu_home')->nullable();
            $table->text('desc_event')->nullable();
            $table->text('desc_event_home')->nullable();

            // Kedai schedule
            $table->text('kedai_senin')->nullable();
            $table->text('kedai_selasa')->nullable();
            $table->text('kedai_rabu')->nullable();
            $table->text('kedai_kamis')->nullable();
            $table->text('kedai_jumat')->nullable();
            $table->text('kedai_sabtu')->nullable();
            $table->text('kedai_minggu')->nullable();

            // Wahana schedule
            $table->text('wahana_senin')->nullable();
            $table->text('wahana_selasa')->nullable();
            $table->text('wahana_rabu')->nullable();
            $table->text('wahana_kamis')->nullable();
            $table->text('wahana_jumat')->nullable();
            $table->text('wahana_sabtu')->nullable();
            $table->text('wahana_minggu')->nullable();

            // Footer & misc
            $table->integer('slider_delay')->default(3000);
            $table->string('title_footer')->nullable();
            $table->text('desc')->nullable();

            // Social links
            $table->string('link_instagram')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_youtube')->nullable();
            $table->string('link_tiktok')->nullable();
            $table->string('link_maps')->nullable();

            // Contact
            $table->text('alamat')->nullable();
            $table->string('whatsapp')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('masters');
    }
};