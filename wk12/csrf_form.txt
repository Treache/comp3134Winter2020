<?php
    session_start();
    $_SESSION["confirmation"] = "ABC123";

?>
<html>
  <body>
    <form action="csfr_action.php" method="POST">
      <input name="username" value="host" />
      <input name="password" value="pass" />
      <input type="hidden" name="confirmation" value='<?php $_SESSION["confirmation"]?>' />
    </form>
    <script>
      document.forms[0].submit();
    </script>
  </body>
</html>