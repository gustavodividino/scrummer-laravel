<?php

use Illuminate\Database\Seeder;

class sc_skill extends Seeder {

    public function run() {
        $sc_skill = [
0=> ['name' => 'Microsoft Access','avatar' => 'acess_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
1=> ['name' => 'C/C++','avatar' => 'cpp_logo.jpg','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
2=> ['name' => '.Net','avatar' => 'dotnet_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
3=> ['name' => 'Microsoft Excel','avatar' => 'excel_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
4=> ['name' => 'Java','avatar' => 'java_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
5=> ['name' => 'MySQL','avatar' => 'mysql_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
6=> ['name' => 'Oracle','avatar' => 'oracle_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
7=> ['name' => 'PHP','avatar' => 'php-logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
8=> ['name' => 'Microsoft PowerPoint','avatar' => 'powerpoint_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
9=> ['name' => 'Microsoft Project','avatar' => 'project_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
10=> ['name' => 'Ruby','avatar' => 'ruby_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
11=> ['name' => 'Scrum','avatar' => 'scrum_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
12=> ['name' => 'ShellScript','avatar' => 'shellscript_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
13=> ['name' => 'Microsoft Word','avatar' => 'word_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
14=> ['name' => 'SQL Server','avatar' => 'sqlserver_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
15=> ['name' => 'Mongo DB','avatar' => 'mongodb_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
16=> ['name' => 'PostgreSQL','avatar' => 'PostgreSQL_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
17=> ['name' => 'Python','avatar' => 'python_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
18=> ['name' => 'JavaScript','avatar' => 'java_script.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
19=> ['name' => 'Delphi','avatar' => 'delphi_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
20=> ['name' => 'Perl','avatar' => 'pearl_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
21=> ['name' => 'Swift','avatar' => 'swift_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
22=> ['name' => 'Assembly','avatar' => '','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
23=> ['name' => 'Go','avatar' => '','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
24=> ['name' => 'R','avatar' => 'R_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
25=> ['name' => 'Visual Basic','avatar' => 'visualbasic_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
26=> ['name' => 'MATLAB','avatar' => 'matlab_logo.jpg','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
27=> ['name' => 'Objective-C','avatar' => 'objectiveC_logo.gif','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
28=> ['name' => 'RUP','avatar' => 'rup_logo.jpg','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
29=> ['name' => 'Agil','avatar' => 'agil_logo.png','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
30=> ['name' => 'PMP','avatar' => 'pmp_logo.jpg','created_at' => '2017-10-19','updated_at' => '2017-10-19',],
31=> ['name' => 'ITIL','avatar' => 'itil_logo.jpg','created_at' => '2017-10-19','updated_at' => '2017-10-19',],

            
        ];
        DB::table('sc_skill')->insert($sc_skill);
    }

}
