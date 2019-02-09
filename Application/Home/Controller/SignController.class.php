<?php
namespace Home\Controller;
use Think\Controller;
class SignController extends Controller {
    public function login($StudentId = ''){
        if (!file_exists("started.lock")) {
            $this->error('投票还没有开始', U('Sign/login'), 30);
            return;
        }
    	if (session('?uid')) {
    		session(null);
    	}
    	if (IS_POST && !empty($StudentId)) {
    		// 判断UID是否正确
    		$uid = $StudentId;
    		$USER = M('user');
			if ($result = $USER->where(array('studentId' => $uid))->find()){
				if($result['status'] == 1) {
					$this->error('不可重复投票');
					return;
				} else if ($result['status'] == 2) {
                    $this->error('班委成员不可参与投票');
                    return;
                } else if ($result['status'] == 3) {
                    $this->error('非有效成员不可参与投票');
                    return;
                } else {
					session('uid', $uid);
					$this->redirect('Index/index');
					return;
				}
			} else {
				$this->error('请输入正确的学号');
				return;
			}
    	}
    	$this->display();
    }

    public function logout() {
    	session(null);
    	$this->success('登出成功', 'login');
    }
}