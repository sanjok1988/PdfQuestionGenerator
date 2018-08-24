<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionTableSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        $permission = [

        	[

        		'name' => 'role-list',

        		'display_name' => 'Display Role Listing',

        		'description' => 'See only Listing Of Role'

        	],

        	[

        		'name' => 'role-create',

        		'display_name' => 'Create Role',

        		'description' => 'Create New Role'

        	],

        	[

        		'name' => 'role-edit',

        		'display_name' => 'Edit Role',

        		'description' => 'Edit Role'

        	],

        	[

        		'name' => 'role-delete',

        		'display_name' => 'Delete Role',

        		'description' => 'Delete Role'

        	],

        	[

        		'name' => 'item-list',

        		'display_name' => 'Display Item Listing',

        		'description' => 'See only Listing Of Item'

        	],

        	[

        		'name' => 'item-create',

        		'display_name' => 'Create Item',

        		'description' => 'Create New Item'

        	],

        	[

        		'name' => 'item-edit',

        		'display_name' => 'Edit Item',

        		'description' => 'Edit Item'

        	],

        	[

        		'name' => 'item-delete',

        		'display_name' => 'Delete Item',

        		'description' => 'Delete Item'

        	],
          [

        		'name' => 'post-list',

        		'display_name' => 'Display post Listing',

        		'description' => 'See only Listing Of post'

        	],

        	[

        		'name' => 'post-create',

        		'display_name' => 'Create post',

        		'description' => 'Create New post'

        	],

        	[

        		'name' => 'post-edit',

        		'display_name' => 'Edit post',

        		'description' => 'Edit post'

        	],

        	[

        		'name' => 'post-delete',

        		'display_name' => 'Delete post',

        		'description' => 'Delete post'

        	],
          [

        		'name' => 'slider-list',

        		'display_name' => 'Display Slider Listing',

        		'description' => 'See only Listing Of Slider'

        	],

        	[

        		'name' => 'slider-create',

        		'display_name' => 'Create Slider',

        		'description' => 'Create New Slider'

        	],

        	[

        		'name' => 'slider-edit',

        		'display_name' => 'Edit Slider',

        		'description' => 'Edit Slider'

        	],

        	[

        		'name' => 'slider-delete',

        		'display_name' => 'Delete Slider',

        		'description' => 'Delete Slider'

        	],

			[

				'name' => 'album-list',

				'display_name' => 'Display album Listing',

				'description' => 'See only Listing Of album'

			],

			[

				'name' => 'album-create',

				'display_name' => 'Create album',

				'description' => 'Create New album'

			],

			[

				'name' => 'album-edit',

				'display_name' => 'Edit album',

				'description' => 'Edit album'

			],

			[

				'name' => 'album-delete',

				'display_name' => 'Delete album',

				'description' => 'Delete album'

			],
			[

				'name' => 'ads-list',

				'display_name' => 'Display ads Listing',

				'description' => 'See only Listing Of ads'

			],

			[

				'name' => 'ads-create',

				'display_name' => 'Create ads',

				'description' => 'Create New ads'

			],

			[

				'name' => 'ads-edit',

				'display_name' => 'Edit ads',

				'description' => 'Edit ads'

			],

			[

				'name' => 'ads-delete',

				'display_name' => 'Delete ads',

				'description' => 'Delete ads'

			],
			[

				'name' => 'team-list',

				'display_name' => 'Display team Listing',

				'description' => 'See only Listing Of team'

			],

			[

				'name' => 'team-create',

				'display_name' => 'Create team',

				'description' => 'Create New team'

			],

			[

				'name' => 'team-edit',

				'display_name' => 'Edit team',

				'description' => 'Edit team'

			],

			[

				'name' => 'team-delete',

				'display_name' => 'Delete team',

				'description' => 'Delete team'

			],
			[

				'name' => 'schedule-list',

				'display_name' => 'Display schedule Listing',

				'description' => 'See only Listing Of schedule'

			],

			[

				'name' => 'schedule-create',

				'display_name' => 'Create schedule',

				'description' => 'Create New schedule'

			],

			[

				'name' => 'schedule-edit',

				'display_name' => 'Edit schedule',

				'description' => 'Edit schedule'

			],

			[

				'name' => 'schedule-delete',

				'display_name' => 'Delete schedule',

				'description' => 'Delete schedule'

			],
			[

				'name' => 'program-list',

				'display_name' => 'Display program Listing',

				'description' => 'See only Listing Of program'

			],

			[

				'name' => 'program-create',

				'display_name' => 'Create program',

				'description' => 'Create New program'

			],

			[

				'name' => 'program-edit',

				'display_name' => 'Edit program',

				'description' => 'Edit program'

			],

			[

				'name' => 'program-delete',

				'display_name' => 'Delete program',

				'description' => 'Delete program'

			],
			[

				'name' => 'rj-list',

				'display_name' => 'Display rj Listing',

				'description' => 'See only Listing Of rj'

			],

			[

				'name' => 'rj-create',

				'display_name' => 'Create rj',

				'description' => 'Create New rj'

			],

			[

				'name' => 'rj-edit',

				'display_name' => 'Edit rj',

				'description' => 'Edit rj'

			],

			[

				'name' => 'rj-delete',

				'display_name' => 'Delete rj',

				'description' => 'Delete rj'

			],
			[

				'name' => 'page-list',

				'display_name' => 'Display page Listing',

				'description' => 'See only Listing Of page'

			],

			[

				'name' => 'page-create',

				'display_name' => 'Create page',

				'description' => 'Create New page'

			],

			[

				'name' => 'page-edit',

				'display_name' => 'Edit page',

				'description' => 'Edit page'

			],

			[

				'name' => 'page-delete',

				'display_name' => 'Delete page',

				'description' => 'Delete page'

			],


        ];


        foreach ($permission as $key => $value) {

        	Permission::create($value);

        }

    }

}
