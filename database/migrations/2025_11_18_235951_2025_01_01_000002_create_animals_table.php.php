<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('especie')->nullable();
            $table->string('raca')->nullable();
            $table->string('idade')->nullable();
            $table->string('porte')->nullable(); // pequeno, medio, grande
            $table->enum('sexo', ['M','F','U'])->default('U');
            $table->string('local')->nullable();
            $table->text('descricao')->nullable();
            $table->string('imagem')->nullable();
            $table->string('status')->default('disponivel'); // disponivel, em_analise, adotado
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('animals');
    }
};
