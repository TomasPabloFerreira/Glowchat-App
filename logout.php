<?php

include('header.php');

session_start();
session_unset();
session_destroy();

require('islogged.php');

?>

</div>
</div>
</div>

</body>
</html>