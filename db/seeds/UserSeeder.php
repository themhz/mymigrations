<?php

require_once 'vendor/autoload.php';


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'username'      => $faker->userName,
                'password'      => sha1($faker->password),                                
                'firstname'    => $faker->firstName,
                'lastname'     => $faker->lastName,
                'regdate'       => date('Y-m-d H:i:s'),
            ];
        }

        $this->table('users')->insert($data)->saveData();
    }
}
