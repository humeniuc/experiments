<html>
    <head>
        <script type="importmap">
        {
            "imports": {
                "modules_root/" : "./"
            }
        }
        </script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
    </head>
    <body>
        <button id="ajaxLauncher">Load Module</button>
        <div id="content"></div>
        <script src="index.js"></script>


        <script type="module">
        // import { registerEvents } from 'modules_root/module_events.js';
        </script>
        
        <?php require __DIR__. '/help.php'; ?>
    </body>
</html>
