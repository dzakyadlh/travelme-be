<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\HotelFacility;
use App\Models\HotelGallery;
use App\Models\HotelReview;
use App\Models\HotelRoom;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([

            'name' => 'Zeta',
            'email' => 'test@example.com',
            'password' => 'test1234',
            'photo_url' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/user_pp%2Fyunli.png?alt=media&token=88bb76f4-b6dd-4fef-8cb1-8346440ef621',

        ]);
        User::factory()->create([
            'name' => 'Zizi',
            'email' => 'test3@example.com',
            'password' => 'test1234',
            'photo_url' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/user_pp%2Fzee.png?alt=media&token=07e9aaf1-14fe-4bd2-8969-8541b9a8561f',
        ]);
        User::factory()->create([
            'name' => 'Song',
            'email' => 'test4@example.com',
            'password' => 'test1234',
            'photo_url' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/user_pp%2Fsong.jpg?alt=media&token=21c9e0e2-0960-44ef-a8cb-2d43281d7e94',
        ]);
        User::factory()->create([
            'name' => 'Rey',
            'email' => 'test5@example.com',
            'password' => 'test1234',
            'photo_url' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/user_pp%2Fryan.jpg?alt=media&token=e74d1948-74a7-4c93-aba0-4adf22acd917',
        ]);

        HotelFacility::create(['name' => 'Free Wi-Fi', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/icons%2Fwifi.png?alt=media&token=dbed9e95-023f-48e5-bb4a-839e61a00efb',]);
        HotelFacility::create(['name' => 'Swimming Pool', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/icons%2Fswimming_pool.png?alt=media&token=75c46a99-790f-4093-b03a-25627656326e',]);
        HotelFacility::create(['name' => 'Fitness Center', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/icons%2Fgym.png?alt=media&token=ba3870b3-29c1-4a66-bd50-feda6b7c002d',]);
        HotelFacility::create(['name' => 'Spa', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/icons%2Fcandle.png?alt=media&token=e1b08200-36f9-4c7a-b491-fb2a9e31b55c',]);
        HotelFacility::create(['name' => 'Restaurant', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/icons%2Frestaurant.png?alt=media&token=ddb964ba-ed30-46c1-87bd-f3db1311103f',]);
        HotelFacility::create(['name' => '24-Hour Reception', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/icons%2Freceptionist.png?alt=media&token=79cc45d5-15db-4b0a-9726-17ab2b543e21',]);
        HotelFacility::create(['name' => 'Parking', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/icons%2Fcar.png?alt=media&token=be228058-185b-4307-b525-eacaaec748af',]);
        HotelFacility::create(['name' => 'Room Service', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/icons%2Fbutler.png?alt=media&token=b164bf43-f7e1-44ea-b34a-c1bbd98cf248',]);
        HotelFacility::create(['name' => 'Ballroom', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/icons%2Flotus.png?alt=media&token=3d445d43-5529-4e2f-9e78-b0a4b15e0df5',]);
        HotelFacility::create(['name' => 'Breakfast', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/icons%2Fbreakfast.png?alt=media&token=16a7e030-a629-410c-99f1-5141306f27cd',]);
        HotelFacility::create(['name' => 'Laundry', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/icons%2Flaundry.png?alt=media&token=7b448764-0def-43fa-ba75-ee4451aa7269',]);


        Hotel::create([
            'name' => 'Four Points by Sheraton Surabaya',
            'description' => 'Stay at Four Points by Sheraton Surabaya, connected to the city\'s largest shopping mall. Enjoy city views, 24/7 gym access, Indonesian cuisine, and easy access to attractions. Perfect for two travelers seeking convenience and culture. This property in Surabaya Center offers a vibrant neighborhood vibe with easy access to shopping malls, local markets, and cultural landmarks. Enjoy a delicious breakfast in bed, dip in the pool, or unwind with a massage. Air-conditioned rooms feature Wi-Fi, a safety deposit box, and luxurious toiletries. Some rooms offer city views. Walking distance to Tunjungan Plaza, Monkasel, and Grand City Surabaya, make it an ideal base for two travelers seeking a captivating and convenient stay.',
            'location' => 'JL. Embong Malang 25-31, Surabaya Center, Surabaya, Indonesia, 60261',
            'rating' => 9.2,
        ]);

        HotelGallery::create([
            'url' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/hotel_gallery%2Ffourpoints1.jpg?alt=media&token=526f3ae6-956e-4d59-b866-ec7f6d12a0d0',
            'hotel_id' => 1,
        ]);

        HotelGallery::create([
            'url' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/hotel_gallery%2Ffourpoints2.jpg?alt=media&token=408ec512-df96-451a-9fea-ed71587807be',
            'hotel_id' => 1,
        ]);
        HotelGallery::create([
            'url' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/hotel_gallery%2Ffourpoints3.png?alt=media&token=82499afd-e54f-4fa3-8fb5-9c54d6e54ac2',
            'hotel_id' => 1,
        ]);
        HotelGallery::create([
            'url' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/hotel_gallery%2Ffourpoints4.jpg?alt=media&token=39e11999-6258-4e5d-859c-ddcdc8a6c7be',
            'hotel_id' => 1,
        ]);
        HotelGallery::create([
            'url' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/hotel_gallery%2Ffourpoints5.png?alt=media&token=71d17b08-a131-48f6-8506-88224069db16',
            'hotel_id' => 1,
        ]);
        HotelGallery::create([
            'url' => 'https://firebasestorage.googleapis.com/v0/b/travelme-b3805.appspot.com/o/hotel_gallery%2Ffourpoints6.jpg?alt=media&token=fd3199de-1464-48a9-b5f7-a0e7e1f3700c',
            'hotel_id' => 1,
        ]);

        HotelReview::create([
            'comment' => 'Amazing place to stay! Will be back next year!',
            'rating' => 9.5,
            'hotel_id' => 1,
            'user_id' => 2,
        ]);
        HotelReview::create([
            'comment' => 'Breakfast are delicious',
            'rating' => 9.1,
            'hotel_id' => 1,
            'user_id' => 3,
        ]);
        HotelReview::create([
            'comment' => 'Perfection!',
            'rating' => 10.0,
            'hotel_id' => 1,
            'user_id' => 4,
        ]);

        HotelRoom::create([
            'name' => '2 Double Beds',
            'price' => 88.64,
            'size' => 28,
            'bed' => '2 Full Bed',
            'max_guests' => 2,
            'is_refundable' => false,
            'hotel_id' => 1,
        ]);
        HotelRoom::create([
            'name' => '1 King Bed',
            'price' => 95.11,
            'size' => 28,
            'bed' => '1 King Bed',
            'max_guests' => 2,
            'is_refundable' => false,
            'hotel_id' => 1,
        ]);
        HotelRoom::create([
            'name' => '1 King Bed Premium',
            'price' => 121.00,
            'size' => 40,
            'bed' => '1 King Bed',
            'max_guests' => 2,
            'is_refundable' => false,
            'hotel_id' => 1,
        ]);
        HotelRoom::create([
            'name' => 'Suite 1 Bedroom',
            'price' => 146.88,
            'size' => 53,
            'bed' => '1 King Bed',
            'max_guests' => 2,
            'is_refundable' => false,
            'hotel_id' => 1,
        ]);
    }
}
