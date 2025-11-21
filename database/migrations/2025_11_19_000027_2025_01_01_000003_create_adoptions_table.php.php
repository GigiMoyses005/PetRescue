<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('adoptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constrained('animals')->cascadeOnDelete();
            $table->foreignId('adotante_id')->constrained('adotantes')->cascadeOnDelete();
            $table->timestamp('data_solicitacao')->useCurrent();
            $table->date('data_adocao')->nullable();
            $table->enum('status',['pendente','aprovado','rejeitado'])->default('pendente');
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('adoptions');
    }
};
