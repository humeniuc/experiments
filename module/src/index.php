<pre>
<?php
$it = new DirectoryIterator(__DIR__);
foreach ($it as $file) {
    if ($file->isFile()) {
        echo strtr('<a href="{filename}">{filename}</a>', ['{filename}' => htmlspecialchars($file->getFilename())]), '<br/>';
    }

    if ($file->isDir()) {
        echo strtr('<a href="{filename}/index.php">{filename}/</a>', ['{filename}' => htmlspecialchars($file->getFilename())]), '<br/>';
    }
}
?>
</pre>
