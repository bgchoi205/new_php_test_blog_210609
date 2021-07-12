<?php
$pageTitleIcon = '<i class="fas fa-pen"></i>';
$pageTitle = "게시물 작성";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<?php require_once __DIR__ . "/../../part/toastUiSetup.php"; ?>

<section class="secion-article-write">
  <div class="container mx-auto">
    <div class="con-pad">
      <script>
      let ArticleDoWrite__submitFormDone = false;
      function ArticleDoWrite__submitForm(form) {
        if ( ArticleDoWrite__submitFormDone ) {
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
        ArticleDoWrite__submitFormDone = true;
      }
      </script>
      <form action="doWrite" method="POST" onsubmit="ArticleDoWrite__submitForm(this); return false;">
        <input type="hidden" name="body">
        <div class="form-control">
          <label class="label">
            <span class="label-text">제목</span>
          </label> 
          <input type="text" placeholder="제목을 입력해주세요." class="input input-bordered" name="title">
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">내용</span>
          </label>
          <script type="text/x-template"></script>
          <div class="toast-ui-editor input-body"></div>
        </div>
        <div>
          <div class="btns">
						<button type="submit" class="btn btn-link">작성</button>
						<button onclick="history.back();" type="button" class="btn btn-link">작성취소</button>
					</div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require_once __DIR__ . "/../foot.php"; ?>