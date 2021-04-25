<?php

return [


	// Application defaults
	'default' => [
		'current_page' => ['source' => 'query_string', 'key' => 'page'], // source: "query_string" or "route"
		'total_items' => 0,
		'items_per_page' => Kohana::$config->load('site')->per_page,
		'view' => 'pagination/limited',
		'auto_hide' => TRUE,
		'first_page_in_url' => FALSE,

        //NEW! Use limited template.
        'max_left_pages'    => 10,
        'max_right_pages'   => 10,
	],

];
