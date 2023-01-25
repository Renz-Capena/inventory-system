<?php
    session_start();

    // echo $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/admin_dashboard.css">
</head>
<body>
    <div class='nav_wrapper'>
        <nav>
            <ul>
                <li>Dashboard</li>
                <li id='schoolBtn'>Schoool</li>
            </ul>
        </nav>
    </div>

    <div class='dashBoardBody'>
        <!-- Ilagay dito ang dashboard -->
    </div>

    <script>
        $(document).ready(function(){
            $('#schoolBtn').click({
                
            })
        })
    </script>
</body>
</html>