<?php//Site Nav menu config array.$config['site_nav'] = array(	array(		'title' => '首页',		'uri' 	=> 'home/index',		'sub'	=> array(			array(				'title' => '首页',				'uri' 	=> 'home/index'			),		)	),	array(		'title' => '管理员列表',		'uri' 	=> 'admin_user/index',		'sub'	=> array(			array(				'title' => '修改密码',				'uri' 	=> 'admin_user/password',			),		)	),	array(		'title' => '用户管理',		'uri' 	=> 'user/index',		'sub'	=> array(			array(				'title' => '用户列表',				'uri' 	=> 'user/index',				'sub' => array(					array(						'title' => '编辑用户',						'uri' 	=> 'user/edit'					),					array(						'title' => '删除用户',						'uri' 	=> 'user/remove',					),				),			),			array(				'title' => '添加新用户',				'uri' 	=> 'user/add'			),			array(				'title' => '用户分组列表',				'uri' 	=> 'group/index',				'sub' => array(					array(						'title' => '添加新分组',						'uri' 	=> 'group/add'					),					array(						'title' => '编辑分组',						'uri' 	=> 'group/edit'					),					array(						'title' => '删除分组',						'uri' 	=> 'group/remove',					),				),			),		)	),	array(		'title' => '城市管理',		'uri' 	=> 'area/index',		'sub'	=> array(			array(				'title' => '城市列表',				'uri' 	=> 'area/index',				'sub' => array(					array(						'title' => '编辑城市',						'uri' 	=> 'area/edit'					),					array(						'title' => '删除城市',						'uri' 	=> 'area/remove',					),				),			),			array(				'title' => '添加城市',				'uri' 	=> 'area/add'			),		)	),	array(		'title' => '分类管理',		'uri' 	=> 'category/index',		'sub'	=> array(			array(				'title' => '分类分类',				'uri' 	=> 'category/index',				'sub' => array(					array(						'title' => '编辑分类',						'uri' 	=> 'category/edit'					),					array(						'title' => '删除分类',						'uri' 	=> 'category/remove',					),				),			),			array(				'title' => '新加分类',				'uri' 	=> 'category/add',			),		)	),	array(		'title' => 'Filter管理',		'uri' 	=> 'filter/index',		'sub'	=> array(			array(				'title' => '过滤器分类',				'uri' 	=> 'filter/index',				'sub' => array(					array(						'title' => '编辑过滤器',						'uri' 	=> 'filter/edit'					),					array(						'title' => '删除过滤器',						'uri' 	=> 'filter/remove',					),				),			),			array(				'title' => '添加过滤器',				'uri' 	=> 'filter/add',			),		)	),	array(		'title' => 'Meta管理',		'uri' 	=> 'meta/index',		'sub'	=> array(			array(				'title' => 'Meta分类',				'uri' 	=> 'meta/index',				'sub' => array(					array(						'title' => '编辑Meta',						'uri' 	=> 'meta/edit'					),					array(						'title' => '删除Meta',						'uri' 	=> 'meta/remove',					),				),			),			array(				'title' => '添加Meta',				'uri' 	=> 'meta/add',			),		)	),	array(		'title' => '信息管理',		'uri' 	=> 'info/index',		'sub'	=> array(			array(				'title' => '信息列表',				'uri' 	=> 'info/index',				'sub' => array(					array(						'title' => '编辑信息',						'uri' 	=> 'info/edit'					),					array(						'title' => '删除信息',						'uri' 	=> 'info/remove',					),				),			),			array(				'title' => '新加信息',				'uri' 	=> 'info/add',			),		)	),	array(		'title' => '设置',		'uri' 	=> 'site_config/index',		'sub'	=> array(			array(				'title' => '全局设置',				'uri' 	=> 'site_config/index',			),			array(				'title' => '系统重置',				'uri' 	=> 'site_config/reset',			),		)	),);