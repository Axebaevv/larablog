~<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateBlogsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('blogs', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->index();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->string('slug')->unique()->index()->nullable();
                $table->string('meta_title')->nullable();
                $table->string('meta_description')->nullable();
                $table->string('title');
                $table->text('body');
                //This is for Soft use
                $table->softDeletes();
                //END This is for Soft use
                $table->timestamps();
                /*
                *ROLE ID || It Has Second Way Of Doing It. It will not affect to database. In  *terminal u need to write: php artisan make:migrate add_role_id_column_to_blogs_table *--table=blogs
                */
                // $table->text('role_id'); // must to use php artisan migrate:refresh
                // END ROLE ID

            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('blogs');
        }
    }
