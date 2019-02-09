<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index() {
        if (!file_exists("started.lock")) {
            $this->error('投票还没有开始', U('Index/index'), 30);
            return;
        }
    	if (!session('?uid')) {
    		// $this->error('你还没有登录', U('Sign/login'));
            $this->redirect('Sign/login');
    		return;
    	}
    	$uid = session('uid');
    	$USER = M('user');
    	if ($result = $USER->where(array('studentId' => $uid))->find()) {
    		if ($result['status'] == 1) {
    			$this->error('不可重复投票', U('Sign/login'));
    		} else {
    			$SECTION = M('section');
    			$vote_section = $SECTION->select();
    			$VOTE = M('vote');
                $vote_person = array();
                for ($i = 0; $i < count($vote_section); $i++) {
                    $vote_result = $VOTE->where(array('sid' => $vote_section[$i]['sid']))->select();
                    $vote_result['total'] = count($vote_result);
                    $vote_person[$i+1] = $vote_result;
                }
    			$this->assign('vote_section', $vote_section);
    			$this->assign('vote_total', count($vote_person));
    			$this->assign('vote_person', $vote_person);
    			$this->assign('user', $result);
    			$this->display();
    		}
    	} else {
    		$this->error('无效用户', U('Sign/login'));
    		return;
    	}
    }
	
	public function save() {
        if (!file_exists("started.lock")) {
            $this->error('投票还没有开始');
            return;
        }
		if (!session('?uid')) {
    		$this->error('你还没有登录', U('Sign/login'));
    		return;
    	}
        $uid = session('uid');
        $USER = M('user');
        if ($result = $USER->where(array('studentId' => $uid))->find()) {
            if ($result['status'] == 1) {
                $this->error('不可重复投票', U('Sign/login'));
            } else {
                $allPost = I('post.');
                $allPostField = array_keys($allPost);
                $selected = array();
                for ($i = 0; $i < count($allPostField); $i++) {
                    if (strstr($allPostField[$i], "voteSelected")) {
                        $key = str_replace('voteSelected', '', $allPostField[$i]);
                        $selected[$key] = $allPost[$allPostField[$i]];
                    }
                }

                $SECTION = M('section');
                $VOTE = M('vote');
                foreach ($selected as $key => $value) {
                    if ($SECTION->where(array('sid' => $key))->find()) {
                        if (is_array($value)) {
                            foreach ($value as $val) {
                                if ($result = $VOTE->where(array('vid' => $val))->find()) {
                                    if ($VOTE->where(array('sid' => $key, 'vid' => $val))->save(array('num' => $result['num'] + 1))) {
                                    } else {
                                        $this->error('数据库无法修改');
                                        return;
                                    }
                                } else {
                                    $this->error('不存在该选项');
                                    return;
                                }
                            }
                        } else {
                            if ($result = $VOTE->where(array('vid' => $value))->find()) {
                                if ($VOTE->where(array('sid' => $key, 'vid' => $value))->save(array('num' => $result['num'] + 1))) {
                                } else {
                                    $this->error('数据库无法修改');
                                    return;
                                }
                            } else {
                                $this->error('不存在该选项');
                                return;
                            }
                        }
                    } else {
                        $this->error('不存在该职位');
                        return;
                    }
                }
                // 防止重复投票
                $USER->where(array('studentId' => $uid))->save(array('status' => 1));
                $this->success('投票成功', U('Sign/login'));
            }
        } else {
            $this->error('无效用户', U('Sign/login'));
            return;
        }
	}
}

