<div style="display: flex; height: 75vh; overflow:hidden; outline:1px solid #ccc; margin: 15px 0;">
    <div style="flex: 1">
        <p>( Deschide consola ca să vezi ordinea de încărcare )</p>

        <ol>
            <li>Declar <code>events.js</code> în <code>head</code></li>
            <li><code>events.js</code> importă <code>operations.js</code> (dependință)</li>
            <li>Randez pagina, la sfârșit am un <code>&lt;script&gt;</code></li>
            <li>
                Ordinea încărcării este
                <code>&lt;script&gt;</code>,
                <code>operations.js</code>,
                <code>events.js</code>:

                Modulele se execută după alte scripturi si după încărcarea paginii.
                <a href="https://javascript.info/modules-intro#module-scripts-are-deferred">https://javascript.info/modules-intro#module-scripts-are-deferred</a>
            </li>
        <ol>
    </div>

    <div style="flex: 1; overflow: scroll; outline:1px solid #ccc; padding: 5px;">
        <?php foreach ([
            '/index.php',
            '/module_events.js',
            '/module_operations.js',
        ] as $source) { ?>
        <h2><?= htmlspecialchars($source) ?></h2>
        <pre><?= htmlspecialchars(file_get_contents(__DIR__. $source)) ?></pre>
        <?php } ?>
    </div>
</div>
