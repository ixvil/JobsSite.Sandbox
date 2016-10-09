<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class SeedUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Role $moderator */
        $moderator = new Role();
        $moderator->id = Role::MODERATOR_ROLE;
        $moderator->name = 'Moderator';
        $moderator->display_name = 'Moderator';
        $moderator->description = 'Moderator';
        $moderator->save();

        /** @var Role $employer */
        $employer = new Role();
        $employer->id = Role::EMPLOYER_ROLE;
        $employer->name = 'Employer';
        $employer->display_name = 'Employer';
        $employer->description = 'Employer';
        $employer->save();

        /** @var User $user */
        $user = User::create([
            'name' => 'Moderator',
            'email' => 'moderator@test.com',
            'password' => bcrypt('moderatorPassword'),
        ]);
        $user->attachRole($moderator);

    }
}
