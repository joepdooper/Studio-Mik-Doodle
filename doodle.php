<?php
include 'variable.php';
?>
<!DOCTYPE html>
<html>
<head>
<?php include 'header.php'; ?>
</head>
<body>
<div class="popup" style="background:<?php echo $rand_background ?>">
  <div class="inner">
    <h1><?php echo $rand_shouts ?> <a href="index.php"><img src="img/studio_mik_logo.png" alt="Studio Mik"></a></h1>
    <img class="doodle" src="doodle/<?php echo $value ?>" alt="Studio MIK Doodle" style="display:<?php echo $display ?>;" />
  </div>
  <a class="vorige" style="display:<?php echo $displayprev ?>;" href="doodle.php?afb=<?php echo $pagenumprev ?>"></a>
  <a class="volgende" style="display:<?php echo $displaynext ?>;" href="doodle.php?afb=<?php echo $pagenumnext ?>"></a>
</div>
</body>
</html>
