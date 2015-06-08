<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meta extends Admin_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('category_model');
		$this->load->model('meta_model');
	}
	
	public function index() {
		$data['meta_list'] = $this->meta_model->all();
		$this->load->admin_template('meta/index', $data);
	}
	
	public function add() {
		if(isset($_POST) && !empty($_POST)) {
			foreach($_POST as $key => $val) {
				if(in_array($key, array('submit'))) {
					continue;
				}
				
				if(in_array($key, array('meta_id'))) {
					$data[$key] = intval($this->input->post($key));
				} else {
					$data[$key] = $this->input->post($key);
				}
			}
			
			if(empty($data['meta_name'])) {
				$data['message']['error'] = '过滤器名称不能为空.';
			} elseif(empty($data['meta_slug'])) {
				$data['message']['error'] = '过滤器Key不能为空.';
			} elseif(empty($data['category_id'])) {
				$data['message']['error'] = '必须选择一个分类.';
			} else {
				$id = $this->meta_model->add($data);
				if(!empty($id)) {
					$data['message']['ok'] = '添加成功! ';
					show_result_page($data['message'], 'admin/meta');
					return true;
				} else {
					$data['message']['error'] = '添加失败, 请重试.';
				}
			}
		}
		
		$data['category_list'] = $this->category_model->tree();
		$this->load->admin_template('meta/add', $data);
	}
	
	public function edit($id = 0) {
		$id = $this->input->get_post('id') ? $this->input->get_post('id') : $id;
		if($id <= 0) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/meta');
			return false;
		}
		
		$meta_info = $this->meta_model->one($id);
		if(empty($meta_info)) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/meta');
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
					if(($val != $meta_info[$key])) {
						$update_field[$key] = $val;
					}
				}
				
				if($this->meta_model->update($id, $update_field)) {
					$data['message']['ok'] = '更新成功! ';
					show_result_page($data['message'], 'admin/meta');
					return true;
				} else {
					$data['message']['error'] = '分类添加失败, 请重试.';
				}
			}
		} else {
			$data = $meta_info;
		}
		
		$data['category_list'] = $this->category_model->tree();
		$this->load->admin_template('meta/edit', $data);
	}

	function remove($id = 0) {
		$id = $this->input->get_post('id') ? $this->input->get_post('id') : $id;
		if($id <= 0) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/meta');
			return false;
		}
		
		$meta_info = $this->meta_model->one($id);
		if(empty($meta_info)) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/meta');
			return false;
		}
		
		if($this->meta_model->remove($id)) {
			$data['message']['ok'] = '删除成功! ';
		} else {
			$data['message']['error'] = '删除失败, 请重试.';
		}
		
		show_result_page($data['message'], 'admin/meta');
		return true;
	}
}