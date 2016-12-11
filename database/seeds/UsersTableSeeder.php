<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Truncamos las tablas en cada ejecución
        App\User::truncate();
        App\Post::truncate();
        App\Gallery::truncate();
        App\Multimedia::truncate();

        //Ejecutamos la funcion factory especificando las clases a tratar y dentro se pueden ejecutar callbacks
        //para asociar a algun modelo o usuario algun post -> opcionalmente

        //En este caso creamos a un usuario administrador de forma manual para no incluirlo en los fakers
        factory(App\User::class)->create([
            'name' => 'Esteban',
            'email' => 'esteban@mail.cl',
            'role' => 'admin',
            'password' => bcrypt('test1234'),
            'remember_token' => str_random(10),
        ]);
        factory(App\User::class, 49)->create()->each(function ($user) {
            $post = factory(App\Post::class)->make();
            $gallery = factory(App\Gallery::class)->make();
            $multimedia = factory(App\Multimedia::class)->make();
            $user->posts()->save($post);
            $user->galleries()->save($gallery);
            $user->multimedia()->save($multimedia);
        });
    }
}
