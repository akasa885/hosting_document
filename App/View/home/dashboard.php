
<div class="navbar">
  <div class="logo">
    <a href="#"> <h3>Document</h3>  </a>
  </div>
  <div class="toggle" onclick="toggleMenu();">
    <i class="line"></i>
  </div>
  <ul class="menu">
    <li style="--i:1;"> <a href="#">Home</a> </li>
    <li style="--i:3;"> <a href="#">Data Client</a> </li>
    <li style="--i:5;"> <a href="#">Data Package</a> </li>
    <li style="--i:7;"> <a href="<?=homepage?>/logout">Logout</a> </li>
    <li style="--i:9;"> <a href="#"><?=$data->username?></a> </li>
    <li style="--i:11;"> <a href="<?=homepage?>/user"><?php if(isset($data->set_pin)) echo $data->set_pin;?></a> </li>
  </ul>
</div>

<div class="dash-content">
  <section class="notification">
    <h3 class="title">Notification</h3>
    <div class="wrapper-card">
      <div class="notifbx host-card">
        <div class="information">
          <span class="title">Client</span>
          <span class="counter"><?=$data->client_count?></span>
        </div>
        <i class="fa fa-users"></i>
      </div>
      <div class="notifbx pckg-card">
        <div class="information">
          <span class="title">Package</span>
          <span class="counter"><?=$data->pack_count?></span>
        </div>
        <i class="fa fa-cubes"></i>
      </div>
    </div>
  </section>
  <section class="content-media">
    <div class="row-content">
      <?php include 'dash_client.php'; ?>
      <?php include 'dash_package.php'; ?>
    </div>
  </section>
</div>
<script type="text/javascript">
  function toggleMenu() {
    var toggleMenu = document.querySelector('.toggle');
    var menuAct = document.querySelector('.menu');
    toggleMenu.classList.toggle('active');
    menuAct.classList.toggle('active');
  }
</script>
