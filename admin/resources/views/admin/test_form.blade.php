<!DOTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>

    </head>

    <body>


        <form id="encryptedForm" action="{{ route('test.store') }}" method="POST">
            @csrf
            <input type="text" id="first_name" name="first_name">
            <input type="text" name="last_name">
            <button type="button" onclick="encryptAndSubmit()">Submit</button>
        </form>

        <script>
            function encryptAndSubmit() {
                // Get the input value
                var firstName = document.getElementById('first_name').value;

                // Encrypt the value using CryptoJS and Laravel's APP_KEY
                var encryptedFirstName = CryptoJS.AES.encrypt(firstName, '{{ config('app.key') }}').toString();

                // Set the encrypted value to the hidden input field
                document.getElementById('first_name').value = encryptedFirstName;

                // Submit the form
                document.getElementById('encryptedForm').submit();
            }
        </script>

    </body>

    </html>
