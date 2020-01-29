
<!DOCTYPE html>
<html>
<head>
  <title>404 Not Found</title>
  <link href="<?php echo base_url(); ?>asset/notfound.css" rel="stylesheet">
</head>
<body>


<div class="box">
  <div class="box__ghost">
    <div class="symbol"></div>
    <div class="symbol"></div>
    <div class="symbol"></div>
    <div class="symbol"></div>
    <div class="symbol"></div>
    <div class="symbol"></div>
    
    <div class="box__ghost-container">
      <div class="box__ghost-eyes">
        <div class="box__eye-left"></div>
        <div class="box__eye-right"></div>
      </div>
      <div class="box__ghost-bottom">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
    <div class="box__ghost-shadow"></div>
  </div>
  
  <div class="box__description">
    <div class="box__description-container">
      <div class="box__description-title">Whoops!</div>
      <div class="box__description-text">It seems like we couldn't find the page you were looking for</div>
    </div>
    
    <a href="javascript:history.go(-1)" class="box__button">Go back</a>
    
  </div>
  
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/notfound.js"></script>
</body>
</html>
