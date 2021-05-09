<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cds')->insert([
            [
            'cd_id' => 1,
            'title' => 'Animals',
            'description' => 'Animals is the tenth studio album by the English rock band Pink Floyd, released on 21 January 1977[2] through Harvest and Columbia Records. It was recorded at the ban`s Britannia Row Studios in London throughout 1976, and was produced by the band. The album continues the longform compositions that made up their previous works, including Wish You Were Here (1975). The album received positive reviews from critics and was commercially successful, reaching number 2 in the UK and number 3 in the USA',
            'duration' => 41,
            'cost' => 400,
            'release_date' => '1977-01-21',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
            ],
            [
            'cd_id' => 2,
            'title' => 'The Dark Side of the Moon',
            'description' => 'The Dark Side of the Moon is the eighth studio album by the English rock band Pink Floyd, released on 1 March 1973 by Harvest Records. Primarily developed during live performances, the band premiered an early version of the record several months before recording began. The record was conceived as an album that focused on the pressures faced by the band during their arduous lifestyle, and dealing with the apparent mental health problems suffered by former band member Syd Barrett, who departed the group in 1968. New material was recorded in two sessions in 1972 and 1973 at Abbey Road Studios in London. ',
            'duration' => 43,
            'cost' => 600,
            'release_date' => '1973-03-01',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
            ],
            [
            'cd_id' => 3,
            'title' => 'The Wall',
            'description' => 'The Wall is the eleventh studio album by the English rock band Pink Floyd, released on 30 November 1979 by Harvest and Columbia Records. It is a rock opera that explores Pink, a jaded rock star whose eventual self-imposed isolation from society forms a figurative wall. The album was a commercial success, topping the US charts for 15 weeks, and reaching number three in the UK. It initially received mixed reviews from critics, many of whom found it overblown and pretentious, but later received accolades as one of the greatest albums of all time and one of the band’s finest works.',
            'duration' => 81,
            'cost' => 700,
            'release_date' => '1979-11-30',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
            ],
            [
            'cd_id' => 4,
            'title' => 'Amarte Es un Placer (album)',
            'description' => 'Amarte Es un Placer (transl. Loving You Is a Pleasure)[1] is the thirteenth studio album by Mexican singer Luis Miguel. It was released by WEA Latina on 13 September 1999. Produced by Miguel, it is a pop album with R&B and jazz influences. Miguel was more involved with the songwriting on this record than on earlier albums and was assisted by composers including Arturo Pérez, Armando Manzanero, and Juan Carlos Calderón. Despite the popularity of his contemporaries Ricky Martin and Enrique Iglesias who crossed over to the English-language market, Miguel preferred to sing and record in Spanish at the time. ',
            'duration' => 41,
            'cost' => 050,
            'release_date' => '1999-09-13',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
            ],
            [
            'cd_id' => 5,
            'title' => 'Songs About Jane ',
            'description' => 'Songs About Jane is the debut studio album by American pop rock band Maroon 5. The album was released on June 25, 2002 by Octone and J Records. It became a sleeper hit with the help of five singles that attained chart success, including the Billboard hit "Harder to Breathe" and international hits "This Love" and "She Will Be Loved".

            The album was re-released on October 14, 2003, becoming a huge international commercial and critical success. It topped the album charts in Australia, France, New Zealand, the Republic of Ireland and the United Kingdom, and reached the top-ten in 17 other countries. At the end of 2004, the album reached the top-ten of the US Billboard 200 chart. It had sold nearly 2.7 million copies by the end of 2004, and over 5.1 million copies in the U.S. by August 2015.[5] It has sold over 10 million copies worldwide as of 2007.[6]
            
            On June 5, 2012, the band released the album`s 10th anniversary edition, to coincide with their fourth studio album Overexposed.[7] ',
            'duration' => 47,
            'cost' => 150,
            'release_date' => '2002-01-25',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
            ],

        ]);
    }
}
