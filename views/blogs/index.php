 <?php
 
 
 ?>
    <div class="row">
      <div class="col-md-4 content-margin-top">
        <!-- /seed_blog/blogs/addと絶対パス指定で書く -->
      <p><a href="/seed_blog/blogs/add" class="btn btn-info">新規投稿</a></p>

      <?php foreach ($viewOptions as $blog){?>
       
      
        <div class="msg">
          <p><a href="/seed_blog/blogs/show/<?php echo $blog['id']; ?>"><?php echo $blog["title"]; ?></a></p>
          <p class="day">
              <?php echo $blog["created"]; ?>
            [<a href="/seed_blog/blogs/edit/<?php echo $blog['id']; ?>" style="color: #00994C;">編集</a>]
            [<a href="/seed_blog/blogs/delete/<?php echo $blog['id']; ?>" style="color: #F33;">削除</a>]
          </p>
        </div>
      <?php }?>
        <!-- <div class="msg">
          <p><a href="show.html">タイトル３</a></p>
          <p class="day">
              2016-01-28 18:04
            [<a href="edit.html" style="color: #00994C;">編集</a>]
            [<a href="" style="color: #F33;">削除</a>]
          </p>
        </div>
        <div class="msg">
          <p><a href="show.html">タイトル２</a></p>
          <p class="day">
              2016-01-28 18:04
            [<a href="edit.html" style="color: #00994C;">編集</a>]
            [<a href="" style="color: #F33;">削除</a>]
          </p>
        </div>
        <div class="msg">
          <p><a href="show.html">タイトル１</a></p>
          <p class="day">
              2016-01-28 18:04
            [<a href="edit.html" style="color: #00994C;">編集</a>]
            [<a href="" style="color: #F33;">削除</a>]
          </p>
        </div> -->
      </div>

    </div>