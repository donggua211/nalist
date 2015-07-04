<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends Front_Controller {
	private $show_num = 5;
	
	public function info_list($category_slug, $filter_str = '', $page = '') {
		
		if($this->uri->total_segments() <= 2) {
			$filter_str = '';
			$page = '';
		}
		
		if($this->uri->total_segments() <= 3) {
			$page = '';
		}
		
		
		//Language File
		$this->lang->load('info', $this->language);
		
		$this->load->model('category_model');
		$this->load->model('filter_model');
		$this->load->model('info_model');
		
		$keyword = trim($this->input->get_post('keyword'));
		
		$category_info = $this->category_model->get_nav_by_slug($category_slug);
		$filter_info = $this->filter_model->get_filter_by_categories($category_info['context_parent_id']);
		
		$filter_options = array();
		if(!empty($filter_str)) {
			$longth = strlen($filter_str);
			for($i = 0; $i < $longth; $i += 2) {
				$option_value = substr($filter_str, $i, 2);
				
				if(strlen($option_value) != 2) {
					continue;
				}
				
				$filter_slug = substr($option_value, 0, 1);
				
				foreach($filter_info as $val) {
					if($val['filter_slug'] == $filter_slug) {
						$filter_options[$val['id']] = $option_value;
					}
				}
			}
		}
		
		if(!isset($page) || $page === '') {
			$page = 1;
		} else {
			$page = parse_page($page);
		}
		
		$filter['filter_options'] = $filter_options;
		$filter['keyword'] = $keyword;
		$total = $this->info_model->get_info($filter, 'count');
		$page_nav = page_nav($total, $this->show_num, $page);
		$page_nav['category_slug'] = $category_slug;
		$page_nav['filter_options'] = $filter_options;
		
		$info_list = $this->info_model->get_info($filter, 'result', '*', $page_nav['end'], $page_nav['start'], 'update_time DESC');
		
		
		$data['keyword'] = $keyword;
		$data['filter_options'] = $filter_options;
		$data['page_nav'] = $page_nav;
		$data['city_slug'] = $this->city_slug;
		$data['category_slug'] = $category_slug;
		$data['category_info'] = $category_info;
		$data['filter_info'] = $filter_info;
		$data['info_list'] = $info_list;
		$this->load->front_template('info/info_list', $data);
	}
}