<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("https://images.adsttc.com/media/images/546e/ba8c/e58e/ce3d/8700/0135/large_jpg/MCC-452_reva.jpg?1416542798");
            background-size: cover;
            /* Change to cover for better responsiveness */
            background-position: center;
            /* Center the image */
            height: 100vh;
            /* Full viewport height */
        }

        .text {
            width: 60%;
            margin: auto;
            color: rgb(red, green, blue);
            /* Change to white for better contrast */
            position: relative;
            top: 5%;
            /* Adjust top for better positioning */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            /* Enhance text shadow for readability */
        }



        .text h2 {
            font-family: 'Times New Roman', serif;
            /* Correct font family syntax */
            font-size: 50px;
            letter-spacing: 2px;
            text-transform: capitalize;
            text-align: center;
        }

        .text h2 span {
            color: green;
            font-size: 60px;
        }

        .go-to-website-box {
            display: block;
            width: fit-content;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-align: center;
            border-radius: 2px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            position: absolute;
            top: 60%;
            /* Adjust position to avoid overlap with text */
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .go-to-website-box:hover {
            background-color: white;
        }

        @media (max-width: 768px) {
            .text {
                width: 80%;
                /* Adjust text width on smaller screens */
                top: 5%;
                /* Adjust top position for smaller screens */
            }

            .text h2 {
                font-size: 30px;
                /* Decrease font size on smaller screens */
            }

            .text h2 span {
                font-size: 40px;
                /* Decrease span size on smaller screens */
            }

            .go-to-website-box {
                top: 70%;
                /* Adjust button position for smaller screens */
            }
        }
    </style>
</head>

<body>
    <div class="text">
        <h2>"Welcome To <span>Blaze</span> Cricket Club"<br><small>-*Managing Your Cricket Career*-</small></h2>
    </div>

    <a href="register.php" class="go-to-website-box">
        Click here to go to our website!
    </a>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>