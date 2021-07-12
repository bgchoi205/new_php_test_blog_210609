<?php
$pageTitleIcon = '<i class="fas fa-edit"></i>';
$pageTitle = "게시물 수정, ${id}번 게시물";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<?php require_once __DIR__ . "/../../part/toastUiSetup.php"; ?>

<section class="secion-article-write">
  <div class="container mx-auto">
    <div class="con-pad">
      <div class="btns">
        <a href="list" class="btn btn-link">글 리스트</a>
        <a href="detail?id=<?=$id?>"  class="btn btn-link">원문</a>
      </div>
      <hr>
      <script>
      let ArticleDoModify__submitFormDone = false;
      function ArticleDoModify__submitForm(form) {
        if ( ArticleDoModify__submitFormDone ) {
          return;
        }

        form.title.value = form.title.value.trim();

        if ( form.title.value.length == 0 ) {
          alert('제목을 입력해주세요.');
          form.title.focus();

          return;
        }

        const bodyEditor = $(form).find('.input-body').data('data-toast-editor');
        const body = bodyEditor.getMarkdown().trim();
        if (body.length == 0) {
          bodyEditor.focus();
          alert('내용을 입력해주세요.');
          return;
        }

        form.body.value = body;

        form.submit();
        ArticleDoModify__submitFormDone = true;
      }
      </script>
      <form action="doModify" method="POST" onsubmit="ArticleDoModify__submitForm(this); return false;">
      <input type="hidden" name="id" value="<?=$article['id']?>"> 
      <input type="hidden" name="body"> 
        <div class="form-control">
          <label class="label">
            <span class="label-text">
              번호
            </span>
          </label>
          <div>
            <div class="badge badge-primary badge-outline"><?=$article['id']?></div>
          </div>
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">제목</span>
          </label>
          <input class="input input-bordered" required placeholder="제목을 입력해주세요." type="text" name="title" value="<?=$article['title']?>">
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">내용</span>
          </label>
          <script type="text/x-template"><?=ToastUiEditor__getSafeSource($article['body'])?></script>
          <div class="toast-ui-editor input-body"></div>
        </div>
        <div>
          <div class="btns">
						<button type="submit" class="btn btn-link">수정</button>
						<button onclick="history.back();" type="button" class="btn btn-link">수정취소</button>
					</div>
        </div>
      </form>
    </div>
  </div>
</section>

<?php require_once __DIR__ . "/../foot.php"; ?>