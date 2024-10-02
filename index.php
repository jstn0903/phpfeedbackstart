<?php
include 'db.php';

// Fetch previous names and emails from the database
$nameQuery = "SELECT DISTINCT name FROM feedbacks";
$emailQuery = "SELECT DISTINCT email FROM feedbacks";

$nameResult = $conn->query($nameQuery);
$emailResult = $conn->query($emailQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" 
    content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <title>Leave Feedback</title>
</head>
<body class="mb-5">
    <nav class="navbar 
    navbar-expand-sm 
    navbar-dark 
    bg-dark mb-4">

        <div class="container">
            <a class="navbar-brand" 
            href="#"
            >Kodego Bootcamp</a>

            <button class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" 
            aria-controls="navbarNav" 
            aria-expanded="false" 
            aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" 
            id="navbarNav">

                <ul class="navbar-nav 
                          ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" 
                        href="./index.php"
                        >Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" 
                        href="./feedback.php"
                        >Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" 
                        href="./about.php"
                        >About</a>
                    </li>
                
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container 
                    d-flex 
                    flex-column 
                    align-items-center">

            <img src="./img/logo.png" 
            width="200" 
            class="mb-3" alt="" />

            <h2>Feedback</h2>

            <p class="lead text-center">Leave feedback for Kodego Bootcamp</p>

            <form action="submit_feedback.php" 
                  method="POST" 
                  class="mt-4 w-75">

                <div class="mb-3">
                    <label for="name" 
                    class="form-label"
                    >Name</label>

                    <input type="text" 
                    class="form-control" 
                    d="name" 
                    name="name" 
                    required placeholder="Enter your name" 
                    list="name-list">

                    <datalist id="name-list">
                        <?php
                        if ($nameResult->num_rows > 0) {
                            while($row = $nameResult->fetch_assoc()) {
                                echo "<option value='" . htmlspecialchars($row['name']) . "'>";
                            }
                        }
                        ?>
                    </datalist>
                </div>

                <div class="mb-3">
                    <label for="email" 
                    class="form-label"
                    >Email</label>

                    <input type="email" 
                    class="form-control" 
                    id="email" 
                    name="email" 
                    required placeholder="Enter your email" 
                    list="email-list">

                    <datalist id="email-list">
                        <?php
                        if ($emailResult->num_rows > 0) {
                            while($row = $emailResult->fetch_assoc()) {
                                echo "<option value='" . htmlspecialchars($row['email']) . "'>";
                            }
                        }
                        ?>
                    </datalist>
                </div>

                <div class="mb-3">
                    <label for="feedback" 
                    class="form-label"
                    >Feedback</label>

                    <textarea class="form-control" 
                    id="feedback" 
                    name="feedback" 
                    rows="3" 
                    required placeholder="Enter your feedback"></textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" 
                    name="submit" 
                    value="send" 
                    class="btn btn-dark w-100"
                    >Submit</button>
                </div>
            </form>
        </div>
    </main>

    <footer class="text-center mt-5">Copyright &copy; 2024</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>