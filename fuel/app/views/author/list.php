<?php echo Asset::js('plugin/isotope/isotope.pkgd.min.js'); ?>
<div class="row">
  <div class="visible-xs col-xs-12 text-center" id="filter-top">
    <div class="container-fluid">
      <ul class="nav nav-pills author" id='filters'>
        <li class="active"><a data-filter='*'>All</a></li>
        <?php foreach(Config::get('PROJECT.CATEGORY.NAME') as $category): ?>
          <li><a data-filter='.<?php echo $category; ?>'><?php echo $category; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<div class="col-sm-10">
  <div class="row" id="list">
    <?php foreach($user_list as $user): ?>
      <div class="col-xs-12 col-sm-4 col-md-3 item <?php echo Config::get('PROJECT.CATEGORY.NAME.'.$user['category']); ?>" style="margin-bottom:10px;">
        <div class="small-box bg-green">
          <img src="<?php echo Config::get("USER_IMG_URL").$user['thumbnail']; ?>" class="author-list-thumbnail">
          <div class="inner">
          <h4>
            <i class="fa fa-user" style="margin-right:4px;"> <?php echo $user['name'];?></i>
          </h4>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus in eius blanditiis doloribus
          </p>
        </div>
        <a href="/author/detail?id=<?php echo $user['id']; ?>" class="small-box-footer">
          More info <i class="fa fa-arrow-circle-right"></i>
        </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<div class="hidden-xs col-sm-2 text-center" id="filter-side">
  <h2>Filter</h2>
  <ul id="filters" class="nav nav-pills nav-stacked author">
    <li class="active"><a data-filter='*'>All</a></li>
    <?php foreach(Config::get('PROJECT.CATEGORY.NAME') as $category): ?>
      <li><a data-filter='.<?php echo $category; ?>'><?php echo $category; ?></a></li>
    <?php endforeach; ?>
  </ul>
</div>
<script>
  $(function(){
    $(window).load(function(){
      var $container = $('#list');
      $container.isotope({
        animationEngine : 'jquery',
        itemSelector    : '.item',
        resizable       : false,
      });
      $('#filters li a').click(function(){
        var selecter = $(this).attr('data-filter');
        $container.isotope({
          filter : selecter,
          animationOptions: {
            duration : 500,
            easing   : 'easeInOutQuad',
          },
        });
        return false;
      });
      $('#filters a').on("click", function (e) {
        var lis = $(e.target).closest('ul').find('li');
        for (var i=0;i<lis.length;i++) {
          $(lis[i]).removeClass('active');
        }
        $(e.target).closest("li").toggleClass("active");
      });
    })
  })
</script>