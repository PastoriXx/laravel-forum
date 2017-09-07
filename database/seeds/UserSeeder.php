<?php

use App\Models\FieldSetting;
use App\Models\Team;
use App\Models\TeamInvite;
use App\Models\User;
use App\Models\UserConfig;
use Salestools\Enumerable\FieldSettingType;
use Salestools\Enumerable\UserRole;

class UserSeeder extends AbstractSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
    }
}
