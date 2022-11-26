<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LevelPoints;
use Illuminate\Support\Facades\Schema;

class levelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        LevelPoints::truncate();

        $level =  [
            [
              'level'=>'level1',
              'points' => 10,
              
            ],
            [
                'level'=>'level2',
              'points' => 9,
            ],
            [
                'level'=>'level3',
              'points' => 8,
            ],
            [
                'level'=>'level4',
              'points' => 7,
            ],
            [
                'level'=>'level5',
              'points' => 6,
            ],
            [
                'level'=>'level6',
              'points' => 5,
            ],
            [
                'level'=>'level7',
              'points' => 4,
            ],
            [
                'level'=>'level8',
              'points' => 3,
            ],
            [
                'level'=>'level9',
              'points' => 2,
            ],
            [
                'level'=>'level10',
              'points' => 1,
            ],
            [
                'level'=>'leveln',
              'points' => 0,
            ],
          ];

          LevelPoints::insert($level);
    }
}

