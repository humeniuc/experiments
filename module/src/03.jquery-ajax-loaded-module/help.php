<div style="display: flex; height: 75vh; overflow:hidden; outline:1px solid #ccc; margin: 15px 0;">
    <div style="flex: 1">
        <p>( Deschide consola ca să vezi ordinea de încărcare )</p>

        <ol>
            <li><code>button[@id="ajaxLauncher"]</code> executa un ajax către <code>ajax.php</code></li>
            <li>rezultatul este un <code>html</code>+<code>script</code></li>
        <ol>
    </div>

    <div style="flex: 1; overflow: scroll; outline:1px solid #ccc; padding: 5px;">
        <?php foreach ([
            '/index.php',
            '/index.js',
            '/ajax.php',
            '/module_events.js',
            '/module_operations.js',
        ] as $source) { ?>
        <h2><?= htmlspecialchars($source) ?></h2>
        <pre><?= htmlspecialchars(file_get_contents(__DIR__. $source)) ?></pre>
        <?php } ?>
    </div>
</div>
