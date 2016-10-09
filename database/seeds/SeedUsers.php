<?php

use App\Permission;
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
        $moderator->name = 'moderator';
        $moderator->display_name = 'Moderator';
        $moderator->description = 'Moderator';
        $moderator->save();

        /** @var Role $employer */
        $employer = new Role();
        $employer->id = Role::EMPLOYER_ROLE;
        $employer->name = 'employer';
        $employer->display_name = 'Employer';
        $employer->description = 'Employer';
        $employer->save();

        /** @var Permission $createJob */
        $createVacancy = new Permission();
        $createVacancy->name = 'create-vacancy';
        $createVacancy->display_name = 'Create vacancy Posts';
        $createVacancy->description = 'create new vacancy post';
        $createVacancy->save();
        $employer->attachPermission($createVacancy);

        /** @var Permission $moderateJob */
        $moderateVacancy = new Permission();
        $moderateVacancy->name = 'moderate-vacancy';
        $moderateVacancy->display_name = 'Moderate vacancy';
        $moderateVacancy->description = 'Moderate vacancy posts';
        $moderateVacancy->save();
        $moderator->attachPermission($moderateVacancy);

        /** @var User $user */
        $user = User::create([
            'name' => 'Moderator',
            'email' => 'moderator@test.com',
            'password' => bcrypt('moderatorPassword'),
        ]);
        $user->attachRole($moderator);

        /** @var User $user2 */
        $user2 = User::create([
            'name' => 'Employer',
            'email' => 'Employer@test.com',
            'password' => bcrypt('EmployerPassword'),
        ]);
        $user2->attachRole($employer);

    }
}
