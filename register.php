<!-- Codice HTML del form di registrazione -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Registrazione</title>
</head>
<body>

<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
            <a class="navbar-brand" href="#"><img src="https://cdn.discordapp.com/attachments/439078769613864960/1108900626613669918/logo1.png" alt="Logo" height="30"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<?php
// Dati di connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dblogin"; // Inserisci il nome del tuo database
$tablename = "dblogin"; // Inserisci il nome della tua tabella

// Creazione della connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Messaggi di notifica
$success_message = "";
$error_message = "";

// Controllo se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupero i dati dal form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Verifica se la password e la conferma password corrispondono
    if ($password !== $confirm_password) {
        $error_message = "La password e la conferma password non corrispondono.";
    } else {
        // Esecuzione della query per verificare se l'username esiste già
        $check_query = "SELECT * FROM $tablename WHERE username = '$username'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            $error_message = "L'username esiste già. Scegli un altro username.";
        } else {
            // Esecuzione della query per inserire i dati nella tabella
            $insert_query = "INSERT INTO $tablename (username, password) VALUES ('$username', '$password')";

            if ($conn->query($insert_query) === TRUE) {
                $success_message = "Registrazione avvenuta con successo.";
            } else {
                $error_message = "Errore durante la registrazione: " . $conn->error;
            }
        }
    }
}

// Chiusura della connessione
$conn->close();
?>

<div class="container mt-5">
        <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Registrati</h2>

                <?php if (!empty($success_message)) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success_message; ?>
                    </div>
                <?php } ?>

                <?php if (!empty($error_message)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php } ?>

                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <button class="btn btn-outline-secondary" type="button" id="toggle-password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Conferma Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    <button class="btn btn-outline-secondary" type="button" id="toggle-confirm-password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
                    <button type="submit" class="btn btn-primary">Registrati</button>
                </form>
                <p class="mt-3">Hai già un account? <a href="login.php">Effettua il login</a></p>
            </div>
            </div>
            </div>
        </div>
    </div>

    <script>
    // Toggle password visibility
    document.getElementById("toggle-password").addEventListener("click", function () {
        var passwordInput = document.getElementById("password");
        var type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);
        this.querySelector("i").classList.toggle("fa-eye");
        this.querySelector("i").classList.toggle("fa-eye-slash");
    });

    // Toggle confirm password visibility
    document.getElementById("toggle-confirm-password").addEventListener("click", function () {
        var confirmPasswordInput = document.getElementById("confirm_password");
        var type = confirmPasswordInput.getAttribute("type") === "password" ? "text" : "password";
        confirmPasswordInput.setAttribute("type", type);
        this.querySelector("i").classList.toggle("fa-eye");
        this.querySelector("i").classList.toggle("fa-eye-slash");
    });
</script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
