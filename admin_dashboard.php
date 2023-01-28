<?php
    require "db.php";
    session_start();

    if(empty($_SESSION['status']) || $_SESSION['status'] == 'invalid'){

        header("location: index.php");
    }

    if($_SESSION['status'] == 'client'){

        header("location: client_dashboard.php");
    }
    
    // Logout btn
    if(isset($_POST['logoutBtn'])){
        unset($_SESSION['id']);
        unset($_SESSION['status']);

        header("location: index.php");
    }

    // =================FOR DASH BOARD COUNT
    // ADMIN
    $countAdmin = "SELECT * FROM `users` WHERE role='admin'";
    $listAdmin = $con->query($countAdmin);
    $adminCount = $listAdmin->num_rows;
    // CLIENT
    $countClient = "SELECT * FROM `users` WHERE role='client'";
    $listClient = $con->query($countClient);
    $clientCount = $listClient->num_rows;
    // SCHOOL
    $countSchool = "SELECT * FROM `schools`";
    $listSchool = $con->query($countSchool);
    $schoolCount = $listSchool->num_rows;

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
<body style="background: url(https://cdn.pixabay.com/photo/2017/07/01/19/48/background-2462431_960_720.jpg) no-repeat; background-size: cover; background-color: #e5e5e5; background-blend-mode: overlay;">
    <header class="d-flex align-items-center py-2" style="background-color: white; position: absolute; top: 20px; right:20px; padding-inline: 72vw 15px;  border-radius: 10px;">
        <span><i class="fa-solid fa-user fs-4 mt-1" style="color: #1a1a1a"></i></span>
        <div class="dropdown">
            <a id="dropdownBtn" class="text-decoration-none dropdown-toggle ps-1" style="color: #1a1a1a" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
            </a>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="#">
                <form action="" method="post">
                    <input type="submit" class="btn btn-danger btn-sm mt-2" name="logoutBtn" value="LOGOUT">
                </form>
                </a></li>
            </ul>
        </div>
        </div>
    </header>
    <div class='container-fluid m-0 p-0 m-0 flex-grow-1 d-flex'>
        <div class='nav_wrapper'>
            <nav>
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-light" style="width: 280px; height:100vh; ">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <img class="bi me-2" width="50" height="50" src="https://sdovalenzuelacity.deped.gov.ph/wp-content/uploads/2021/04/New-DO-Logo.png" alt="logo">
                    <span class="fs-4 text-light">Inventory System</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a id="navBtn1" class="nav-link link-light active" href="javascript:window.location.reload(true)">
                        <span class="bi me-2" width="16" height="16"><i class="fa-solid fa-chart-simple"></i></span>
                        Dashboard
                        </a>
                    </li>
                    <li id='schoolBtn'>
                        <a id="navBtn2" href="#" class="nav-link link-light">
                        <span class="bi me-2" width="16" height="16"><i class="fa-solid fa-school"></i></span>
                        School
                        </a>
                    </li>
                    <li id='manageUserBtn'>
                        <a id='navBtn3' href="#" class="nav-link link-light">
                        <span class="bi me-2" width="16" height="16"><i class="fa-solid fa-users"></i></span>
                        Manage Users
                        </a>
                    </li>
                    <li id='contactBtnNav'>
                        <a id='navBtn4' href="#" class="nav-link link-light">
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
    
        <div id='dashBoardBody' class="mx-auto" style="width: 70%; margin-top: 110px;">
            <!-- Ilagay dito ang dashboard -->
            <div class=" text-secondary fw-bold p-2 ps-0 mb-3 w-25 h3">Dashboard</div>
            <div class="d-flex py-5 px-5 text-light" style="gap: 100px; background-color: white;">
                <div class="card w-100" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; max-width: 350px">
                    <div class="card-body bg-primary rounded-1">
                        <!-- Title -->
                        <h4 class="card-title"><i class="fa-solid fa-users-gear me-3"></i><?php echo $adminCount ?> <br> <p class="mt-2">System Admin</p></h4>
                        <hr>
                        <!-- Text -->
                        <p class="card-text">Number of People who have more control to the system.</p>
                        <button class="btn btn-rounded text-light px-4 btn-md" style="background-color: rgba(0, 0, 0, 0.3);">See more<i class="fa-solid fa-arrow-up-right-from-square ms-2"></i></button>
                    </div>
                </div>
                <div class="card w-100" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; max-width: 350px">
                    <div class="card-body bg-success rounded-1">
                        <!-- Title -->
                        <h4 class="card-title"><i class="fa-solid fa-school me-3"></i><?php echo $schoolCount ?> <br> <p class="mt-2">Schools</p></h4>
                        <hr>
                        <!-- Text -->
                        <p class="card-text">Number of registered School.</p>
                        <button class="btn btn-rounded text-light px-4 btn-md" style="background-color: rgba(0, 0, 0, 0.3);">See more<i class="fa-solid fa-arrow-up-right-from-square ms-2"></i></button>
                    </div>
                </div>
                <div class="card w-100" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; max-width: 350px">
                    <div class="card-body bg-danger rounded-1">
                        <!-- Title -->
                        <h4 class="card-title"><i class="fa-solid fa-users me-3"></i><?php echo $clientCount ?> <br> <p class="mt-2">Users</p></h4>
                        <hr>
                        <!-- Text -->
                        <p class="card-text">Number of registered users.</p>
                        <button class="btn btn-rounded text-light px-4 btn-md" style="background-color: rgba(0, 0, 0, 0.3);">See more<i class="fa-solid fa-arrow-up-right-from-square ms-2"></i></button>
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

    <!-- MODAL EDIT EQUIPMENT -->
    <div class="modal fade" id="editEquipmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Equipment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id='editEquipmentModalBody' class="modal-body">
                <!-- school update info -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id='saveEditEquipmentBtn' data-bs-dismiss="modal">Save changes</button>
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

    <!-- MODAL MANAGE USER (ADD) -->
    <div class="modal fade" id="addUserManageUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id='modalBodyAddUserSchool' class="modal-body">
                <!-- add school modal info -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id='addUserDbBtn' class="btn btn-primary" data-bs-dismiss="modal">Add User</button>
            </div>
            </div>
        </div>
    </div>

    <!-- MODAL MANAGE USER (EDIT) -->
    <div class="modal fade" id="EditUserManageUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id='editModalManageUser' class="modal-body">
                <!-- Modal edit body in another index -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id='updateUserManageUser'>Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            // logout
            $('#dropdownBtn').click(function(){
                
                $('.dropdown-menu').toggleClass('d-block');
            })

            // NAV
            $('#schoolBtn').click(function(){
                $('#dashBoardBody').load("table.php");

                $('#navBtn1').removeClass('active');
                $('#navBtn2').addClass('active');
                $('#navBtn3').removeClass('active');
                $('#navBtn4').removeClass('active');
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

                                    $("#inputCode").val("")
                                    $("#inputArticle").val("")
                                    $("#inputDescription").val("")
                                    $("#inputDate").val("")
                                    $("#inputUnitValue").val("")
                                    $("#inputTotalValue").val("")
                                    $("#inputSourceOfFunds").val("")
                                }
                            })

                            
                        }
                    })
    
                    
                }else{
                    $("#inputCode").val("");
                    $("#inputArticle").val("");
                    $("#inputDescription").val("");
                    $("#inputDate").val("");
                    $("#inputUnitValue").val("");
                    $("#inputTotalValue").val("");
                    $("#inputSourceOfFunds").val("");
                    confirm(`Please fill up all the fields!`)

                }

            })

            // DELETE EQUIPMENT ON DB
            $("#dashBoardBody").on('click','#deleteEquipmentBtn',function(){
                const id = $(this).val()

                const schoolNameForDelete = $("#schoolNameForDeleteAndSearch").val();


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

            // EDIT EQUIPMENT MODAL FORM UPDATE
            $("#dashBoardBody").on("click","#editEquipmentBtn",function(){
                const id = $(this).val()


                $.ajax({
                    url: "schools_equipment/edit_equipment_modal.php",
                    method: 'post',
                    data: {
                        id:id
                    },
                    success(e){
                        $("#editEquipmentModalBody").html(e)
                    }
                })

            })

            // UPDATE EQUIPMENT ON DB
            $("#saveEditEquipmentBtn").click(function(){

                const id = $("#updateIdEquipment").val();
                const schoolName = $("#updateSchoolNameEquipment").val();

                const code = $("#inputCodeEdit").val();
                const article = $("#inputArticleEdit").val();
                const description = $("#inputDescriptionEdit").val();
                const date = $("#inputDateEdit").val();
                const unitValue = $("#inputUnitValueEdit").val();
                const totalValue = $("#inputTotalValueEdit").val();
                const sourceOfFunds = $("#inputSourceOfFundsEdit").val();

                if(code && article && description && date && unitValue && totalValue && sourceOfFunds){
                    $.ajax({
                        url:"schools_equipment/update_equipment.php",
                        method:'post',
                        data:{
                            id:id,
                            code : code,
                            article : article,
                            description : description,
                            date : date,
                            unitValue : unitValue,
                            totalValue : totalValue,
                            sourceOfFunds : sourceOfFunds
                        },
                        success(){
                            // $("#dashBoardBody").html(e)
    
                            $.ajax({
                                    url: "schools_equipment/equipmentTbody.php",
                                    method : 'post',
                                    data:{
                                        schoolName : schoolName
                                    },
                                    success(e){
                                        $("#equipmentTableTbody").html(e)
    
                                        $("#inputCodeEdit").val("")
                                        $("#inputArticleEdit").val("")
                                        $("#inputDescriptionEdit").val("")
                                        $("#inputDateEdit").val("")
                                        $("#inputUnitValueEdit").val("")
                                        $("#inputTotalValueEdit").val("")
                                        $("#inputSourceOfFundsEdit").val("")
                                    }
                            })
                        }
                    })
                }
            })

            // SEARCH EQUIPMENT
            $("#dashBoardBody").on("keyup","#searchEquipmentInput",function(){
                const searchValue = $(this).val();
                const schoolName = $("#schoolNameForDeleteAndSearch").val();

                $.ajax({
                    url:"schools_equipment/search_equipment.php",
                    method:"post",
                    data:{
                        searchValue : searchValue,
                        schoolName : schoolName
                    },
                    success(e){
                        $("#equipmentTableTbody").html(e)
                    }
                })
            })

            // MANAGE USER BUTTON
            $("#manageUserBtn").click(function(){

                $('#navBtn1').removeClass('active');
                $('#navBtn2').removeClass('active');
                $('#navBtn3').addClass('active');
                $('#navBtn4').removeClass('active');

                $("#dashBoardBody").load("manage_user/manageUser.php")
            })

            // MANAGE USER (ADD USER BUTTON FOR MODAL)
            $("#dashBoardBody").on("click","#addUsersSchoolsModal",function(){
                $("#modalBodyAddUserSchool").load("manage_user/addUserSchoolList.php")
            })

            // MANAGE USER (ADD USER BTN ON DB)
            $("#addUserDbBtn").click(function(){
                const email = $("#inputEmail").val();
                const pass = $("#inputPassword").val();
                const role = $("#inputRole").val();
                const school = $("#inputSchool").val();

                if(email && pass){
                    $.ajax({
                        url:"manage_user/addUser.php",
                        method:"post",
                        data:{
                            email:email,
                            pass:pass,
                            role:role,
                            school:school
                        },
                        success(){
                            $("#manageUserTbody").load("manage_user/manageUserTbody.php")
                        }
                    })
                }else{
                    $("#inputEmail").val("");
                    $("#inputPassword").val("");

                    confirm("Please fill up all field!")
                }
            })

            // MANAGE USER (DELETE USER BTN ON DB)
            $("#dashBoardBody").on("click","#deleteUserManageUser",function(){
                const id = $(this).val();

                if(confirm("Are you sure to delete this item?")){
                    $.ajax({
                        url:"manage_user/deleteUser.php",
                        method:'post',
                        data:{
                            id:id
                        },
                        success(){
                            $("#manageUserTbody").load("manage_user/manageUserTbody.php")
                        }
                    })
                }
            })

            // MANAGE USER (EDIT USER BTN FOR MODAL)
            $("#dashBoardBody").on("click","#editUserManageUser",function(){
                const id = $(this).val();

                $.ajax({
                    url:"manage_user/editUserModal.php",
                    method:"post",
                    data:{
                        id:id
                    },
                    success(e){
                        $("#editModalManageUser").html(e)
                    }
                })
            })

            // MANAGE USER (UPDATE BTN ON DB)
            $("#updateUserManageUser").click(function(){

                const id = $("#updateUserIdManageUser").val();
                const email = $("#inputEmailEdit").val();
                const pass = $("#inputPasswordEdit").val();
                const role = $("#inputRoleEdit").val();
                const school = $("#inputSchoolEdit").val();

                $.ajax({
                    url: "manage_user/updateUser.php",
                    method:"post",
                    data:{
                        id : id,
                        email : email,
                        pass : pass,
                        role : role,
                        school : school
                    },
                    success(){
                        $("#manageUserTbody").load("manage_user/manageUserTbody.php")
                        // $("#manageUserTbody").html(e)
                    }
                })
            })

            // MANAGE USER (SEARCH ON DB)
            $("#dashBoardBody").on("keyup","#searchUserDb",function(){
                const searchValue = $(this).val()

                $.ajax({
                    url: "manage_user/userSearch.php",
                    method:"post",
                    data:{
                        searchValue : searchValue
                    },
                    success(e){
                        $("#manageUserTbody").html(e)
                    }
                })
            })

            // CONTACT
            $("#contactBtnNav").click(function(){
                $('#navBtn1').removeClass('active');
                $('#navBtn2').removeClass('active');
                $('#navBtn3').removeClass('active');
                $('#navBtn4').addClass('active');
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php include 'footer.php' ?>
</body>
</html>