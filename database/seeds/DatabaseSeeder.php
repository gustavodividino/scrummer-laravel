<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $this->call('sc_taskboard_log');
        $this->call('sc_achivement');
        $this->call('sc_achivement_profile');
        $this->call('sc_daily');
        $this->call('sc_experience_profile');
        $this->call('sc_level');
        $this->call('sc_position');
        $this->call('sc_productbacklog_user');
        $this->call('sc_productbacklog');
        $this->call('sc_profile');
        $this->call('sc_project');
        $this->call('sc_rank');
        $this->call('sc_skill');
        $this->call('sc_skill_profile');
        $this->call('sc_social');
        $this->call('sc_social_profile');
        $this->call('sc_sprint');
        $this->call('sc_sprint_productbacklog');
        $this->call('sc_status');
        $this->call('sc_taskboard_level');
        $this->call('sc_team_project');
        $this->call('sc_user');
        $this->call('sc_experience');
        
    }

}
