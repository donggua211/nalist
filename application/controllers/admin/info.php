<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends Admin_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('area_model');
		$this->load->model('category_model');
		$this->load->model('user_model');
		$this->load->model('info_model');
		$this->load->model('filter_model');
		$this->load->model('meta_model');
	}
	
	public function index() {
		$data['info_list'] = $this->info_model->all();
		$this->load->admin_template('info/index', $data);
	}
	
	public function add($category_id = '') {
		if(isset($_POST) && !empty($_POST)) {
			foreach($_POST as $key => $val) {
				if(in_array($key, array('submit'))) {
					continue;
				}
				
				if(in_array($key, array('info_id'))) {
					$data[$key] = intval($this->input->post($key));
				} else {
					$data[$key] = $this->input->post($key);
				}
			}
			
			if(empty($data['title'])) {
				$data['message']['error'] = 'Title不能为空.';
			} elseif(empty($data['category_id'])) {
				$data['message']['error'] = '必须选择一个Category.';
			} elseif(empty($data['area_id'])) {
				$data['message']['error'] = '必须选择一个Area.';
			} elseif(empty($data['user_id'])) {
				$data['message']['error'] = '必须选择一个User.';
			} else {
				//Update option
				$options = array();
				foreach($data['options'] as $option_id => $value) {
					if(is_array($value)) {
						$value = implode(',', $value);
					}
					$options[] = $option_id.'-'.$value;
				}
				$data['filters'] = implode(';', $options);
				
				$info_id = $this->info_model->add($data);
				if($info_id) {
					//Update Mete
					foreach($data['meta'] as $meta_id => $value) {
						$this->info_model->update_insert_info_meta($info_id, $meta_id, $value);
					}
					
					$data['message']['ok'] = '添加成功! ';
					show_result_page($data['message'], 'admin/info');
					return true;
				} else {
					$data['message']['error'] = '添加失败, 请重试.';
				}
			}
		}
		
		if(empty($category_id)) {
			$data['category_list'] = $this->category_model->tree();
			$this->load->admin_template('info/add1', $data);
		} else {
			$category_info = $this->category_model->get_single_by_id($category_id);
			
			$data['filter_list'] = $this->filter_model->get_filter_by_categories($category_info['context_parent_id']);
			$data['meta_list'] = $this->meta_model->get_meta_by_categories($category_info['context_parent_id']);
			$data['area_list'] = $this->area_model->tree();
			$data['user_list'] = $this->user_model->all();
			$data['category_id'] = $category_id;
			$this->load->admin_template('info/add2', $data);
		}
	}
	
	public function edit($id = 0) {
		$id = $this->input->get_post('id') ? $this->input->get_post('id') : $id;
		if($id <= 0) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/info');
			return false;
		}
		
		$info_info = $this->info_model->one($id);
		if(empty($info_info)) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/info');
			return false;
		}
		
		if(isset($_POST) && !empty($_POST)) {
			if(isset($_POST['remove']) && !empty($_POST['remove'])) {
				$this->remove($id);
				return true;
			} else {
				foreach($_POST as $key => $val) {
					if(in_array($key, array('submit', 'remove'))) {
						continue;
					}
					
					$data[$key] = $this->input->post($key);
				}
				
				//Update option
				$options = array();
				foreach($data['options'] as $option_id => $value) {
					if(is_array($value)) {
						$value = implode(',', $value);
					}
					$options[] = $option_id.'-'.$value;
				}
				$data['filters'] = implode(';', $options);
				
				$update_field = array();
				foreach($data as $key => $val) {
					if(in_array($key, array('options', 'meta'))) {
						continue;
					}
					
					if(($val != $info_info[$key])) {
						$update_field[$key] = $val;
					}
				}
				
				if($this->info_model->update($id, $update_field)) {
					//Update option
					foreach($data['meta'] as $meta_id => $value) {
						$this->info_model->update_insert_info_meta($id, $meta_id, $value);
					}
					
					$data['message']['ok'] = '更新成功! ';
					show_result_page($data['message'], 'admin/info');
					return true;
				} else {
					$data['message']['error'] = '添加失败, 请重试.';
				}
			}
		} else {
			$data = $info_info;
		}
		
		$category_info = $this->category_model->get_single_by_id($info_info['category_id']);
			
		$data['filter_list'] = $this->filter_model->get_filter_by_categories($category_info['context_parent_id']);
		$data['meta_list'] = $this->meta_model->get_meta_by_categories($category_info['context_parent_id']);
		$data['area_list'] = $this->area_model->tree();
		$data['user_list'] = $this->user_model->all();
		$this->load->admin_template('info/edit', $data);
	}

	function remove($id = 0) {
		$id = $this->input->get_post('id') ? $this->input->get_post('id') : $id;
		if($id <= 0) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/info');
			return false;
		}
		
		$info_info = $this->info_model->one($id);
		if(empty($info_info)) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/info');
			return false;
		}
		
		if($this->info_model->remove($id)) {
			$data['message']['ok'] = '删除成功! ';
		} else {
			$data['message']['error'] = '删除失败, 请重试.';
		}
		
		show_result_page($data['message'], 'admin/info');
		return true;
	}
}