<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClubSeeder::class);
        $this->call(RaitingSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(FilterClubSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FeedbackSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(TicketSeeder::class);
        $this->call(OrderTicketSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(EventFilterSeeder::class);
        $this->call(PromoSeeder::class);
        $this->call(MembershipSeeder::class);
        $this->call(FaqSeeder::class);
    }
}
