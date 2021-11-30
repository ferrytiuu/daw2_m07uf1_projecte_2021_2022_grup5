<?php

session_name($_POST["nombre"]);
session_start();
session_unset();
$cookie_sessio = session_get_cookie_params();
setcookie(session_name(),'',time() - 86400, $cookie_sessio['path'], $cookie_sessio['domain'], $cookie_sessio['secure'], $cookie_sessio['httponly']); 
session_destroy();

echo '<p>Sessio eliminada</p>
<a href="index.html">
   <button>Inici</button>
</a>'



?>