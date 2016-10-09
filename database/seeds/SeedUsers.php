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
        $createJob = new Permission();
        $createJob->name = 'create-job';
        $createJob->display_name = 'Create Job Posts';
        $createJob->description = 'create new job post';
        $createJob->save();
        $employer->attachPermission($createJob);

        /** @var Permission $moderateJob */
        $moderateJob = new Permission();
        $moderateJob->name = 'moderate-job';
        $moderateJob->display_name = 'Moderate Jobs';
        $moderateJob->description = 'Moderate job posts';
        $moderateJob->save();
        $moderator->attachPermission($moderateJob);

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
