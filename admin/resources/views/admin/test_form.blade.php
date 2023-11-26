

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>


<form id="encryptedForm" action="{{ route('test.store') }}" method="POST">
    @csrf
    <input type="text" id="first_name" name="first_name">
    <button type="button" onclick="encryptAndSubmit()">Submit</button>
</form>

<script>
    function encryptAndSubmit() {
        let firstName = document.getElementById('first_name').value;
        let encryptedFirstName = encryptData(firstName);
        document.getElementById('first_name').value = encryptedFirstName;
        document.getElementById('encryptedForm').submit();
    }

    function encryptData(data) {
        return encryptionHandler(data);
    }

    function encryptionHandler(data) {
        return btoa(data); 
    }
</script>







</body>
</html>
