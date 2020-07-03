<?php

return [
    'adminEmail' => 'admin@example.com',
    'default' => [
        'name' => 'Maderan System',
        'photo' => 'img/maderanlogo.jpg',
        'profile' => 'img/profile.png'
    ],
    'people_status' => [
        'active' => 'Active',
        'in-active' => 'In-Active',
        'deleted' => 'Deleted',
        'complainant' => 'Complainant',
        'respondent' => 'Respondent'
    ],
    'is_rentable' => [
        'No',
        'Yes'
    ],
    'archive_reason' => [
        'Out of Stack',
        'Lost',
        'Damage',
        'Stolen',
    ],
    'rentable' => [
    	'<label class="label label-danger">No</label>',
    	'<label class="label label-success">Yes</label>'
    ],

    'actions' => ['index', 'create', 'view', 'update', 'delete'],

    '_status' => [
        '' => '',
        'active' => 'Active',
        'In-active' => 'In-active',
        'reserved' => 'Reserved',
        'returned' => 'Returned',
    ],

    'status' => [
        '' => '',
    	'active' => '<label class="label label-success">Active</label>',
        'In-active' => '<label class="label label-danger">In-active</label>',
        'reserved' => '<label class="label label-primary">Reserved</label>',
    	'returned' => '<label class="label label-info">Returned</label>',
    ],
    
    'uploadPath' => 'resources/src/uploads/',

    'certificates' => [
        '' => 'Select Certificates',
        'brgy_clearance' => 'Certification of Barangay Clearance',
        'business_clearance' => 'Certification of Business Clearance',
        'business_closure' => 'Certification of Business Closure',
        'delayed_registration' => 'Certification of Delayed Registration of Live Birth',
        'employment' => 'Certification of Employment',
        'indigency' => 'Certification of Indigency',
        'live_in_partners' => 'Certification of Live in Partners',
        'marriage' => 'Certification of Marriage',
        'no_business' => 'Certification of No or Existing Business',
        'parcel_of_land' => 'Certification of Parcel of Land',
        'residency' => 'Certification of Residency',
    ],

    'civil_status' => [
        'single' => 'Single',
        'married' => 'Married',
        'widowed' => 'Widowed',
        'engage' => 'Engaged'
    ],

    'nature_of_case' => [
        1 => 'Criminal 3a',
        2 => 'Civil 3b',
        3 => 'Others 3c'
    ],

    'action_taken' => [
        1 => 'Mediated 4a',
        2 => 'Concillated 4b',
        3 => 'Arbitrated 4c',
        4 => 'Dismissed 4d',
        5 => 'Certified Case 4e'
    ],

    'remarks' => [
        1 => 'Pending',
        2 => 'On Going',
        3 => 'Settled',
        4 => 'File to Action',
        5 => 'Resolve Issue'
    ],

    'user_type' => [
        'secretary' => 'Secretary',
        'staff'     => 'Barangay Staff',
        'head'      => 'Barangay Head',
        'midwife'   => 'Midwife',
    ],

    'family_position' => [
        0 => 'Parent',
        1 => 'Child',
    ],


    'relationships' => [
        'spouse' => 'Spouse', 
        'mother' => 'Mother', 
        'father' => 'Father',
        'brother' => 'Brother',
        'sister' => 'Sister',
        'neighbor' => 'Neighbor',
        'friend' => 'Friend',
        'son' => 'Son',
        'daughter' => 'Daughter',
    ],
    'position' => [
        'family' => [
            'parent' => 'Parent',
            'child' => 'Child',
        ],
        'official' => [
            'captain' => 'Barangay Captain',
            'secretary' => 'Barangay Secretary',
            'treasurer' => 'Treasurer',
            'sb_member' => 'SB Member',
            'sk_chairman' => 'SK Chairman',
        ]
    ],

    'purpose' => [
        'school_requirement' => 'School Requirement',
        '4Ps_requirement' => '4Ps Requirement',
        'financial_assistant' => 'Financial Assistant',
        'employment' => 'Employment',
    ],
    'menus' => [
        [
            'label' => 'Dashboard',
            'icon' => 'fa fa-tachometer',
            'route' => ['dashboard/index']
        ],

        [
            'label' => 'Peoples',
            'icon' => 'fa fa-group',
            'route' => '#',
            'sub' => [
                [
                    'label' => 'Resident',
                    'icon' => 'fa fa-user',
                    'route' => ['people/index']
                ],
                [
                    'label' => 'Archive',
                    'icon' => 'fa fa-info-circle',
                    'route' => ['people/not-resident']
                ]

            ]
        ],

        [
            'label' => 'Blotter',
            'icon' => 'fa fa-book',
            'route' => ['blotter/index']
        ],

        [
            'label' => 'Certificates',
            'icon' => 'fa fa-certificate',
            'route' => ['certificate/index']
        ],

        [
            'label' => 'Reservation',
            'icon' => 'fa fa-calendar',
            'route' => ['reservation/index']
        ],


        [
            'label' => 'About Us',
            'icon' => 'fa fa-gear',
            'route' => '#',
            'sub' => [
                [
                    'label' => 'General',
                    'icon' => 'fa fa-globe',
                    'route' => ['about/index']
                ],
                [
                    'label' => 'Officials',
                    'icon' => 'fa fa-info-circle',
                    'route' => ['official/index']
                ],
                [
                    'label' => 'History',
                    'icon' => 'fa fa-book',
                    'route' => ['history/index']
                ],
                [
                    'label' => 'Achievement',
                    'icon' => 'fa fa-trophy',
                    'route' => ['achievement/index']
                ]

            ]
        ],
        [
            'label' => 'Settings',
            'icon' => 'fa fa-map',
            'route' => '#',
            'sub' => [
                [
                    'label' => 'Places',
                    'icon' => 'fa fa-image',
                    'route' => ['place/index']
                ],
                [
                    'label' => 'Blocks',
                    'icon' => 'fa fa-bookmark',
                    'route' => ['block/index']
                ],
                [
                    'label' => 'Lots',
                    'icon' => 'fa fa-home',
                    'route' => ['lot/index']
                ],
                [
                    'label' => 'Streets',
                    'icon' => 'fa fa-road',
                    'route' => ['street/index']
                ],
                [
                    'label' => 'Nature of Cases',
                    'icon' => 'fa fa-cog',
                    'route' => ['nature-of-cases/index']
                ]

            ]
        ],


        [
            'label' => 'Inventory',
            'icon' => 'fa fa-dropbox',
            'route' => '#',
            'sub' => [
                [
                    'label' => 'Equipment Category',
                    'icon' => 'fa fa-shopping-cart',
                    'route' => ['equipment-category/index']
                ],
                [
                    'label' => 'Equipments',
                    'icon' => 'fa fa-shopping-cart',
                    'route' => ['equipment/index']
                ],
                [
                    'label' => 'Medicine',
                    'icon' => 'fa fa-medkit',
                    'route' => ['medicine/index']
                ],
                [
                    'label' => 'Medicine Distribution',
                    'icon' => 'fa fa-medkit',
                    'route' => ['distribution/index']
                ],
                [
                    'label' => 'Medicine Category',
                    'icon' => 'fa fa-medkit',
                    'route' => ['medicine-category/index']
                ],
                [
                    'label' => 'Unit of Measurement',
                    'icon' => 'fa fa-rocket',
                    'route' => ['unit/index']
                ]

            ]
        ],
        [
            'label' => 'Identification Card',
            'icon' => 'fa fa-credit-card',
            'route' => ['people/card']
        ],

        [
            'label' => 'Users',
            'icon' => 'fa fa-user',
            'route' => ['user/index']
        ],

        [
            'label' => 'Roles',
            'icon' => 'fa fa-gear',
            'route' => ['role/index']
        ],

    ]

];
