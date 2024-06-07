<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InspirationArticle;

class InspirationArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        InspirationArticle::create([
            'title' => 'A Rustic Country Wedding',
            'author' => 'Jane Doe',
            'description' => 'A beautiful rustic wedding set in the countryside.',
            'content' => 'Reisha Raney and Julian Doe have their mutual love of rollercoasters to thank for their first introduction. In May 2021, the two of them were visiting a local amusement park when they happened to cross paths. It turns out that the couple had more in common than just adrenaline-pumping rides. After nearly two years of dating, Julian proposed to Reisha on Valentine’s Day at a Lebanese restaurant.',
            'images' => json_encode([
                'https://www.brides.com/thmb/GT3W0Pd0Q54iwghmdTKSQPIkIwY=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/recirc-pink-orange-maryland-wedding-couple-portrait-hana-gonzales-0124-904b1fe2b1ab4ffd991bc0e216513edf.jpg',
                'https://www.brides.com/thmb/DfmI81OFE06_ToQIW48L_G9Rt3Q=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/2-pink-orange-maryland-wedding-invitations-hana-gonzales-0124-2ccf76ad78cf497ab047ebd387bc03bd.jpg',
                'https://www.brides.com/thmb/OtuHR6QRgxRUy7cLGbjXHApo1bU=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/6-pink-orange-maryland-wedding-bouquet-hana-gonzales-0124-e52bae9c5b47464888688bab0bee7844.jpg',
                // Add more image URLs as needed
            ]),
        ]);
    }

}
