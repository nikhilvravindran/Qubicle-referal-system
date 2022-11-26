<?php
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
   
class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // public function run()
    // {
    //     User::insert([
    //         [
    //             'name'=>'Admin',
    //             'email'=>'admin@gmail.com',
    //             'is_admin'=>'1',
    //             'password' => Hash::make($data['password'])
    //         ],
           

    
    // ]);
    // }
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
               'is_admin'=>'1',
               'password' => Hash::make('123456')
            ],
           
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}