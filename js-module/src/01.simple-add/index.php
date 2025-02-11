<html>
    <body>
        <input type="text" value="0" id="val" />
        <button id="plus">+</button>
        <button id="minus">-</button>

        <script type="module">
        // Modul declarat inline
        import { _inc, _dec } from './module_operations.js';

        console.log('module loaded');
        const input = document.getElementById('val');

        document.getElementById('plus').addEventListener('click', function (event) {
            input.value = _inc(input.value);
        });

        document.getElementById('minus').addEventListener('click', function (event) {
            input.value = _dec(input.value);
        });
        </script>

    </body>
</html>
