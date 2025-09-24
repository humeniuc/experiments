<?php ob_start(); ?>
<input type="text" value="0" id="val" />

<button id="plus">+</button>
<button id="minus">-</button>

<script id="normal_script">
console.log('normal script loaded through ajax');
console.log('you should see and a module script loaded');
</script>

<script id="module_script" type="module">
console.log('module script');
</script>

<script>
console.log('<script> from ajax is executed. calling import(\'modules_root/module_events.js\')');
import('modules_root/module_events.js').then(function(module) {
    console.log('\'modules_root/module_events.js\' was loaded.');
    module.registerEvents();
});
</script>

<?php
$html = ob_get_clean();

header('Content-type: application/json');
echo json_encode([
    'error' => false,
    'html' => $html
], JSON_PRETTY_PRINT);

