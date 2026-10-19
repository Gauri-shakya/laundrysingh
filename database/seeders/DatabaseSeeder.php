<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@laundrysingh.com',
            'password' => bcrypt('Password123'),
            'role' => 'admin',
            'phone' => '+919289891258',
            'status' => 'active',
            'employee_id' => 'ADM-001',
        ]);

        // Seed Customer User
        User::create([
            'name' => 'Rahul Sharma',
            'email' => 'customer@laundrysingh.com',
            'password' => bcrypt('Password123'),
            'role' => 'customer',
            'phone' => '9876543210',
            'address' => 'H.No. 42, Sector 15, Vasundhara',
            'pincode' => '201012',
            'status' => 'active',
            'employee_id' => 'CUST-001',
        ]);

        // Seed Services
        $services = [];
        $index = 1;

        // 1. Dry Cleaning - Men's
        $mensDry = [
            'Shirt/T-Shirt' => '110',
            'Trouser/Jeans' => '110/115',
            'Coat' => '280',
            'Long Coat' => '520',
            'Suit 2/3 pcs' => '345/455',
            'Kurta/Pyjama Plain' => '120/85',
            'Kurta/Pyjama heavy' => '185/130',
            'Achkan' => '640',
            'Shorts' => '70',
            'Jacket Full/Half Sleeves' => '360/280',
            'Sweater Full/Half Sleeves' => '305/240',
            'Sweatshirt' => '290',
            'Waist Coat/Nehru Jacket' => '155',
            'Track Suit' => '160',
            'Dhoti' => '115',
            'Leather Jacket' => '799',
        ];
        foreach ($mensDry as $name => $price) {
            $services[] = [
                'name' => $name,
                'category' => 'dry_cleaning_mens',
                'price' => $price,
                'is_active' => true,
                'sort_order' => $index++
            ];
        }

        // 2. Steam Iron - Men's / General
        $mensIron = [
            'Shirt/T-Shirt' => '45',
            'Trouser/Jeans' => '50/65',
            'Coat' => '140',
            'Long Coat' => '190',
            'Suit 2/3 pcs' => '190/275',
            'Kurta/Pyjama Plain' => '50/40',
            'Kurta/Pyjama heavy' => '65/60',
            'Achkan' => '230',
            'Shorts' => '35',
            'Jacket Full/Half Sleeves' => '130/105',
            'Sweater Full/Half Sleeves' => '105/80',
            'Sweatshirt' => '105',
            'Waist Coat/Nehru Jacket' => '95',
            'Track Suit' => '90',
            'Dhoti' => '65',
            'Leather Jacket' => '320',
        ];
        $index = 1;
        foreach ($mensIron as $name => $price) {
            $services[] = [
                'name' => $name,
                'category' => 'steam_iron_mens',
                'price' => $price,
                'is_active' => true,
                'sort_order' => $index++
            ];
        }

        // 3. Dry Cleaning - Women's
        $womensDry = [
            'Kurta Plain/heavy' => '120/190',
            'Salwar/Plazo' => '140',
            'Dupatta Plain/heavy' => '100/140',
            'Saree Plain/Heavy' => '230/300',
            'Blouse Plain/Heavy' => '90/120',
            'Dress Short/Long' => '280/380',
            'Top Plain/heavy' => '95/190',
            'Lehenga' => '800',
            'Choli' => '180',
            'Lancha' => '640',
            'Skirt Short/long' => '160/230',
            'Shawl Plain/pashmina' => '160/360',
            'Dungree/Jumpsuit' => '210',
            'Nighty/Gown' => '135',
            'Stole' => '115',
            'Suit Plain/Heavy' => '170/260',
            'Sharara Plain/heavy' => '150/230',
            'Legging' => '80',
        ];
        $index = 1;
        foreach ($womensDry as $name => $price) {
            $services[] = [
                'name' => $name,
                'category' => 'dry_cleaning_womens',
                'price' => $price,
                'is_active' => true,
                'sort_order' => $index++
            ];
        }

        // 4. Steam Iron - Women's
        $womensIron = [
            'Kurta Plain/heavy' => '40/65',
            'Salwar/Plazo' => '50',
            'Dupatta Plain/heavy' => '40/60',
            'Saree Plain/Heavy' => '90/105',
            'Blouse Plain/Heavy' => '35/45',
            'Dress Short/Long' => '110/135',
            'Top Plain/heavy' => '40/55',
            'Lehenga' => '280',
            'Choli' => '95',
            'Lancha' => '260',
            'Skirt Short/long' => '55/90',
            'Shawl Plain/pashmina' => '80/160',
            'Dungree/Jumpsuit' => '120',
            'Nighty/Gown' => '75',
            'Stole' => '65',
            'Suit Plain/Heavy' => '80/115',
            'Sharara Plain/heavy' => '75/105',
            'Legging' => '40',
        ];
        $index = 1;
        foreach ($womensIron as $name => $price) {
            $services[] = [
                'name' => $name,
                'category' => 'steam_iron_womens',
                'price' => $price,
                'is_active' => true,
                'sort_order' => $index++
            ];
        }

        // 5. Dry Cleaning - Kid's
        $kidsDry = [
            'Shirt/T-Shirt' => '95',
            'Trouser/Jeans' => '90/105',
            'Coat' => '235',
            'Suit 2/3 pcs' => '280/360',
            'Kurta/Pyjama' => '120/85',
            'Achkan' => '399',
            'Shorts' => '50',
            'Jacket Full/Half Sleeves' => '280/200',
            'Sweater Full/Half Sleeves' => '220/160',
            'Sweatshirt' => '235',
            'Waist Coat/Nehru Jacket' => '120',
            'Track Suit' => '120',
            'Leather Jacket' => '640',
        ];
        $index = 1;
        foreach ($kidsDry as $name => $price) {
            $services[] = [
                'name' => $name,
                'category' => 'dry_cleaning_kids',
                'price' => $price,
                'is_active' => true,
                'sort_order' => $index++
            ];
        }

        // 6. Steam Iron - Kid's
        $kidsIron = [
            'Shirt/T-Shirt' => '35',
            'Trouser/Jeans' => '40/60',
            'Coat' => '120',
            'Suit 2/3 pcs' => '160/240',
            'Kurta/Pyjama' => '50/40',
            'Achkan' => '160',
            'Shorts' => '35',
            'Jacket Full/Half Sleeves' => '105/90',
            'Sweater Full/Half Sleeves' => '80/65',
            'Sweatshirt' => '80',
            'Waist Coat/Nehru Jacket' => '75',
            'Track Suit' => '60',
            'Leather Jacket' => '235',
        ];
        $index = 1;
        foreach ($kidsIron as $name => $price) {
            $services[] = [
                'name' => $name,
                'category' => 'steam_iron_kids',
                'price' => $price,
                'is_active' => true,
                'sort_order' => $index++
            ];
        }

        // 7. Dry Cleaning - Home / Household
        $household = [
            'Curtain Door Plain/With Lining' => '200/315',
            'Window Plain/With lining' => '180/240',
            'Bed Sheet Single/Double' => '210/280',
            'Carpet' => '65/Sq Ft',
            'Blind' => '310+',
            'Towels' => '120',
            'Hand towels' => '50',
            'Cushion covers small/med/large' => '115/180/220',
            'Blanket Single 1/2 Ply' => '385/449',
            'Blanket Double 1/2 Ply' => '449/499',
            'Quilt Single/Double' => '419/480',
            'Duvet' => '240/349',
        ];
        $index = 1;
        foreach ($household as $name => $price) {
            $services[] = [
                'name' => $name,
                'category' => 'dry_cleaning_home',
                'price' => $price,
                'is_active' => true,
                'sort_order' => $index++
            ];
        }

        // 8. Laundry Services
        $laundry = [
            'Wash & Steam Iron' => '99/Kg',
            'Wash & Fold' => '69/Kg',
            'Priority Laundry' => '50/Kg Extra',
            'Stain removal' => '30rs per piece',
            'Fabric Softner' => 'Free',
            'Bleach' => 'Free',
            'Antiseptic wash' => 'Free',
        ];
        $index = 1;
        foreach ($laundry as $name => $price) {
            $services[] = [
                'name' => $name,
                'category' => 'laundry_services',
                'price' => $price,
                'is_active' => true,
                'sort_order' => $index++
            ];
        }

        // 9. Shoes & Leather
        $shoes = [
            'Sports' => '440',
            'Canvas/Sneaker (Non-Leather)' => '440',
            'Leather' => '640',
            'Suede Leather' => '640',
            'Boots' => '799',
            'Handbag' => '960',
            'Canvass/Jute/Cloth' => '635',
            'Handbag Leather' => '1599',
            'Suit Case' => '799',
            'Wallet' => '479',
        ];
        $index = 1;
        foreach ($shoes as $name => $price) {
            $services[] = [
                'name' => $name,
                'category' => 'dry_cleaning_shoes',
                'price' => $price,
                'is_active' => true,
                'sort_order' => $index++
            ];
        }

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
