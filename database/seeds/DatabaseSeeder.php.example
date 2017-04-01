<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      // Fake Users
      for ($x = 0; $x <= 5; $x++) {
        DB::table('users')->insert([
          'name' => $faker->userName,
          'email' => $faker->userName . str_random(1) . '@' . $faker->freeEmailDomain . '.dev',
          'password' => bcrypt('password'),
          ]);
      };

      // Fake Tasks
      for ($x = 0; $x <= 100; $x++) {
        DB::table('tasks')->insert([
          'name' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
          'status' => 1,
          'type' => 1,
          'note' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
          ]);
      };

      // Fake People
      for ($x = 0; $x <= 100; $x++) {
        $first = $faker->firstName;
        $last = $faker->lastName;
        DB::table('people')->insert([
         'name' => $first . ' ' . $last,
         'status' => 1,
         'type' => 1,
         'note' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
         'email' => $faker->userName . str_random(1) . '@' . $faker->freeEmailDomain . '.dev',
         'phone' => $faker->e164PhoneNumber,
         'alt' => $faker->e164PhoneNumber,
         'web' => 'http://' . $faker->userName . '.dev',
         'title' => $faker->jobTitle,
         'first' => $first,
         'last' => $last,
         ]);
      };

      // Fake Places
      for ($x = 0; $x <= 100; $x++) {
        DB::table('places')->insert([
          'name' => $faker->company,
          'status' => 1,
          'type' => 1,
          'note' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
          'email' => $faker->userName . str_random(1) . '@' . $faker->freeEmailDomain . '.dev',
          'phone' => $faker->e164PhoneNumber,
          'alt' => $faker->e164PhoneNumber,
          'web' => 'http://' . $faker->userName . '.dev',
          'address' => $faker->buildingNumber . ' ' . $faker->streetName,
          'address2' => $faker->optional()->buildingNumber,
          'city' => $faker->city,
          'state' => $faker->stateAbbr,
          'zip' => $faker->postcode,
          'country' => '840',
          ]);
      };
    }
  }