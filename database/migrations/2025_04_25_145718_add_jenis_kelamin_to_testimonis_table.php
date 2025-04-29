<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenisKelaminToTestimonisTable extends Migration // Nama class bisa berbeda
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testimonis', function (Blueprint $table) {
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->after('rating'); // Tambahkan kolom jenis_kelamin
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testimonis', function (Blueprint $table) {
            $table->dropColumn('jenis_kelamin'); // Hapus kolom jenis_kelamin
        });
    }
}