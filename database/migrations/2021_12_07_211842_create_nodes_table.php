<?php

use App\Models\Node;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id')->nullable();
            $table->string('name');
            $table->integer('height');
            $table->text('details')->nullable();
            $table->timestamps();
        });

        $node = new Node([
            'name' => 'CEO',
            'height' => 0,
            'details' => 'The CEO'
        ]);
        $node->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nodes');
    }
}
