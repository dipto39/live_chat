<?php
session_start();
session_unset();
session_destroy();
echo '<script>window.location.replace("http://dipto.cf/live_chat/");</script>';

 ?>