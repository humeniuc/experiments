<?php 
$form_action = './response.php';
$form_target = "form_response_container";
?>
<html>
<head>
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="events.js?ts=1"></script>

    <?php if (isset($_GET['_enable_fetch']) && $_GET['_enable_fetch'] == 1) { ?>
    <script src="enable_fetch.js"></script>
    <?php } ?>

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
    }

    .response {
        position:fixed;
        width: 100%;
        height: 50vh;
        top: 10px;
        overflow: scroll;
        border: 1px solid #ccc;
    }

    </style>
</head>
<body>

<pre>
TODO: <a href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLFormElement/requestSubmit">https://developer.mozilla.org/en-US/docs/Web/API/HTMLFormElement/requestSubmit</a>

<?php if (isset($_GET['_enable_fetch']) && $_GET['_enable_fetch'] == 1) { ?>
Fetch activ. <a href="<?= $_SERVER['SCRIPT_NAME'] ?>">Dezactivează</a>
<?php } else { ?>
Submit normal <a href="<?= $_SERVER['SCRIPT_NAME'] ?>?_enable_fetch=1">Activează submit-ul cu fetch</a>
<?php } ?>
</pre>


<div class="container">
<div class="forms">
    <fieldset>
        <legend>un formular cu un simplu input se submiteaza la Enter</legend>
        <form method="post" action="<?= htmlspecialchars($form_action) ?>" target="<?= htmlspecialchars($form_target) ?>">
            <input type="text" name="field1" value="unu"/>
        </form>
    </fieldset>


    <fieldset>
        <legend>un formular cu un 2 input nu se submiteaza la Enter</legend>
        <form method="post">
            <input type="text" name="field1" value="unu"/>
            <input type="text" name="field2" value="doi"/>
        </form>
    </fieldset>

    <fieldset>
        <legend>un formular cu un 2 campuri se submiteaza la Enter daca exista un buton de tip submit, chiar si ascuns</legend>
        <form method="post" action="<?= htmlspecialchars($form_action) ?>" target="<?= htmlspecialchars($form_target) ?>">
            <input type="text" name="field1" value="unu"/>
            <input type="text" name="field2" value="doi"/>
            <div style="display:inline-block; margin:0 15px; padding:2px; opacity:0.2">
                <input type="submit" name="submitBtn" value="submitHiddenBtn" style="" />
                buton ascuns
            </div>
        </form>
    </fieldset>

    <em>
        <ol>
        <li>Vreau ca butonul implicit la submit să fie altul decât primul identificat în html.</li>
        <li>tabindex nu functioneaza pentru determinarea butonului implicit</li>
        <li>in general este luat in considerare primul buton</li>
        </ol>
    </em>

    <fieldset>
        <legend>
            Se submitează primul buton identificat în form. Tabindex-ul nu funcționează.
        </legend>

        <form method="post" action="<?= htmlspecialchars($form_action) ?>" target="<?= htmlspecialchars($form_target) ?>">
            <input type="text" name="field1" value="unu" tabindex="1" />
            <input type="text" name="field2" value="doi" tabindex="2" />

            <input type="submit" name="submit1" value="submit value 1 (tabindex 4)" tabindex="4" />
            <input type="submit" name="submit2" value="submit value 2 (tabindex 3)" tabindex="3" />

        </form>
        
    </fieldset>

    <fieldset>
    <legend>
        daca primul buton este dezactivat, formularul nu se submiteaza la enter
    </legend>

    <form method="post" action="<?= htmlspecialchars($form_action) ?>" target="<?= htmlspecialchars($form_target) ?>">
        <input type="text" name="field1" value="unu"/>
        <input type="text" name="field2" value="doi"/>

        <input type="submit" name="submit1" value="submit disabled" disabled="true" />
        <input type="submit" name="submit1" value="submit value 1" />
        <input type="submit" name="submit2" value="submit value 2" />
    </form>
    </fieldset>

    <fieldset>
    <legend>
        pune butonul de submit implicit, duplicat si ascuns, imediat dupa tagul de form pentru a deveni submit-ul implicit
    </legend>

    <form method="post" action="<?= htmlspecialchars($form_action) ?>" target="<?= htmlspecialchars($form_target) ?>">
        <input type="submit" name="submit" value="submit implicit" style="opacity:0.2" />

        <input type="text" name="field1" value="unu"/>
        <input type="text" name="field2" value="doi"/>

        <input type="submit" name="submit" value="submit disabled" disabled="true" />
        <input type="submit" name="submit" value="primul submit, neimplicit" />
        <input type="submit" name="submit" value="submit implicit" />
    </form>
    </fieldset>

    <fieldset>
        <legend>
            strict butoane html
        </legend>

        <form method="post" id="f1" action="<?= htmlspecialchars($form_action) ?>" target="<?= htmlspecialchars($form_target) ?>">
            <input type="text" name="field1" value="unu"/>
            <input type="text" name="field2" value="doi"/>

            <button type="button" name="btn1" value="value_btn_1" onclick="document.getElementById('f1').submit()">button type="button" 1</button>
            <button type="button" name="btn2" value="value_btn_2" onclick="document.getElementById('f1').submit()">button type="button" 2</button>
            <button type="button" name="btn3" value="value_btn_3" onclick="document.getElementById('f1').submit()">button type="button" 3</button>

            <button type="submit" name="submit1" value="value_submit_1" >button type="submit" 1</button>
            <button type="submit" name="submit2" value="value_submit_2" >button type="submit" 2</button>
            <button type="submit" name="submit3" value="value_submit_3" >button type="submit" 3</button>
        </form>
    </fieldset>

    <fieldset>
        <legend>
            butoane cu confirm
        </legend>

        <form method="post" id="f2" action="<?= htmlspecialchars($form_action) ?>" target="<?= htmlspecialchars($form_target) ?>">
            <input type="text" name="field1" value="unu"/>
            <input type="text" name="field2" value="doi"/>

            <button type="submit" name="submit1" value="value_submit_1" >btn 1 fara confirm</button>
            <button type="submit" name="submit2" value="value_submit_2" onclick="<?php echo htmlspecialchars('
                if (confirm("confirm?")) {
                    return true;
                } else {
                    return false;
                }
            '); ?>">btn 2 cu confirm</button>
            <button type="submit" name="submit3" value="value_submit_3" onclick="<?php echo htmlspecialchars('
                if (confirm("confirm?")) {
                    return true;
                } else {
                    return false;
                }
            '); ?>">btn 3 cu confirm</button>
        </form>
    </fieldset>

    <fieldset>
        <legend>
            nested
        </legend>

        <fieldset>
            <legend>form 1</legend>
            <form method="post" action="<?= htmlspecialchars($form_action) ?>" target="<?= htmlspecialchars($form_target) ?>">
                <input type="text" name="field_form_1" value="unu"/>
                <button type="submit" name="submit1" value="form_1_submitted" >submit form 1 (unu)</button>
                    
                <fieldset>
                    <legend> form 2</legend>
                    <form method="post" action="<?= htmlspecialchars($form_action) ?>" target="<?= htmlspecialchars($form_target) ?>">
                        <input type="text" name="field_form_2" value="doi"/>
                        <button type="submit" name="submit2" value="form_2_submitted" >submit form 2</button>
                    </form>
                </fieldset>

                <button type="submit" name="submit3" value="form_3_submitted" >submit form 1 (doi)</button>
            </form>
        </fieldset>
        <em>
            <ol>
            <li>din formularul parinte functioneaza doar butonul 1, care vine inainte de formularul copil</li>
            <li>orice input / buton submiteaza formularul parinte, cu toate inputurile</li>
            </ol>
        </em>
    </fieldset>


    <fieldset>
        <legend>
            Butoane de submit extern formularului (după)
        </legend>

        <?php $form_id = 'external_button_submit_form_after'  ?>
        <form method="post"  id="<?= htmlspecialchars($form_id) ?>" action="<?= htmlspecialchars($form_action) ?>" target="<?= htmlspecialchars($form_target) ?>">
            <input type="text" name="field_1" value="field value" />
            <button type="submit" name="submit_intern_button" value="submit_intern" >submit intern</button>
        </form>

        <button type="submit" name="submit_extern_button_1" value="submit_extern_1" form="<?= htmlspecialchars($form_id) ?>">submit extern 1</button>
        <button type="submit" name="submit_extern_button_2" value="submit_extern_2" form="<?= htmlspecialchars($form_id) ?>">submit extern 2</button>

        <em>
            <ol>
            <li>Butoanele externe submiteaza formularul</li>
            </ol>
        </em>
    </fieldset>

    <fieldset>
        <legend>
            Butoane de submit extern formularului (înainte)
        </legend>

        <?php $form_id = 'external_button_submit_inside'  ?>

        <button type="submit" name="submit_extern_button_1" value="submit_extern_1" form="<?= htmlspecialchars($form_id) ?>">submit extern 1</button>
        <button type="submit" name="submit_extern_button_2" value="submit_extern_2" form="<?= htmlspecialchars($form_id) ?>">submit extern 2</button>

        <form method="post"  id="<?= htmlspecialchars($form_id) ?>" action="<?= htmlspecialchars($form_action) ?>" target="<?= htmlspecialchars($form_target) ?>">
            <input type="text" name="field_1" value="field value" />
            <button type="submit" name="submit_intern_button" value="submit_intern" >submit intern</button>
        </form>
        <em>
            <ol>
            <li>Butoanele externe submiteaza formularul</li>
            </ol>
        </em>
    </fieldset>
</div>

<div class="response_container">
    <iframe class="response" id="form_response_container" name="form_response_container"></iframe>
</div>
</div>

</body>
</html>
