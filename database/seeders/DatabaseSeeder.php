<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesTableSeeder::class,
            StatusSeeder::class,
            PrioritySeeder::class,
            CategorySeeder::class]);

        //create users
        $users = User::factory(10)->create();

        //get roles by name
        $adminRole = Role::where('name', 'admin')->first();
        $agentRole = Role::where('name', 'agent')->first();
        $customerRole = Role::where('name', 'customer')->first();

        //assign roles to users
        foreach($users as $user){
            //randomly assign roles to users
            if(rand(1, 3) == 1){
                $user->roles()->attach($adminRole);
            }elseif(rand(1, 3) == 2){
                $user->roles()->attach($agentRole);
            }else{
                $user->roles()->attach($customerRole);
            }
        }

        //create tickets
        Ticket::factory(10)->create();


    }
}
