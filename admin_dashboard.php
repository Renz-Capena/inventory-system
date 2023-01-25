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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/admin_dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class='container m-0 p-0 d-flex'>
        <div class='nav_wrapper'>
            <nav>
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height:100vh">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <img class="bi me-2" width="50" height="50" src="https://sdovalenzuelacity.deped.gov.ph/wp-content/uploads/2021/04/New-DO-Logo.png" alt="logo">
                    <span class="fs-4">Inventory System</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a id="test2" class="nav-link link-dark active" href="javascript:window.location.reload(true)">
                        <span class="bi me-2" width="16" height="16"><i class="fa-solid fa-chart-simple"></i></span>
                        Dashboard
                        </a>
                    </li>
                    <li id='schoolBtn'>
                        <a id="test" href="#" class="nav-link link-dark">
                        <span class="bi me-2" width="16" height="16"><i class="fa-solid fa-school"></i></span>
                        School
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link link-dark">
                        <span class="bi me-2" width="16" height="16"><i class="fa-solid fa-phone"></i></span>
                        Contact
                        </a>
                    </li>
                    </ul>
                </div>
                <!-- <ul>
                    <li><a href="javascript:window.location.reload(true)">Dashboard</a></li>
                    <li id='schoolBtn'>Schoool</li>
                </ul> -->
            </nav>
        </div>
    
        <div id='dashBoardBody'>
            <!-- Ilagay dito ang dashboard -->dashboard
        </div>
    </div>



    <!-- MODALS -->
    <div class="modal fade" id="addSchool" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add School</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputSchoolName" placeholder="School Name">
            <label for="floatingInput">School Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputPrincipal" placeholder="Principal">
            <label for="floatingInput">Principal</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputAddress" placeholder="Address">
            <label for="floatingInput">Address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputContact" placeholder="Contact Number">
            <label for="floatingInput">Contact Number</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id='addSchoolBtn'>Add School</button>
      </div>
    </div>
  </div>
</div>

    <script>
        $(document).ready(function(){
            // NAV
            $('#schoolBtn').click(function(){
                $('#dashBoardBody').load("table.php");
                $('#test').addClass('active');
                $('#test2').removeClass('active');
            })

            // ADD SCHOOL
            $("#addSchoolBtn").click(function(){
                const schoolName = $("#inputSchoolName").val();
                const principal = $("#inputPrincipal").val();
                const address = $("#inputAddress").val();
                const contact = $("#inputContact").val();

                $.ajax({
                    url : "addSchool.php",
                    method : "post",
                    data : {
                        schoolName : schoolName,
                        principal : principal,
                        address : address,
                        contact : contact
                    },
                    success(){
                        $('#dashBoardBody').load("table.php");
                        // $('#dashBoardBody').html(e);

                        $("#inputSchoolName").val("");
                        $("#inputPrincipal").val("");
                        $("#inputAddress").val("");
                        $("#inputContact").val("");
                    }
                })

            })
            
            // SEARCH DATA
            $("#dashBoardBody").on('keyup','#searchBar',function(){
                const searchValue = $(this).val();

                $.ajax({
                    url: "search.php",
                    method: "post",
                    data:{
                        searchValue : searchValue
                    },
                    success(e){
                        $('#idForSearchOutput').html(e);

                    },
                })
            })

            // DELETE SCHOOL
            $("#dashBoardBody").on('click','#deleteBtn',function(){
                const id = $(this).val();
                
                if(confirm(`Are you sure you want to delete this?`)){
                    $.ajax({
                        url:"delete.php",
                        method:'post',
                        data:{
                            id:id
                        },
                        success(e){
                            // $('#dashBoardBody').load("table.php");
                            // $('#dashBoardBody').html(e);
                            $('#dashBoardBody').load("table.php");

                        }
                    })
                }
            })

            // VIEW (NOTE DONE)
            $("#dashBoardBody").on("click","#viewBtn",function(){

                const schoolName = $(this).val().toLowerCase();

                $.ajax({
                    url: "schoolView.php",
                    method: "post",
                    data:{
                        schoolName : schoolName
                    },
                    success(data){
                        $("#dashBoardBody").html(data);
                    }
                })
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php include 'footer.php' ?>
</body>
</html>