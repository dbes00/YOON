<?php 

## Load template view
function load_template($name) {

    if(file_exists('system/template/' . $name . '.inc.php')){

        require_once 'system/template/' . $name . '.inc.php';

    }

}

function load_view($name) {
    
    if(file_exists('system/views/' . $name . '.php')){

        require_once 'system/views/' . $name . '.php';

    }

}

## Load login system
function login_system($username, $password){

    ## Global var
    global $errorMsg;
    global $db;

    if(empty($username)){

        $errorMsg = 'User field is empty';

    } elseif(empty($password)){

        $errorMsg = 'Password field is empty';

    } else {

        $sql = "SELECT * FROM `tbl_users` WHERE user_login = '$username' OR user_email = '$username' AND user_password = '$password'";

        $result = $db->query($sql);

        if($result){

            $User = $result->num_rows;

            if($User == 1){

                $_SESSION['logged'] = TRUE;

                $data = $result->fetch_assoc();

                $_SESSION['user_login'] = $data['user_login'];
                $_SESSION['user_name'] = $data['user_name'];
                $_SESSION['user_surname'] = $data['user_surname'];
                $_SESSION['user_email'] = $data['user_email'];

                header('location: dashboard.php');


            } else {

                $errorMsg = 'Incorrect login or password';

            }
        }
    }
    $db->close();
}


/******************************************************   Dashboard      ********************************************************** */

function countComputers(){

    global $db;

    $query = "SELECT * FROM `tbl_computers`";

    $result = $db->query($query);

    $count = $result->num_rows;

    echo $count;

}

/******************************************************   Computers      ********************************************************** */

## show computers from database

function showComputers(){
    
    global $db;
    global $computers;
    

    $query = "SELECT * FROM `tbl_computers`";

    $result = $db->query($query);

    if($result->num_rows > 0){

        while($computers = $result->fetch_assoc()){
            echo '<tr>';
            echo '<td data-label="Asset code">' . $computers['asset_code'] . '</td>';
            echo '<td data-label="Manufacture">' . $computers['manufacture'] . '</td>';
            echo '<td data-label="Model">' . $computers['model'] . '</td>';
            echo '<td data-label="Type">' . $computers['type'] . '</td>';
            echo '<td data-label="S/N">' . $computers['serial_number'] . '</td>';
            echo '<td data-label="OS">' . $computers['operating_system'] . '</td>';
            echo '<td data-label="Processor">' . $computers['processor'] . '</td>';
            echo '<td data-label="Graphics">' . $computers['graphics'] . '</td>';
            echo '<td data-label="Memory">' . $computers['memory'] . '</td>';
            echo '<td data-label="Action"><a href="assets.php?cat=computers&edit=' . $computers['id'] . '"><i class="fa-solid fa-pen-to-square"></i></a> / <a href="assets.php?cat=computers&delete=' . $computers['id'] . '"><i class="fa-solid fa-trash"></i></a></td>';
            echo '</tr>';

        }

    } 

}


## add computers to database
function addComputers(){

    global $db;

    if(isset($_POST['btn_add_computers'])){   
        
        $InsertcomputerAssetCode = $_POST['add_assetCode'];
        $InsertcomputerManufacture = $_POST['add_computerManufacture'];
        $InsertcomputerModel = $_POST['add_computerModel'];
        $InsertcomputerType = $_POST['add_computerType'];
        $InsertcomputerSN = $_POST['add_computerSN'];
        $InsertcomputerOS = $_POST['add_computerOS'];
        $InsertcomputerProcessor = $_POST['add_computerProcessor'];
        $InsertcomputerGraphics = $_POST['add_computerGraphics'];
        $InsertcomputerMemory = $_POST['add_computerMemory'];

        if(empty($InsertcomputerAssetCode) || empty($InsertcomputerManufacture) || empty($InsertcomputerModel) || empty($InsertcomputerType) || empty($InsertcomputerSN) || empty($InsertcomputerOS) || empty($InsertcomputerProcessor) || empty($InsertcomputerGraphics) || empty($InsertcomputerMemory)){

            $errorMsg = '<div class="errorMsg">Please fill in all fields</div>';

        } else {
            
            $queryAdd = "INSERT INTO `tbl_computers` (asset_code, manufacture, model, type, serial_number, operating_system, processor, graphics, memory)
            VALUES ('$InsertcomputerAssetCode', '$InsertcomputerManufacture', '$InsertcomputerModel', '$InsertcomputerType', '$InsertcomputerSN', '$InsertcomputerOS', '$InsertcomputerProcessor', '$InsertcomputerGraphics', '$InsertcomputerMemory')";

            if($db->query($queryAdd) === TRUE ){

                $message = '<div class="okMsg">Record add successfully</div>';
                header("Refresh:1; url=assets.php?cat=computers");

            } else {

                $errorMsg = '<div class="errorMsg">The record could not be added</div>';

            }

        }
    }

    #Edit assets label
    echo '<div class="edit-assets-label"><h2>Add new computer</h2></div>';

    #Edit assets form
    echo '<div class="edit-assets-form">';
    
    #Grid form
    echo '<form method="post">';
                    
    if(isset($errorMsg)) {
         echo $errorMsg;
    }
    
    if(isset($message)){
        echo $message;
    }
    
    echo '<div class="edit-assets-form-grid">';
    
    #Asset Code
    echo '<label for="Asset Code" class="asset-name">Asset Code</label>';
    echo '<input type="text" name="add_assetCode" value="">';
    
    #Manufacture
    echo '<label for="Manufacture" class="asset-name">Manufacture</label>';
    echo '<input type="text" name="add_computerManufacture" value="">';
    
    #Model
    echo '<label for="Model" class="asset-name">Model</label>';
    echo '<input type="text" name="add_computerModel" value="">';
    
    #Type
    echo '<label for="Type" class="asset-name">Type</label>';
    echo '<input type="text" name="add_computerType" value="">';
    
    #Serial number
    echo '<label for="Serial Number" class="asset-name">Serial Number</label>';
    echo '<input type="text" name="add_computerSN" value="">';
    
    #Operating system
    echo '<label for="Operating system" class="asset-name">Operating system</label>';
    echo '<input type="text" name="add_computerOS" value="">';            
     
    #Processor
    echo '<label for="Processor model" class="asset-name">Processor model</label>';
    echo '<input type="text" name="add_computerProcessor" value="">'; 
                    
    #Graphics
    echo '<label for="Graphics card" class="asset-name">Graphics card</label>';
    echo '<input type="text" name="add_computerGraphics" value="">';  
                    
    #Memory
    echo '<label for="Memory" class="asset-name">Memory</label>';
    echo '<input type="text" name="add_computerMemory" value="">';  
    
    #End grid div
    echo '</div>';
    
    #Submit button
    echo '<input type="submit" value="Add computer" name="btn_add_computers" class="button">';
                    
    #end form
    echo '</form>';
    
    #end asset form
    echo '</div>'; 
}

#edit computers from database

function editComputers(){

        global $db;
        global $errorMsg;

        $id = $_GET['edit'];

        if(isset($_POST['btn_edit_computers'])){

            $computerAssetCode = $_POST['edit_assetCode'];
            $computerManufacture = $_POST['edit_computerManufacture'];
            $computerModel = $_POST['edit_computerModel'];
            $computerType = $_POST['edit_computerType'];
            $computerSN = $_POST['edit_computerSN'];
            $computerOS = $_POST['edit_computerOS'];
            $computerProcessor = $_POST['edit_computerProcessor'];
            $computerGraphics = $_POST['edit_computerGraphics'];
            $computerMemory = $_POST['edit_computerMemory'];

            if(empty($computerAssetCode) || empty($computerManufacture) || empty($computerModel) || empty($computerType) || empty($computerSN) || empty($computerOS) || empty($computerProcessor) || empty($computerGraphics) || empty($computerMemory)){

                $errorMsg = '<div class="errorMsg">Please fill in all fields</div>';

            } else {

                $queryUpdate = "UPDATE `tbl_computers` SET asset_code = '$computerAssetCode', manufacture = '$computerManufacture', model = '$computerModel', type = '$computerType', serial_number = '$computerSN', operating_system = '$computerOS', processor = '$computerProcessor', graphics = '$computerGraphics', memory = '$computerMemory' WHERE id = '$id'";

                if($db->query($queryUpdate) === TRUE){

                    $message = '<div class="okMsg">Record updated successfully</div>';
                    header("Refresh:1; url=assets.php?cat=computers");

                } else {
                    
                    $errorMsg = '<div class="errorMsg">The record was not modified correctly</div>';

                }

            }
            
        }
        
        ## SELECT AND FILL TO INPUT

        $query = "SELECT * FROM `tbl_computers` WHERE id='$id'";

        $result = $db->query($query);

        if($computers = $result->num_rows > 0){

            $computers = $result->fetch_assoc();

            #Edit assets label
            echo '<div class="edit-assets-label"><h2>Edit computer ' . $computers['asset_code'] . '</h2></div>';

            #Edit assets form
            echo '<div class="edit-assets-form">';

            #Grid form
            echo '<form method="post">';
            
            if(isset($errorMsg)) {
                echo $errorMsg;
            }

            if(isset($message)){
                echo $message;
            }

            echo '<div class="edit-assets-form-grid">';

            #Asset Code
            echo '<label for="Asset Code" class="asset-name">Asset Code</label>';
            echo '<input type="text" name="edit_assetCode" value="' . $computers['asset_code'] . '">';

            #Manufacture
            echo '<label for="Manufacture" class="asset-name">Manufacture</label>';
            echo '<input type="text" name="edit_computerManufacture" value="' . $computers['manufacture'] . '">';

            #Model
            echo '<label for="Model" class="asset-name">Model</label>';
            echo '<input type="text" name="edit_computerModel" value="' . $computers['model'] . '">';

            #Type
            echo '<label for="Type" class="asset-name">Type</label>';
            echo '<input type="text" name="edit_computerType" value="' . $computers['type'] . '">';

            #Serial number
            echo '<label for="Serial Number" class="asset-name">Serial Number</label>';
            echo '<input type="text" name="edit_computerSN" value="' . $computers['serial_number'] . '">';

            #Operating system
            echo '<label for="Operating system" class="asset-name">Operating system</label>';
            echo '<input type="text" name="edit_computerOS" value="' . $computers['operating_system'] . '">';            
   
            #Processor
            echo '<label for="Processor model" class="asset-name">Processor model</label>';
            echo '<input type="text" name="edit_computerProcessor" value="' . $computers['processor'] . '">'; 
            
            #Graphics
            echo '<label for="Graphics card" class="asset-name">Graphics card</label>';
            echo '<input type="text" name="edit_computerGraphics" value="' . $computers['graphics'] . '">';  
            
            #Memory
            echo '<label for="Memory" class="asset-name">Memory</label>';
            echo '<input type="text" name="edit_computerMemory" value="' . $computers['memory'] . '">';  

            #End grid div
            echo '</div>';

            #Submit button
            echo '<input type="submit" value="Edit computer" name="btn_edit_computers" class="button">';
            
            #end form
            echo '</form>';

            #end asset form
            echo '</div>';

        }
}


##delete computers from database
function deleteComputers(){

    global $db;

    $id = $_GET['delete'];

    $query = "DELETE FROM `tbl_computers` WHERE id = '$id'";

    if($db->query($query) === TRUE){

        echo $messege = '<div class="okMsg">Computer was successfully removed from the database</div>';
        header("Refresh:2; url=assets.php?cat=computers");
        
    } else {

        echo $errorMsg = '<div class="errorMsg">Record could not be deleted</div>';

    }

}

/******************************************************   Mobile      ********************************************************** */



