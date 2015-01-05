<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends Admin_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('group_model');
	}
	
	public function index() {
		$data['group_list'] = $this->group_model->all();
		$this->load->admin_template('group/index', $data);
	}
	
	public function add() {
		if(isset($_POST) && !empty($_POST)) {
			foreach($_POST as $key => $val) {
				if(in_array($key, array('submit'))) {
					continue;
				}
				
				if(in_array($key, array('group_id'))) {
					$data[$key] = intval($this->input->post($key));
				} else {
					$data[$key] = $this->input->post($key);
				}
			}
			
			if(empty($data['group_name'])) {
				$data['message']['error'] = '用户名不能为空.';
			} elseif(empty($data['permission'])) {
				$data['message']['error'] = '必须设置权限.';
			} else {
				if($this->group_model->add($data)) {
					$data['message']['ok'] = '添加成功! ';
					show_result_page($data['message'], 'admin/group');
					return true;
				} else {
					$data['message']['error'] = '添加失败, 请重试.';
				}
			}
		}
		
		$data['group_list'] = $this->group_model->all();
		$this->load->admin_template('group/add', $data);
	}
	
	public function edit($id = 0) {
		$id = $this->input->get_post('id') ? $this->input->get_post('id') : $id;
		if($id <= 0) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/group');
			return false;
		}
		
		$group_info = $this->group_model->one($id);
		if(empty($group_info)) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/group');
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
				
				$update_field = array();
				foreach($data as $key => $val) {
					if(($val != $group_info[$key])) {
						$update_field[$key] = $val;
					}
				}
				
				if($this->group_model->update($id, $update_field)) {
					$data['message']['ok'] = '更新成功! ';
					show_result_page($data['message'], 'admin/group');
					return true;
				} else {
					$data['message']['error'] = '分类添加失败, 请重试.';
				}
			}
		} else {
			$data = $group_info;
		}
		
		$data['group_list'] = $this->group_model->all();
		$this->load->admin_template('group/edit', $data);
	}

	function remove($id = 0) {
		$id = $this->input->get_post('id') ? $this->input->get_post('id') : $id;
		if($id <= 0) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/group');
			return false;
		}
		
		$group_info = $this->group_model->one($id);
		if(empty($group_info)) {
			$data['message']['error'] = '您输入的页面不存在, 请返回重试! ';
			show_result_page($data['message'], 'admin/group');
			return false;
		}
		
		if($this->group_model->remove($id)) {
			$data['message']['ok'] = '删除成功! ';
		} else {
			$data['message']['error'] = '删除失败, 请重试.';
		}
		
		show_result_page($data['message'], 'admin/group');
		return true;
	}
}