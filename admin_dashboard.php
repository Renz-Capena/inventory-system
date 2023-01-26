<?php
    require "db.php";
    session_start();

    // echo $_SESSION['role'];
    // $userId = $_SESSION['id'];

    // $selectID = "SELECT * FROM `users` WHERE id = '$userId'";
    // $search = $con->query($selectID);
    // $fetchID = $search->fetch_assoc();
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
    <header class="d-flex align-items-center bg-light px-4 py-2" style="position: absolute; top: 10px; right:20px; border-radius: 10px;">
        <span><i class="fa-solid fa-user fs-4 mt-1" style="color: #1a1a1a"></i></span>
        <div class="dropdown">
            <a class="text-decoration-none dropdown-toggle ps-1" style="color: #1a1a1a" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
            </a>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="#">
                <form action="" method="post">
                    <input type="submit" class="btn btn-danger btn-sm mt-2" name="logout" value="LOGOUT">
                </form>
                </a></li>
            </ul>
        </div>
        </div>
    </header>
    <div class='container-fluid m-0 p-0 m-0 flex-grow-1 d-flex'>
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
    
        <div id='dashBoardBody' class="mx-auto" style="width: 70%; margin-top: 80px">
            <!-- Ilagay dito ang dashboard -->
            <div class="d-flex" style="gap: 120px;">
                <div class="card w-75" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; max-width: 300px">
                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top" src="https://www.untvweb.com/news/wp-content/uploads/2021/03/DepEd-issues-guidelines-web-1024x684.jpg" alt="Card image cap">
                    <a>
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <div class="card-body">
                    <!-- Title -->
                    <h4 class="card-title">72 Schools</h4>
                    <hr>
                    <!-- Text -->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                    <button class="btn btn-primary btn-rounded btn-md">Visit</button>
                </div>
                </div>
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; max-width: 300px">
                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top" src="https://th.bing.com/th/id/R.2796c593aad4f9980cde2dfdaba0f2ff?rik=MR28zsEehEsZzA&riu=http%3a%2f%2ftonlectss.com%2fassets%2fimg%2fproducts%2fADVANCEDCOMPUTERSPATTAMBI.png&ehk=D%2fNf3AxwPqctWVpDl1vs%2bC09upfKpLm4N643hpVwBSI%3d&risl=&pid=ImgRaw&r=0&sres=1&sresct=1" alt="Card image cap">
                    <a>
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <div class="card-body">
                    <!-- Title -->
                    <h4 class="card-title">45 Batches</h4>
                    <hr>
                    <!-- Text -->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                    <button class="btn btn-primary btn-rounded btn-md">Visit</button>
                </div>
                </div>
            </div>
        </div>
    </div>



    <!-- MODALS ADD SCHOOL -->
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

    <!-- MODAL EDIT  SCHOOL -->
    <div class="modal fade" id="editSchool" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit School</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id='editSchoolModal' class="modal-body">
                <!-- school update info -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id='saveEditSchoolBtn' data-bs-dismiss="modal">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <!-- MODAL  ADD EQUIPMENT -->
    <div class="modal fade" id="addEquipmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Equipments</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="inputCode" placeholder="School Name">
                    <label>Code</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="inputArticle" placeholder="School Name">
                    <label>Article</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="inputDescription" placeholder="School Name">
                    <label>Description</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="inputDate" placeholder="School Name">
                    <label>Date Acquired</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="inputUnitValue" placeholder="School Name">
                    <label>Unit Value</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="inputTotalValue" placeholder="School Name">
                    <label>Total Value</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="inputSourceOfFunds" placeholder="School Name">
                    <label>Source of Funds</label>
                </div>
                <!-- insert school name -->
                <input type="hidden" id='insertSchoolName'>
                <!--  -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id='addEquipmentBtnInput' data-bs-dismiss="modal">Add Equipment</button>
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

                if(schoolName && principal && address && contact){
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
                }else{
                    confirm(`Please fill up all the field!`)

                    $("#inputSchoolName").val("");
                    $("#inputPrincipal").val("");
                    $("#inputAddress").val("");
                    $("#inputContact").val("");
                }


            })
            
            // SEARCH IN SCHOOL DATA
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

            // EDIT SCCHOOL POPUP INFO
            $("#dashBoardBody").on("click","#editBtn",function(){
                const id =  $(this).val();

                $.ajax({
                    url: "editSchoolModal.php",
                    method: 'post',
                    data:{
                        id : id
                    },
                    success(e){
                        // $('#dashBoardBody').load("table.php");
                        $('#editSchoolModal').html(e);
                    }
                })
            })

            // EDIT SCHOOL SAVE BUTTON
            $("#saveEditSchoolBtn").click(function(){

                const idEditSchool = $("#idEditSchool").val()
                const schoolNameEdit = $("#inputSchoolNameEdit").val();
                const principalEdit = $("#inputPrincipalEdit").val();
                const addressEdit = $("#inputAddressEdit").val();
                const contactEdit = $("#inputContactEdit").val();

                $.ajax({
                    url:"updateSchool.php",
                    method:"post",
                    data:{
                        id : idEditSchool,
                        schoolNameEdit : schoolNameEdit,
                        principalEdit : principalEdit,
                        addressEdit : addressEdit,
                        contactEdit : contactEdit
                    },
                    success(){
                        $('#dashBoardBody').load("table.php");
        
                    }
                })
            })

            // VIEW EQUIPMENT
            $("#dashBoardBody").on("click","#viewBtn",function(){

                const schoolName = $(this).val().toLowerCase();

                $("#insertSchoolName").val(schoolName);

                $.ajax({
                    url: "schools_equipment/equipment.php",
                    method: "post",
                    data:{
                        schoolName : schoolName
                    },
                    success(data){
                        $("#dashBoardBody").html(data);
                    }
                })
            })

            // ADD EQUIPMENT ON DB
            $("#addEquipmentBtnInput").click(function(){
                
                const schoolName = $("#insertSchoolName").val();

                const code = $("#inputCode").val();
                const article = $("#inputArticle").val();
                const description = $("#inputDescription").val();
                const date = $("#inputDate").val();
                const unitValue = $("#inputUnitValue").val();
                const totalValue = $("#inputTotalValue").val();
                const sourceOfFunds = $("#inputSourceOfFunds").val();

                if(code && article && description && date && unitValue && totalValue && sourceOfFunds){
                    $.ajax({
                        url:"schools_equipment/add_equipment.php",
                        method:'post',
                        data:{
                            schoolName : schoolName,
                            code : code,
                            article : article,
                            description : description,
                            date : date,
                            unitValue : unitValue,
                            totalValue : totalValue,
                            sourceOfFunds : sourceOfFunds
                        },
                        success(){

                            $.ajax({
                                url: "schools_equipment/equipmentTbody.php",
                                method : 'post',
                                data:{
                                    schoolName : schoolName
                                },
                                success(e){
                                    $("#equipmentTableTbody").html(e)
                                }
                            })

                            $("#inputCode").val("")
                            $("#inputArticle").val("")
                            $("#inputDescription").val("")
                            $("#inputDate").val("")
                            $("#inputUnitValue").val("")
                            $("#inputTotalValue").val("")
                            $("#inputSourceOfFunds").val("")
                        }
                    })
    
                    
                }else{
                    confirm(`Please fill up all the fields!`)

                    $("#inputCode").val("");
                    $("#inputArticle").val("");
                    $("#inputDescription").val("");
                    $("#inputDate").val("");
                    $("#inputUnitValue").val("");
                    $("#inputTotalValue").val("");
                    $("#inputSourceOfFunds").val("");
                }

            })

            // DELETE EQUIPMENT ON DB
            $("#dashBoardBody").on('click','#deleteEquipmentBtn',function(){
                const id = $(this).val()

                const schoolNameForDelete = $("#schoolNameForDelete").val();


                if(confirm(`Are you sure to delete this item?`)){
                    $.ajax({
                        url: "schools_equipment/delete_Equipment.php",
                        method:"post",
                        data:{
                            id : id
                        },
                        success(){

                            $.ajax({
                                url: "schools_equipment/equipmentTbody.php",
                                method : 'post',
                                data:{
                                    schoolName : schoolNameForDelete
                                },
                                success(e){
                                    $("#equipmentTableTbody").html(e)
                                }
                            })

                        }
                    })
    
                    
                }


            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php include 'footer.php' ?>
</body>
</html>