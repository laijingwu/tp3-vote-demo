<?php
namespace Home\Controller;
use Think\Controller;
class ShowController extends Controller {
    public function index(){
        if (file_exists("started.lock")) {
            // $this->error('投票还没有开始', U('Index/index'), 30);
            $this->error('为不影响投票结果，请等待投票结束', U('Show/index'), 30);
            return;
        }
    	if (session('?uid')) {
    		$uid = session('uid');
    		$USER = M('user');
    		if ($result = $USER->where(array('studentId' => $uid))->find()) {
	    		$this->assign('user', $result);
	    	}
        }
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
        // var_dump($vote_all);
    	$this->display();
    }

    public function ajax() {
        // if (IS_AJAX) {
        //     $SECTION = M('section');
        //     $VOTE = M('vote');
        //     $vote_section = $SECTION->select();
        //     $vote_all = array();
        //     for ($i = 0; $i < count($vote_section); $i++) {
        //         $everyvote = $VOTE->where(array('sid' => $vote_section[$i]['sid']))->order('num desc')->limit(3)->select();
        //         $vote_section[$i]['count'] = count($everyvote);
        //         $everyvote = array_merge($vote_section[$i], $everyvote);
        //         array_push($vote_all, $everyvote);
        //     }
        //     exit(json_encode($vote_all));
        // } else {
        //     exit("非法操作");
        // }
    }
}