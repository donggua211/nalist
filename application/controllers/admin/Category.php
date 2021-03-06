<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('category_model');
	}
	
	public function index() {
		$data['category_list'] = $this->category_model->tree();
		$this->load->admin_template('category/index', $data);
	}
	
	public function add() {
		if(isset($_POST) && !empty($_POST)) {
			foreach($_POST as $key => $val) {
				if(in_array($key, array('submit'))) {
					continue;
				}
				
				if(in_array($key, array('parent_id'))) {
					$data[$key] = intval($this->input->post($key));
				} else {
					$data[$key] = $this->input->post($key);
				}
			}
			
			if(empty($data['category_name'])) {
				$data['message']['error'] = '名称不能为空.';
			} elseif(empty($data['category_display_name'])) {
				$data['message']['error'] = '显示名称不能为空.';
			} else {
				$data['category_slug'] = generate_slug($data['category_name']);
				if($this->category_model->check_slug_exist($data['category_slug'])) {
					$data['message']['error'] = "名称对应的Slug({$data['category_slug']})已经存在.";
				} else {
					if($this->category_model->add($data)) {
						$data['message']['ok'] = '添加成功! ';
						show_result_page($data['message'], 'admin/category');
						return true;
					} else {
						$data['message']['error'] = '添加失败, 请重试.';
					}
				}
			}
		}
		
		$data['category_list'] = $this->category_model->tree();
		$this->load->admin_template('category/add', $data);
	}
	
	public function edit($id = 0) {
		$id = $this->input->get_post('id') ? $this->input->get_post('id') : $id;
		if($id <= 0) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/category');
			return false;
		}
		
		$catetory_info = $this->category_model->one($id);
		if(empty($catetory_info)) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/category');
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
					
					if(in_array($key, array('parent_id'))) {
						$data[$key] = intval($this->input->post($key));
					} else {
						$data[$key] = $this->input->post($key);
					}
				}
				
				$update_field = array();
				foreach($data as $key => $val) {
					if(($val != $catetory_info[$key])) {
						$update_field[$key] = $val;
					}
				}
				
				if(isset($update_field['category_name'])) {
					$update_field['category_slug'] = generate_slug($update_field['category_name']);
				}
				
				if(isset($update_field['parent_id']) && $update_field['parent_id'] == $id) {
					$data['message']['error'] = '不能选择自己为父级.';
				} elseif(isset($update_field['category_slug']) && $this->category_model->check_slug_exist($update_field['category_slug'], $id)) {
					$data['message']['error'] = "名称对应的Slug({$update_field['category_slug']})已经存在.";
				} elseif($this->category_model->update($id, $update_field)) {
					$data['message']['ok'] = '更新成功! ';
					show_result_page($data['message'], 'admin/category');
					return true;
				} else {
					$data['message']['error'] = '分类添加失败, 请重试.';
				}
			}
		} else {
			$data = $catetory_info;
		}
		
		$data['category_list'] = $this->category_model->tree();
		$this->load->admin_template('category/edit', $data);
	}

	function remove($id = 0) {
		$id = $this->input->get_post('id') ? $this->input->get_post('id') : $id;
		if($id <= 0) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/category');
			return false;
		}
		
		$catetory_info = $this->category_model->one($id);
		if(empty($catetory_info)) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/category');
			return false;
		}
		
		if($this->category_model->remove($id)) {
			$data['message']['ok'] = '删除成功! ';
		} else {
			$data['message']['error'] = '删除失败, 请重试.';
		}
		
		show_result_page($data['message'], 'admin/category');
		return true;
	}
}