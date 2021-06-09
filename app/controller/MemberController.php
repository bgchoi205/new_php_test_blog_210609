<?php
class APP__UsrMemberController {
  private APP__MemberService $memberService;

  public function __construct() {
    global $App__memberService;
    $this->memberService = $App__memberService;
  }

  public function actionShowJoin() {
    require_once App__getViewPath("usr/member/join");
  }

  public function actionShowLogin() {
    require_once App__getViewPath("usr/member/login");
  }

  public function actionDoLogout() {
    unset($_SESSION['loginedMemberId']);
    jsLocationReplaceExit("../article/list");
  }

  public function actionDoSecession() {
    unset($_SESSION['loginedMemberId']);

    $this->memberService->secession($_REQUEST['App__loginedMemberId']);

    jsLocationReplaceExit("../article/list", "회원탈퇴가 완료되었습니다.");
  }

  public function actionDoLogin() {
    $loginId = getStrValueOr($_REQUEST['loginId'], "");

    if ( empty($loginId) ) {
      jsHistoryBackExit("loginId를 입력해주세요.");
    }

    $loginPw = getStrValueOr($_REQUEST['loginPw'], "");
    
    if ( empty($loginPw) ) {
      jsHistoryBackExit("loginPw를 입력해주세요.");
    }
    
    $loginId = $_REQUEST['loginId'];
    $loginPw = $_REQUEST['loginPw'];
    
    $member = $this->memberService->getForPrintMemberByLoginIdAndLoginPw($loginId, $loginPw);
    
    if ( empty($member) ) {
      jsHistoryBackExit("일치하는 회원이 존재하지 않습니다.");
    }
    
    $_SESSION['loginedMemberId'] = $member['id'];
    
    jsLocationReplaceExit("../article/list", "{$member['nickName']}님 환영합니다.");    
  }
}