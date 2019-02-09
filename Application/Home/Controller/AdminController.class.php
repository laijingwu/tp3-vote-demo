<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function index() {
        $SECTION = M('section');
        $section_arr = $SECTION->select();
        $this->assign('section', $section_arr);
        if (!file_exists("started.lock"))
            $this->assign('vote_switch', "stopped");
        else
            $this->assign('vote_switch', "started");
    	$this->display();
    }

    public function start() {
        if (!file_exists("started.lock")) {
            $file = fopen("started.lock", 'w+');
            fclose($file);
        }
        // $this->success('投票成功开启', U('Admin/index'));
        $this->redirect('Admin/index');
    }

    public function stop() {
        if (file_exists("started.lock"))
            unlink("started.lock");
        // $this->success('投票成功关闭', U('Admin/index'));
        $this->redirect('Admin/index');
    }

    public function add($sid, $name) {
        if (IS_POST) {
            $VOTE = M('vote');
            if ($VOTE->data(array('sid' => $sid, 'name' => trim($name), 'num' => 0))->add()) {
                $this->success('添加成功');
            } else {
                $this->error('添加失败');
            }
        } else {
            $this->error('非法操作');
        }
    }

    public function showResult() {
        $SECTION = M('section');
        $VOTE = M('vote');
        $vote_section = $SECTION->select();
        $vote_all = array();
        for ($i = 0; $i < count($vote_section); $i++) {
            $everyvote = $VOTE->where(array('sid' => $vote_section[$i]['sid']))->select();
            $vote_section[$i]['count'] = count($everyvote);
            $everyvote = array_merge($vote_section[$i], $everyvote);
            array_push($vote_all, $everyvote);
        }
        $this->assign('vote', $vote_all);
        $this->display('show');
    }

    public function ajax() {
        if (IS_AJAX) {
            $SECTION = M('section');
            $VOTE = M('vote');
            $vote_section = $SECTION->select();
            $vote_all = array();
            for ($i = 0; $i < count($vote_section); $i++) {
                $everyvote = $VOTE->where(array('sid' => $vote_section[$i]['sid']))->order('num desc')->limit(3)->select();
                $vote_section[$i]['count'] = count($everyvote);
                $everyvote = array_merge($vote_section[$i], $everyvote);
                array_push($vote_all, $everyvote);
            }
            $this->ajaxReturn($vote_all);
        } else {
            $this->error("非法操作");
        }
    }
}