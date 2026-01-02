
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIAKAD | <?= $judul ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>//plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>//plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>//dist/css/adminlte.min.css?v=3.2.0">
<script data-cfasync="false" nonce="7d971148-f379-4927-8728-cb6ddc90335c">try{(function(w,d){!function(j,k,l,m){if(j.zaraz)console.error("zaraz is loaded twice");else{j[l]=j[l]||{};j[l].executed=[];j.zaraz={deferred:[],listeners:[]};j.zaraz._v="5874";j.zaraz._n="7d971148-f379-4927-8728-cb6ddc90335c";j.zaraz.q=[];j.zaraz._f=function(n){return async function(){var o=Array.prototype.slice.call(arguments);j.zaraz.q.push({m:n,a:o})}};for(const p of["track","set","debug"])j.zaraz[p]=j.zaraz._f(p);j.zaraz.init=()=>{var q=k.getElementsByTagName(m)[0],r=k.createElement(m),s=k.getElementsByTagName("title")[0];s&&(j[l].t=k.getElementsByTagName("title")[0].text);j[l].x=Math.random();j[l].w=j.screen.width;j[l].h=j.screen.height;j[l].j=j.innerHeight;j[l].e=j.innerWidth;j[l].l=j.location.href;j[l].r=k.referrer;j[l].k=j.screen.colorDepth;j[l].n=k.characterSet;j[l].o=(new Date).getTimezoneOffset();if(j.dataLayer)for(const t of Object.entries(Object.entries(dataLayer).reduce((u,v)=>({...u[1],...v[1]}),{})))zaraz.set(t[0],t[1],{scope:"page"});j[l].q=[];for(;j.zaraz.q.length;){const w=j.zaraz.q.shift();j[l].q.push(w)}r.defer=!0;for(const x of[localStorage,sessionStorage])Object.keys(x||{}).filter(z=>z.startsWith("_zaraz_")).forEach(y=>{try{j[l]["z_"+y.slice(7)]=JSON.parse(x.getItem(y))}catch{j[l]["z_"+y.slice(7)]=x.getItem(y)}});r.referrerPolicy="origin";r.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(j[l])));q.parentNode.insertBefore(r,q)};["complete","interactive"].includes(k.readyState)?zaraz.init():j.addEventListener("DOMContentLoaded",zaraz.init)}}(w,d,"zarazData","script");window.zaraz._p=async d$=>new Promise(ea=>{if(d$){d$.e&&d$.e.forEach(eb=>{try{const ec=d.querySelector("script[nonce]"),ed=ec?.nonce||ec?.getAttribute("nonce"),ee=d.createElement("script");ed&&(ee.nonce=ed);ee.innerHTML=eb;ee.onload=()=>{d.head.removeChild(ee)};d.head.appendChild(ee)}catch(ef){console.error(`Error executing script: ${eb}\n`,ef)}});Promise.allSettled((d$.f||[]).map(eg=>fetch(eg[0],eg[1])))}ea()});zaraz._p({"e":["(function(w,d){})(window,document)"]});})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">

    <div class="card-header text-center">
        <img src="<?= base_url('assets/' . $web['logo_header']) ?>" 
         width="300" 
         alt="Logo Header">

        <a href="<?= base_url('auth') ?>" class="siakad-title">
        <b><br>SIMBARU</b> PERADABAN
        </a>
    </div>
    <div class="card-body">
      <?php
      session();
      $validasi = \Config\Services::validation();
    if (session()->get('pesan')) { 
      echo '<div class= "alert alert-danger">';
      echo session()->get('pesan');
      echo '</div>';
      } ?>

      <?php echo form_open('Auth/Ceklogin'); ?>
        <div class="form-group">
          <Label for="username">Username</Label>
          <input name="username" class="form-control" placeholder="USERNAME/NIM/NIP">
          <p class ="text-danger"> <?= $validasi->getError('username'); ?> </p>
        </div>
        
        <div class="form-group">
          <Label for="username">Level</Label>
          <select name="level" class="form-control" required>
               <option value="">-- Pilih Level --</option>
               <option value="1">Admin</option>
                <option value="2">Dosen</option>
                <option value="3">Mahasiswa</option>
            </select>

         <p class ="text-danger"> <?= $validasi->getError('level'); ?> </p>
        <div class="input-group-append">
           
      </div>

        <div class="form-group">
          <Label for="username">Password</Label>
        <input name="password" type="password" class="form-control" placeholder="Password">
        <p class ="text-danger"> <?= $validasi->getError('password'); ?> </p>
        </div>
      
        <div class="row">
          <div class="col-6">
            <a href="<?= base_url() ?>" class="btn btn-success btn-block btn-flat"><i class="fa-solid fa-globe"></i>Website</a>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa-solid fa-arrow-right-to-bracket"></i>Login</button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close('Auth/login'); ?>

      
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('AdminLTE') ?>//plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('AdminLTE') ?>//plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('AdminLTE') ?>//dist/js/adminlte.min.js?v=3.2.0"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"2437d112162f4ec4b63c3ca0eb38fb20","server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>
</html>
