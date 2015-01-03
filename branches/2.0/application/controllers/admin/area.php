<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area extends Admin_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('admin/area_model');
	}
	
	public function index() {
		$data['area_list'] = $this->area_model->tree();
		$this->load->admin_template('area/index', $data);
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
			
			if(empty($data['area_name'])) {
				$data['message']['error'] = '名称不能为空.';
			} elseif(empty($data['area_slug'])) {
				$data['message']['error'] = 'Slug不能为空.';
			} else {
				if($this->area_model->add($data)) {
					$data['message']['ok'] = '添加成功! ';
					show_result_page($data['message'], 'admin/area');
					return true;
				} else {
					$data['message']['error'] = '添加失败, 请重试.';
				}
			}
		}
		
		$data['area_list'] = $this->area_model->tree();
		$this->load->admin_template('area/add', $data);
	}
	
	public function edit($id = 0) {
		$id = $this->input->get_post('id') ? $this->input->get_post('id') : $id;
		if($id <= 0) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/area');
			return false;
		}
		
		$area_info = $this->area_model->one($id);
		if(empty($area_info)) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/area');
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
					if(($val != $area_info[$key])) {
						$update_field[$key] = $val;
					}
				}
				
				
				if(isset($update_field['parent_id']) && $update_field['parent_id'] == $id) {
					$data['message']['error'] = '不能选择自己为父级.';
				} elseif($this->area_model->update($id, $update_field)) {
					$data['message']['ok'] = '更新成功! ';
					show_result_page($data['message'], 'admin/area');
					return true;
				} else {
					$data['message']['error'] = '分类添加失败, 请重试.';
				}
			}
		} else {
			$data = $area_info;
		}
		
		$data['area_list'] = $this->area_model->tree();
		$this->load->admin_template('area/edit', $data);
	}

	function remove($id = 0) {
		$id = $this->input->get_post('id') ? $this->input->get_post('id') : $id;
		if($id <= 0) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/area');
			return false;
		}
		
		$area_info = $this->area_model->one($id);
		if(empty($area_info)) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/area');
			return false;
		}
		
		if($this->area_model->remove($id)) {
			$data['message']['ok'] = '删除成功! ';
		} else {
			$data['message']['error'] = '删除失败, 请重试.';
		}
		
		show_result_page($data['message'], 'admin/area');
		return true;
	}
}