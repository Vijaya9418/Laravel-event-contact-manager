
<link rel="stylesheet" media="all" href="{{ asset('css/home.css') }}" type="text/css" />

<link rel="stylesheet" media="all" href="{{ asset('css/post.css') }}" type="text/css" />


<html>
<div id="dpost" class="dpost">
    <div onclick="disclose()" class="closepostdis"><a href='/'>Close</a></div>
    <div class="authdis">Auth: <?php  echo $pdgname; ?> </div>

    <div class="dishead" id="dposthead"></div>
    <div class="contentdisplay">
        <?php  echo $pddata; ?>
    </div>
    <div class="groupdis">Group: <?php echo $pdgroup; ?></div>
    <div class="datedis">
        <?php echo $pddate; ?>
    </div>
    <?php
        if ($pdgname== $_COOKIE['username']) {
            echo "<form action='postdelete' method='post'>
        <input hidden name='postvalue' value='" . $pdtitle . "'>
        <button name='deletepost' class='deletepost'>Delete</button></form>";
        }
     ?>
</div>
<script> document.getElementById('dpost').style.visibility = 'visible';
  
</script>
</html>