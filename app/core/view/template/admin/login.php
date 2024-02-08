<title>Login</title>
<div class="container p-4">
    <div class="row">
        <div class="col"></div>

        <form method="post" class="col-md-5 p-2 card d-grid gap-2">
            <div class="form-group">
                <h1>Confirme su identidad</h1>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="name" id="nombre" placeholder="ingrese el nombre">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="contrasenia" id="contrasenia"
                    placeholder="ingrese la contraseña">
            </div>
            <div class="form-group d-grid gap-2">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
        </form>

        <div class="col"></div>
    </div>
</div>

<?php

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $password = $_POST['contrasenia'];

    // Check if the name and password match the admin credentials
    if ($name === 'admin' && $password === '1234') {
        // Set the session variable
        $_SESSION['admin'] = true;
        header("Location: products");
        exit;
    } else {
        // Display an error message
        echo     '<script>Swal.fire({
            title: "Error",
            text: "Upps, parece no has escrito bien  el nombre de usuario o la contraseña.",
            icon: "error"
        });</script>';
    }
}
?>