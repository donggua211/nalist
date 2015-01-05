<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filter extends Admin_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('category_model');
		$this->load->model('filter_model');
		$this->load->model('filter_option_model');
	}
	
	public function index() {
		$data['filter_list'] = $this->filter_model->all();
		$this->load->admin_template('filter/index', $data);
	}
	
	public function add() {
		if(isset($_POST) && !empty($_POST)) {
			foreach($_POST as $key => $val) {
				if(in_array($key, array('submit'))) {
					continue;
				}
				
				if(in_array($key, array('filter_id'))) {
					$data[$key] = intval($this->input->post($key));
				} else {
					$data[$key] = $this->input->post($key);
				}
			}
			
			if(empty($data['filter_name'])) {
				$data['message']['error'] = '过滤器名称不能为空.';
			} elseif(empty($data['filter_key'])) {
				$data['message']['error'] = '过滤器Key不能为空.';
			} elseif(empty($data['category_id'])) {
				$data['message']['error'] = '必须选择一个分类.';
			} else {
				$id = $this->filter_model->add($data);
				if(!empty($id)) {
					//Update filter option.
					if(isset($_POST['option_name'])) {
						$option_name_arr = $this->input->post('option_name');
						$option_value_arr = $this->input->post('option_value');
						$display_order_arr = $this->input->post('display_order');
						
						foreach($option_name_arr as $key => $val) {
							if(empty($option_name_arr[$key]) || empty($option_value_arr[$key])) {
								continue;
							}
							
							$display_order = !empty($display_order_arr[$key]) ? $display_order_arr[$key] : 100;
							$option_data = array(
								'filter_id' => $id,
								'option_name' => $option_name_arr[$key],
								'option_value' => $option_value_arr[$key],
								'display_order' => $display_order,
							);
							$this->filter_option_model->add($option_data);
						}
					}
					
					
					$data['message']['ok'] = '添加成功! ';
					show_result_page($data['message'], 'admin/filter');
					return true;
				} else {
					$data['message']['error'] = '添加失败, 请重试.';
				}
			}
		}
		
		$data['category_list'] = $this->category_model->tree();
		$this->load->admin_template('filter/add', $data);
	}
	
	public function edit($id = 0) {
		$id = $this->input->get_post('id') ? $this->input->get_post('id') : $id;
		if($id <= 0) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/filter');
			return false;
		}
		
		$filter_info = $this->filter_model->one($id);
		if(empty($filter_info)) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/filter');
			return false;
		}
		
		if(isset($_POST) && !empty($_POST)) {
			if(isset($_POST['remove']) && !empty($_POST['remove'])) {
				$this->remove($id);
				return true;
			} else {
				foreach($_POST as $key => $val) {
					if(in_array($key, array('submit', 'remove', 'option_name', 'option_value', 'display_order'))) {
						continue;
					}
					
					$data[$key] = $this->input->post($key);
				}
				
				$update_field = array();
				foreach($data as $key => $val) {
					if(($val != $filter_info[$key])) {
						$update_field[$key] = $val;
					}
				}
				
				if($this->filter_model->update($id, $update_field)) {
					//Update filter option.
					if(isset($_POST['option_name'])) {
						$option_name_arr = $this->input->post('option_name');
						$option_value_arr = $this->input->post('option_value');
						$display_order_arr = $this->input->post('display_order');
						
						foreach($option_name_arr as $key => $val) {
							if(empty($option_name_arr[$key]) || empty($option_value_arr[$key])) {
								continue;
							}
							
							$display_order = !empty($display_order_arr[$key]) ? $display_order_arr[$key] : 100;
							$option_data = array(
								'filter_id' => $id,
								'option_name' => $option_name_arr[$key],
								'option_value' => $option_value_arr[$key],
								'display_order' => $display_order,
							);
							$this->filter_option_model->add($option_data);
						}
					}
					
					$data['message']['ok'] = '更新成功! ';
					show_result_page($data['message'], 'admin/filter');
					return true;
				} else {
					$data['message']['error'] = '分类添加失败, 请重试.';
				}
			}
		} else {
			$data = $filter_info;
		}
		
		$data['category_list'] = $this->category_model->tree();
		$data['option_list'] = $this->filter_option_model->getby_filter($id);
		$this->load->admin_template('filter/edit', $data);
	}

	function remove($id = 0) {
		$id = $this->input->get_post('id') ? $this->input->get_post('id') : $id;
		if($id <= 0) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/filter');
			return false;
		}
		
		$filter_info = $this->filter_model->one($id);
		if(empty($filter_info)) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/filter');
			return false;
		}
		
		if($this->filter_model->remove($id)) {
			$data['message']['ok'] = '删除成功! ';
		} else {
			$data['message']['error'] = '删除失败, 请重试.';
		}
		
		show_result_page($data['message'], 'admin/filter');
		return true;
	}
}