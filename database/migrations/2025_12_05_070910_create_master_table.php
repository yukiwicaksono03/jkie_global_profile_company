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
            $table->string("greating_home_1")->nullable();
            $table->string("greating_home_2")->nullable();
            $table->string("greating_home_3")->nullable();
            $table->string("visi")->nullable();
            $table->string("misi")->nullable();
            $table->string("foto_sejarah")->nullable();
            $table->text("sejarah")->nullable();
            $table->text("desc_wahana")->nullable();
            $table->text("desc_gallery")->nullable();
            $table->text("desc_facilities")->nullable();
            $table->text("desc_our_menu")->nullable();
            $table->text("desc_our_menu_home")->nullable();
            $table->text("desc_event")->nullable();
            $table->text("desc_event_home")->nullable();
            $table->string("kedai_senin")->nullable();
            $table->string("kedai_selasa")->nullable();
            $table->string("kedai_rabu")->nullable();
            $table->string("kedai_kamis")->nullable();
            $table->string("kedai_jumat")->nullable();
            $table->string("kedai_sabtu")->nullable();
            $table->string("kedai_minggu")->nullable();
            $table->string("wahana_senin")->nullable();
            $table->string("wahana_selasa")->nullable();
            $table->string("wahana_rabu")->nullable();
            $table->string("wahana_kamis")->nullable();
            $table->string("wahana_jumat")->nullable();
            $table->string("wahana_sabtu")->nullable();
            $table->string("wahana_minggu")->nullable();
            $table->string("slider_delay")->nullable();
            $table->string("title_footer")->nullable();
            $table->text("desc")->nullable();
            $table->string("link_instagram")->nullable();
            $table->string("link_facebook")->nullable();
            $table->string("link_youtube")->nullable();
            $table->string("link_tiktok")->nullable();
            $table->string("link_maps")->nullable();
            $table->string("alamat")->nullable();
            $table->string("whatsapp")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masters');
    }
};
