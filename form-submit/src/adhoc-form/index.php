<html>
<head>
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="./index.js"></script>
    <style>
    legend {
        background-color:#eee;
        border:1px solid #333;
    }

    fieldset {
        border:1px solid #333;
        margin-bottom:20px;
    }

    .container {
        display: grid;
        grid-template-columns: 3fr 1fr;
        grid-gap: 10px;
    }

    .response_container {
        position: relative;
        outline: 1px solid gold;
    }

    .response {
        position: fixed;
        top: 10px;
    }
    </style>
</head>
<body>

<div class="container">
<div class="forms">

    <fieldset>
        <legend>adhoc form</legend>

        <?php 
        $formdata = array(
            'action' => '', 
            'inputs' => array(
                'field_1' => 'value 1',
                'field_2' => 'value 2',
            ));
        ?>
        <?php ob_start(); ?>
        <input
            id="thecheckbox"
            type="checkbox"
            name="checkbox_1"
            value="value_checkbox"
            data-uncheck-value="default"
            data-formdata="<?= htmlspecialchars(json_encode($formdata)) ?>"
            onchange="_submitForm(this)"
        >
        <?php $html = ob_get_clean(); ?>

        <?php echo $html; ?>

        <pre><?= print_r($formdata, true); ?></pre>
        <pre><?= htmlspecialchars($html); ?></pre>
        <pre><?= htmlspecialchars(file_get_contents('./index.js')); ?></pre>

    </fieldset>
</div>

<div class="response_container">
    <div class="response">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo PHP_SAPI == 'cli' ? PHP_EOL : '<pre>'; print_r(date('Y-m-d H:i:s')); echo PHP_SAPI == 'cli' ? PHP_EOL : '</pre>';
            echo PHP_SAPI == 'cli' ? PHP_EOL : '<pre>'; print_r($_REQUEST); echo PHP_SAPI == 'cli' ? PHP_EOL : '</pre>';
        }
        ?>
        <a href="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" style="display:inline-block; margin-bottom:15px;">reload</a>
    </div>
</div>
</div>

</body>
</html>

