<?php

use App\VacancyStatus;
use Illuminate\Database\Seeder;

class SeedVacanciesAndStatuses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var VacancyStatus $newStatus */
        $newStatus = new VacancyStatus();
        $newStatus->id = VacancyStatus::NEW_STATUS;
        $newStatus->name = "New";
        $newStatus->save();

        /** @var VacancyStatus $declinedStatus */
        $declinedStatus = new VacancyStatus();
        $declinedStatus->id = VacancyStatus::DECLINED_STATUS;
        $declinedStatus->name = "Declined";
        $declinedStatus->save();

        /** @var VacancyStatus $approvedStatus */
        $approvedStatus = new VacancyStatus();
        $approvedStatus->id = VacancyStatus::APPROVED_STATUS;
        $approvedStatus->name = "Approved";
        $approvedStatus->save();
    }
}
