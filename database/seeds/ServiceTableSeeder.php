<?php

use App\Models\Service;
use App\Models\ServicePricing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            //Mobile App
            [
                'category_id' => 1, 
                'name' => 'App Download (Standard)', 
                'service_type' => 'app', 
                'keyword_option' => 0, 
                'mode' => 'tracking',
                'app_icon' => 'download',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => 'android',
                        'pay_mode' => 'free',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.06',
                        'max_price' => '2',
                    ],
                    [
                        'service_mode' => 'tracking',
                        'platform' => 'android',
                        'pay_mode' => 'free',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.12',
                        'max_price' => '4',
                    ],
                    [
                        'service_mode' => 'standard',
                        'platform' => 'android',
                        'pay_mode' => 'paid',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.75',
                        'max_price' => '8',
                    ],
                    [
                        'service_mode' => 'tracking',
                        'platform' => 'android',
                        'pay_mode' => 'paid',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '1.50',
                        'max_price' => '16',
                    ],

                    //IOS
                    [
                        'service_mode' => 'standard',
                        'platform' => 'ios',
                        'pay_mode' => 'free',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.12',
                        'max_price' => '4',
                    ],
                    [
                        'service_mode' => 'tracking',
                        'platform' => 'ios',
                        'pay_mode' => 'free',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.24',
                        'max_price' => '8',
                    ],
                    [
                        'service_mode' => 'standard',
                        'platform' => 'ios',
                        'pay_mode' => 'paid',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '1.50',
                        'max_price' => '10',
                    ],
                    [
                        'service_mode' => 'tracking',
                        'platform' => 'ios',
                        'pay_mode' => 'paid',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '3',
                        'max_price' => '20',
                    ],
                ]
            ],
            [
                'category_id' => 1, 
                'name' => 'App Download (Keyword Search)', 
                'service_type' => 'app', 
                'keyword_option' => 1, 
                'mode' => 'tracking',
                'app_icon' => 'download',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => 'android',
                        'pay_mode' => 'free',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.06',
                        'max_price' => '2',
                    ],
                    [
                        'service_mode' => 'tracking',
                        'platform' => 'android',
                        'pay_mode' => 'free',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.12',
                        'max_price' => '4',
                    ],
                    [
                        'service_mode' => 'standard',
                        'platform' => 'android',
                        'pay_mode' => 'paid',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.75',
                        'max_price' => '8',
                    ],
                    [
                        'service_mode' => 'tracking',
                        'platform' => 'android',
                        'pay_mode' => 'paid',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '1.50',
                        'max_price' => '16',
                    ],

                    //IOS
                    [
                        'service_mode' => 'standard',
                        'platform' => 'ios',
                        'pay_mode' => 'free',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.12',
                        'max_price' => '4',
                    ],
                    [
                        'service_mode' => 'tracking',
                        'platform' => 'ios',
                        'pay_mode' => 'free',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.24',
                        'max_price' => '8',
                    ],
                    [
                        'service_mode' => 'standard',
                        'platform' => 'ios',
                        'pay_mode' => 'paid',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '1.50',
                        'max_price' => '10',
                    ],
                    [
                        'service_mode' => 'tracking',
                        'platform' => 'ios',
                        'pay_mode' => 'paid',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '3',
                        'max_price' => '20',
                    ],
                ]
            ],
            [
                'category_id' => 1, 
                'name' => 'App Testing', 
                'service_type' => 'app', 
                'keyword_option' => 0, 
                'mode' => 'tracking',
                'app_icon' => 'testing',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => 'android',
                        'pay_mode' => 'free',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.70',
                        'max_price' => '5',
                    ],
                    [
                        'service_mode' => 'tracking',
                        'platform' => 'android',
                        'pay_mode' => 'free',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '1.20',
                        'max_price' => '10',
                    ],
                    [
                        'service_mode' => 'standard',
                        'platform' => 'android',
                        'pay_mode' => 'paid',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '4',
                        'max_price' => '10',
                    ],
                    [
                        'service_mode' => 'tracking',
                        'platform' => 'android',
                        'pay_mode' => 'paid',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '5',
                        'max_price' => '20',
                    ],

                    //IOS
                    [
                        'service_mode' => 'standard',
                        'platform' => 'ios',
                        'pay_mode' => 'free',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '1',
                        'max_price' => '5',
                    ],
                    [
                        'service_mode' => 'tracking',
                        'platform' => 'ios',
                        'pay_mode' => 'free',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '2',
                        'max_price' => '10',
                    ],
                    [
                        'service_mode' => 'standard',
                        'platform' => 'ios',
                        'pay_mode' => 'paid',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '5',
                        'max_price' => '15',
                    ],
                    [
                        'service_mode' => 'tracking',
                        'platform' => 'ios',
                        'pay_mode' => 'paid',
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '15',
                        'max_price' => '30',
                    ],
                ]
            ],

            //Youtube
            [
                'category_id' => 2, 
                'name' => 'Subscribe', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'timing',
                'app_icon' => 'subscribe',
                'pricing' => [
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 45,
                        'min_price' => '0.01',
                        'max_price' => '0.25',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 90,
                        'min_price' => '0.015',
                        'max_price' => '0.35',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 150,
                        'min_price' => '0.02',
                        'max_price' => '0.50',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 300,
                        'min_price' => '0.025',
                        'max_price' => '0.65',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 450,
                        'min_price' => '0.03',
                        'max_price' => '0.80',
                    ]
                ]
            ],
            [
                'category_id' => 2, 
                'name' => 'View', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'timing',
                'app_icon' => 'view',
                'pricing' => [
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 45,
                        'min_price' => '0.0017',
                        'max_price' => '0.025',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 90,
                        'min_price' => '0.002',
                        'max_price' => '0.035',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 150,
                        'min_price' => '0.0025',
                        'max_price' => '0.050',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 300,
                        'min_price' => '0.003',
                        'max_price' => '0.065',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 450,
                        'min_price' => '0.0035',
                        'max_price' => '0.080',
                    ]
                ]
            ],
            [
                'category_id' => 2, 
                'name' => 'Like', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'timing',
                'app_icon' => 'like',
                'pricing' => [
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 45,
                        'min_price' => '0.01',
                        'max_price' => '0.25',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 90,
                        'min_price' => '0.015',
                        'max_price' => '0.35',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 150,
                        'min_price' => '0.02',
                        'max_price' => '0.50',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 300,
                        'min_price' => '0.025',
                        'max_price' => '0.65',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 450,
                        'min_price' => '0.03',
                        'max_price' => '0.80',
                    ]
                ]
            ],

            //Instagram
            [
                'category_id' => 3, 
                'name' => 'Follow', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'verify',
                'app_icon' => 'follow',
                'pricing' => [
                    [
                        'service_mode' => 'verify',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => 7,
                        'times' => null,
                        'min_price' => '0.01',
                        'max_price' => '0.25',
                    ],
                    [
                        'service_mode' => 'verify',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => 14,
                        'times' => null,
                        'min_price' => '0.015',
                        'max_price' => '0.35',
                    ],
                    [
                        'service_mode' => 'verify',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => 30,
                        'times' => null,
                        'min_price' => '0.02',
                        'max_price' => '0.50',
                    ]
                ]
            ],
            [
                'category_id' => 3, 
                'name' => 'Like', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'like',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.0017',
                        'max_price' => '0.025',
                    ]
                ]
            ],
            [
                'category_id' => 3, 
                'name' => 'Comment', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'comment',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.025',
                        'max_price' => '0.30',
                    ]
                ]
            ],

            //Facebook
            [
                'category_id' => 4, 
                'name' => 'Follow', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'verify',
                'app_icon' => 'follow',
                'pricing' => [
                    [
                        'service_mode' => 'verify',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => 7,
                        'times' => null,
                        'min_price' => '0.01',
                        'max_price' => '0.25',
                    ],
                    [
                        'service_mode' => 'verify',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => 14,
                        'times' => null,
                        'min_price' => '0.015',
                        'max_price' => '0.35',
                    ],
                    [
                        'service_mode' => 'verify',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => 30,
                        'times' => null,
                        'min_price' => '0.02',
                        'max_price' => '0.50',
                    ]
                ]
            ],
            [
                'category_id' => 4, 
                'name' => 'Page Like', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'verify',
                'app_icon' => 'like',
                'pricing' => [
                    [
                        'service_mode' => 'verify',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => 7,
                        'times' => null,
                        'min_price' => '0.01',
                        'max_price' => '0.25',
                    ],
                    [
                        'service_mode' => 'verify',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => 14,
                        'times' => null,
                        'min_price' => '0.015',
                        'max_price' => '0.35',
                    ],
                    [
                        'service_mode' => 'verify',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => 30,
                        'times' => null,
                        'min_price' => '0.02',
                        'max_price' => '0.50',
                    ]
                ]
            ],
            [
                'category_id' => 4, 
                'name' => 'Post Like', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'like',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.0017',
                        'max_price' => '0.025',
                    ]
                ]
            ],
            [
                'category_id' => 4, 
                'name' => 'Comments', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'comment',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.035',
                        'max_price' => '0.60',
                    ]
                ]
            ],
            [
                'category_id' => 4, 
                'name' => 'Post Shares', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'share',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.05',
                        'max_price' => '1',
                    ]
                ]
            ],

            //Twitter
            [
                'category_id' => 5, 
                'name' => 'Follow', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'verify',
                'app_icon' => 'follow',
                'pricing' => [
                    [
                        'service_mode' => 'verify',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => 7,
                        'times' => null,
                        'min_price' => '0.01',
                        'max_price' => '0.25',
                    ],
                    [
                        'service_mode' => 'verify',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => 14,
                        'times' => null,
                        'min_price' => '0.015',
                        'max_price' => '0.35',
                    ],
                    [
                        'service_mode' => 'verify',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => 30,
                        'times' => null,
                        'min_price' => '0.02',
                        'max_price' => '0.50',
                    ]
                ]
            ],
            [
                'category_id' => 5, 
                'name' => 'Like', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'like',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.004',
                        'max_price' => '0.025',
                    ]
                ]
            ],
            [
                'category_id' => 5, 
                'name' => 'Retweet', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'retweet',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.03',
                        'max_price' => '0.30',
                    ]
                ]
            ],

            //Podcast
            [
                'category_id' => 6, 
                'name' => 'Subscribe', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'subscribe',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.035',
                        'max_price' => '0.5',
                    ]
                ]
            ],
            [
                'category_id' => 6, 
                'name' => 'Listen', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'timing',
                'app_icon' => 'listen',
                'pricing' => [
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 60,
                        'min_price' => '0.008',
                        'max_price' => '0.04',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 150,
                        'min_price' => '0.015',
                        'max_price' => '0.10',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 450,
                        'min_price' => '0.028',
                        'max_price' => '0.25',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 900,
                        'min_price' => '0.05',
                        'max_price' => '0.50',
                    ]
                ]
            ],
            [
                'category_id' => 6, 
                'name' => 'Download', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'download',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.05',
                        'max_price' => '1',
                    ]
                ]
            ],
            [
                'category_id' => 6, 
                'name' => 'Testing', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'testing',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => 'ios',
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.30',
                        'max_price' => '3',
                    ]
                ]
            ],
            [
                'category_id' => 6, 
                'name' => 'Share', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'share',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.03',
                        'max_price' => '1.50',
                    ]
                ]
            ],

            //Google Music
            [
                'category_id' => 7, 
                'name' => 'Playlist Subscribe', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'subscribe',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.006',
                        'max_price' => '0.06',
                    ]
                ]
            ],
            [
                'category_id' => 7, 
                'name' => 'Music Play', 
                'service_type' => 'trackAlbumPlaylist', 
                'keyword_option' => 0, 
                'mode' => 'timing',
                'app_icon' => 'play',
                'pricing' => [
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 60,
                        'min_price' => '0.008',
                        'max_price' => '0.04',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 150,
                        'min_price' => '0.015',
                        'max_price' => '0.10',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 350,
                        'min_price' => '0.028',
                        'max_price' => '0.25',
                    ]
                ]
            ],
            [
                'category_id' => 7, 
                'name' => 'Music Download', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'download',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.70',
                        'max_price' => '5',
                    ]
                ]
            ],
            [
                'category_id' => 7, 
                'name' => 'Music Like', 
                'service_type' => 'trackAlbum', 
                'keyword_option' => 0, 
                'mode' => 'timing',
                'app_icon' => 'like',
                'pricing' => [
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 60,
                        'min_price' => '0.012',
                        'max_price' => '0.06',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 150,
                        'min_price' => '0.02',
                        'max_price' => '0.10',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 350,
                        'min_price' => '0.035',
                        'max_price' => '0.40',
                    ]
                ]
            ],
            [
                'category_id' => 7, 
                'name' => 'Music Share', 
                'service_type' => 'trackAlbumPlaylist', 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'share',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.03',
                        'max_price' => '1.5',
                    ]
                ]
            ],
            [
                'category_id' => 7, 
                'name' => 'Music Testing', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'testing',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.60',
                        'max_price' => '3',
                    ]
                ]
            ],
            
            //Apple Music
            [
                'category_id' => 8, 
                'name' => 'Playlist Subscribe', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'subscribe',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.006',
                        'max_price' => '0.06',
                    ]
                ]
            ],
            [
                'category_id' => 8, 
                'name' => 'Music Listen', 
                'service_type' => 'trackAlbumPlaylist', 
                'keyword_option' => 0, 
                'mode' => 'timing',
                'app_icon' => 'listen',
                'pricing' => [
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 60,
                        'min_price' => '0.008',
                        'max_price' => '0.04',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 150,
                        'min_price' => '0.015',
                        'max_price' => '0.10',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 350,
                        'min_price' => '0.028',
                        'max_price' => '0.25',
                    ]
                ]
            ],
            [
                'category_id' => 8, 
                'name' => 'Music Download', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'download',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.70',
                        'max_price' => '5',
                    ]
                ]
            ],
            [
                'category_id' => 8, 
                'name' => 'Music Like', 
                'service_type' => 'trackAlbum', 
                'keyword_option' => 0, 
                'mode' => 'timing',
                'app_icon' => 'like',
                'pricing' => [
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 60,
                        'min_price' => '0.012',
                        'max_price' => '0.06',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 150,
                        'min_price' => '0.02',
                        'max_price' => '0.10',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 350,
                        'min_price' => '0.035',
                        'max_price' => '0.40',
                    ]
                ]
            ],
            [
                'category_id' => 8, 
                'name' => 'Music Share', 
                'service_type' => 'trackAlbumPlaylist', 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'share',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.03',
                        'max_price' => '1.5',
                    ]
                ]
            ],
            [
                'category_id' => 8, 
                'name' => 'Music Testing', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'testing',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.60',
                        'max_price' => '3',
                    ]
                ]
            ],
            
            //Spotify
            [
                'category_id' => 9, 
                'name' => 'Follow', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'follow',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.003',
                        'max_price' => '0.02',
                    ]
                ]
            ],
            [
                'category_id' => 9, 
                'name' => 'Play', 
                'service_type' => 'trackAlbumPlaylist', 
                'keyword_option' => 0, 
                'mode' => 'timing',
                'app_icon' => 'play',
                'pricing' => [
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 60,
                        'min_price' => '0.0017',
                        'max_price' => '0.02',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 150,
                        'min_price' => '0.0025',
                        'max_price' => '0.025',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 350,
                        'min_price' => '0.003',
                        'max_price' => '0.03',
                    ]
                ]
            ],
            [
                'category_id' => 9, 
                'name' => 'Like', 
                'service_type' => 'trackAlbum', 
                'keyword_option' => 0, 
                'mode' => 'timing',
                'app_icon' => 'like',
                'pricing' => [
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 60,
                        'min_price' => '0.006',
                        'max_price' => '0.06',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 150,
                        'min_price' => '0.008',
                        'max_price' => '0.08',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 350,
                        'min_price' => '0.01',
                        'max_price' => '0.10',
                    ]
                ]                
            ],
            
            //Tidal
            [
                'category_id' => 10, 
                'name' => 'Follow', 
                'service_type' => null, 
                'keyword_option' => 0, 
                'mode' => 'standard',
                'app_icon' => 'follow',
                'pricing' => [
                    [
                        'service_mode' => 'standard',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => null,
                        'min_price' => '0.012',
                        'max_price' => '0.12',
                    ]
                ]
            ],
            [
                'category_id' => 10, 
                'name' => 'Play', 
                'service_type' => 'trackAlbumPlaylist', 
                'keyword_option' => 0, 
                'mode' => 'timing',
                'app_icon' => 'play',
                'pricing' => [
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 60,
                        'min_price' => '0.0045',
                        'max_price' => '0.045',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 150,
                        'min_price' => '0.008',
                        'max_price' => '0.08',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 350,
                        'min_price' => '0.012',
                        'max_price' => '0.12',
                    ]
                ]
            ],
            [
                'category_id' => 10, 
                'name' => 'Like', 
                'service_type' => 'trackAlbum', 
                'keyword_option' => 0, 
                'mode' => 'timing',
                'app_icon' => 'like',
                'pricing' => [
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 60,
                        'min_price' => '0.012',
                        'max_price' => '0.12',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 150,
                        'min_price' => '0.018',
                        'max_price' => '0.18',
                    ],
                    [
                        'service_mode' => 'timing',
                        'platform' => null,
                        'pay_mode' => null,
                        'required_days' => null,
                        'times' => 350,
                        'min_price' => '0.024',
                        'max_price' => '0.24',
                    ]
                ]
            ],
        ];
        
        foreach ($array as $val) {

            if (isset($val['pricing'])) {
                $pricing = $val['pricing'];
                unset($val['pricing']);
            }
            $service = Service::create($val);
            if (isset($pricing)) {
                $priceArr = [];
                foreach ($pricing as $v) {
                    $data = $v;
                    $data['service_id'] = $service->id;

                    $priceArr[] = $data;
                }
                ServicePricing::insert($priceArr);
            }
        }
    }
}
