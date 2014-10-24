<style>
  .recruit-thumbnail
    {
      display: block;
      margin-left: auto;
      margin-right: auto;
      max-width: 100%;
      width: 100%;
    }
</style>
<div class="col-sm-4" >
  <div class="box box-solid bg-red-gradient">
    <div class="box-header">
      <h3 class="box-title">募集タイトル</h3>
    </div>
    <div class="box-body">
      <?php echo Asset::img('noimage.jpg', array('class' => 'recruit-thumbnail')); ?>
      <div>
        <hr>
        <div class="row">
          <div class="col-xs-4 author-grade">学年</div><div class="col-xs-8 author-grade responsib">3A</div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xs-4 author-grade">専攻</div><div class="col-xs-8 author-grade">ITスペシャリスト</div>
        </div>
        <hr>
      </div>
    </div>
    <div class="box-footer text-black">
      <h3 class="box-title text-center">技術</h3>
          <div class="row">
            <div class="col-sm-12">
              <!-- Progress bars -->
              <div class="clearfix">
                <span class="pull-left"><p>JAVA</p></span>
                <small class="pull-right">50%</small>
              </div>
              <div class="progress xs">
                <div class="progress-bar progress-bar-green" style="width: 50%;"></div>
              </div>
              <div class="clearfix">
                <span class="pull-left"><p>C#</p></span>
                <small class="pull-right">40%</small>
              </div>
              <div class="progress xs">
                <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
              </div>
              <div class="clearfix">
                <span class="pull-left"><p>PHP</p></span>
                <small class="pull-right">60%</small>
              </div>
              <div class="progress xs">
                <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
              </div>
            </div>
          </div>
    </div>
  </div>
</div>
<div class="col-sm-8">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title">募集詳細</h3>
    </div>
    <div class="box-body">
      <h1>h1. Bootstrap heading</h1>
      <h2>h2. Bootstrap heading</h2>
      <h3>h3. Bootstrap heading</h3>
      <h4>h4. Bootstrap heading</h4>
      <h5>h5. Bootstrap heading</h5>
      <h6>h6. Bootstrap heading</h6>
      <?php echo Asset::img('noimage.jpg',array('class'=>'img-resposive col-sm-6','style'=>'border-radius:2px;')); ?>
      <dl class="col-sm-6">
        <dt>Description lists</dt>
        <dd>A description list is perfect for defining terms.</dd>
        <dt>Euismod</dt>
        <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
        <dd>Donec id elit non mi porta gravida at eget metus.</dd>
        <dt>Malesuada porta</dt>
        <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
        <dt>Description lists</dt>
        <dd>A description list is perfect for defining terms.</dd>
        <dt>Euismod</dt>
        <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
        <dd>Donec id elit non mi porta gravida at eget metus.</dd>
        <dt>Malesuada porta</dt>
        <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
      </dl>
      <li>Lorem ipsum dolor sit amet</li>
      <li>Consectetur adipiscing elit</li>
      <li>Integer molestie lorem at massa</li>
      <li>Facilisis in pretium nisl aliquet</li>
      <li>Nulla volutpat aliquam velit
        <ul>
          <li>Phasellus iaculis neque</li>
          <li>Purus sodales ultricies</li>
          <li>Vestibulum laoreet porttitor sem</li>
          <li>Ac tristique libero volutpat at</li>
        </ul>
      </li>
      <li>Faucibus porta lacus fringilla vel</li>
      <li>Aenean sit amet erat nunc</li>
      <li>Eget porttitor lorem</li>
    </div>
  </div>
</div>