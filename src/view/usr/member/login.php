<?php
$pageTitleIcon = '<i class="fas fa-sign-in-alt"></i>';
$pageTitle = "로그인";
?>
<?php require_once __DIR__ . "/../head.php"; ?>

<section class="secion-login">
  <div class="container mx-auto">
    <form action="doLogin" method="POST">
      <div class="form-control">
        <label class="label">
          <span class="label-text">로그인아이디</span>
        </label>
        <input class="input input-bordered" required placeholder="로그인아이디를 입력해주세요." type="text" name="loginId">  
      </div>
      <div class="form-control">
        <label class="label">
          <span class="label-text">로그인비밀번호</span>
        </label>
        <input class="input input-bordered" required placeholder="로그인비밀번호를 입력해주세요." type="password" name="loginPw"> 
      </div>
      <div>
        <div class="btns">
          <button type="submit" class="btn btn-link">로그인</button>
          <button onclick="history.back();" type="button" class="btn btn-link">로그인취소</button>
        </div>
      </div>
    </form>
  </div>
</section>

<?php require_once __DIR__ . "/../foot.php"; ?>