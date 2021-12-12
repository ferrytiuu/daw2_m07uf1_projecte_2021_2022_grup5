<?php
//session_name("usuario");
if (!isset($_SESSION))
  {
    session_start();
  }

$cookie_sessio = session_get_cookie_params();
setcookie("PHPSESSID",'',time() -86400, $cookie_sessio['path'], $cookie_sessio['domain'], $cookie_sessio['secure'], $cookie_sessio['httponly']); 
session_unset();
session_destroy();
?>

<html>
<head>
    <link rel='stylesheet' type='text/css' media='screen' href='css/estils.css'>
    <title>
        Inici
    </title>
</head>
<body>

<?php
echo '<p>Sessio eliminada</p>
<a href="index.html">
   <button>Inici</button>
</a>'
?>
  </body>
</html>