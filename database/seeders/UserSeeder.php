<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Database\Seeder;
use Faker\Generator;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $user = User::create([
      'firstname' => 'Marcel',
      'name' => 'Stadelmann',
      'email' => 'm@marceli.to',
      'email_verified_at' => \Carbon\Carbon::now(),
      'password' => \Hash::make('7aq31rr23'),
    ]);

    RoleUser::create([
      'role_id' => 1,
      'user_id' => $user->id
    ]);

  }
}
