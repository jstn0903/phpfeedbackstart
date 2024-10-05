
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <title>Feedback</title>
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

                <ul class="navbar-nav ms-auto">
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

    <div class="container">
        <h1 class="text-center 
                    mt-5 
                    mb-5"
                    >Past Feedback</h1>

        <div id="feedback-section">
            
            <?php
            include 'db.php';
            $sql = "SELECT name, feedback , reg_date FROM feedbacks";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='card mb-3'>
                            <div class='card-body text-center my-5'>
                            <p class='card-text'>" . $row["feedback"]. "</p>
                            <h5 class='card-title'>" . $row["name"]. "</h5>
                            <h6 class='card-subtitle mb-2 text-muted'>" . htmlspecialchars($row["reg_date"]) . "</h6>
                            </div></div>";
                }
            } else {
                echo "<p class='text-center>No feedback yet.";
            }
            $conn->close();
            ?>
        </div>
    </div>
    
    <footer class="text-center mt-5 mb-10">Copyright &copy; 2024</footer>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
</body>
</html>
