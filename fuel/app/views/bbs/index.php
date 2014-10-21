<style type="text/css" media="screen">
    .comment-body{
        background-color: #FEF0E3;
        float: right;
        height: 50%;
    }
    .comment{
        margin:20px;
        border-bottom:5px solid #123123;
        padding-bottom: 50px;
    }
    img.bbs-img
    {
    }
    .bbs-box {
　background-color:white; display:block;
　padding:5px; margin:5px;
    }
    // リンクの見栄えを設定します。
    a .bbs-box { background-color:#f0f0ff; font-weight:bold; }
    a:hover .bbs-box { background-color:skyblue; color:blue; }

   p.
</style>


<?php for ($i = 0; $i < 20; $i++): ?>
    <a href="http://localhost/bbs/bbs">
        <span class="bbs-box">
            <div class="row comment">
                <div  class="col-md-8 comment-body">
                    <p class="linkarea">スレタイ</p><br>
                </div>
                <div  class="col-md-8 comment-body">
                    <p>レス</p><br>
                </div>
                <div class="col-md-2">
                    <?php echo Asset::img('noimage.jpg', array('class' => 'bbs-img')); ?>
                </div>
            </div>
        </span>
    </a>
<?php endfor; ?>

<form class="form-horizontal" role="form">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">スレッドタイトル：</label>
        <div class="col-sm-10">
            <input type="text" name="title">
        </div>
    </div>
    <div class="form-group">

        <label for="inputEmail3" class="col-sm-2 control-label">スレッド：</label>
        <div class="col-sm-10">
            <TEXTAREA cols="100" rows="10" ></TEXTAREA><br><br>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
     <button class="btn btn-success">投稿</button>
  </div>
</form>