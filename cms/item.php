<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ECサイト</title>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <!-- header -->
  <header class="header">
    <p><a href="../index.php">tapiokapi' shop</a></p>
  </header>
  <!-- end header -->

  <div class="outer">
    <!-- 商品本情報 -->
    <div class="wrapper wrapper-cms">
      <!-- 商品選択フォーム -->
      <!-- enctypeは送信データのエンコードを指定。「multipart/form-data」：フォームにファイルを送信する機能がある場合に指定する。 -->
      <form action="insert.php" method="post" class="flex-parent cartin-area cms-area" enctype="multipart/form-data">
        <!-- 商品情報 -->
        <p class="cms-thumb"><img src="https://placehold.jp/c9c9c9/ffffff/600×600.png?text=%E3%83%80%E3%83%9F%E3%83%BC%E7%94%BB%E5%83%8F" alt="ダミー" width="200"></p>
        <dl class="cms-list">
          <dt>画像</dt>
          <!-- input要素のaccept属性は、サーバーが受け入れるファイルの種類を指定する属性 image/*は画像ファイル全般。-->
          <dd><input type="file" name="fname" class="cms-item" accept="image/*"></dd>
          <dt>商品名</dt>
          <dd><input type="text" name="item" placeholder="商品名を入力" class="cms-item"></dd>
          <dt>金額</dt>
          <dd><input type="text" name="value" placeholder="金額を入力" class="cms-item"></dd>
          <dt>商品紹介文</dt>
          <dd><textarea name="description" id="" cols="30" rows="10" class="cms-item" placeholder="商品紹介文を入力"></textarea></dd>
        </dl>
        <!-- end 商品情報 -->
        <ul class="btn-list btn-list__cms">
          <li class="">
            <a href="./" class="btn-back">戻る</a>
          </li>
          <li class="btn-calculate">
            <input type="submit" id="btn-update" value="登録">
          </li>
        </ul>
      </form>
      <!-- end 商品選択フォーム -->
    </div>
    <!-- end 商品本情報 -->
  </div>
  <!-- end outer -->

  <!-- footer -->
  <footer>
    <div class="wrapper wrapper-footer">

    </div>
  </footer>
  <!-- end footer -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script>
  // 画像サムネイル表示
  // アップロードするファイルを選択
  $('input[type=file]').change(function() {
    // 選択したファイルを取得し、file変数に格納
    // prop()で指定した属性の値を取得
    let file = $(this).prop('files')[0];
    // 画像以外は処理を停止
    if(!file.type.match('image.*')) {
      // クリア
      $(this).val(''); //選択されているファイルを空にする
      $('.cms-thumb > img').html(''); //画像表示箇所を空にする
      return;
    }
    // 画像表示
    let = reader = new FileReader(); //1
    reader.onload = function() { //2
      $('.cms-thumb > img').attr('src', reader.result);
    }
    reader.readAsDataURL(file); //3
  });
  </script>
</body>
</html>