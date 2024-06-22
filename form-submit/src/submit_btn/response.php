<pre>
<?php
var_dump(date('Y-m-d H:i:s'));                   
var_dump(microtime(true));                   
echo PHP_SAPI == 'cli' ? "\n----------\n" : '<hr />';

$get = var_export($_GET, true);                  
$post = var_export($_POST, true);                
                                                    
echo '$_GET=', htmlspecialchars($get), '<br>';   
echo '$_POST=', htmlspecialchars($post), '<br>'; 
?>
<pre>
