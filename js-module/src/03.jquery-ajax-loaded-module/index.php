<?php 
$jqueryUrl = 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js';
// $jqueryUrl = 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js';
// $jqueryUrl = 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js';
?>
<html>
    <head>
        <script type="importmap">
        {
            "imports": {
                "modules_root/" : "./"
            }
        }
        </script>

        <script src="<?= $jqueryUrl ?>"></script>
    </head>
    <body>
        <button id="ajaxLauncher">Load Module</button>
        <div id="content"></div>

        <script src="index.js"></script>
        
        <?php require __DIR__. '/help.php'; ?>
    </body>
</html>
