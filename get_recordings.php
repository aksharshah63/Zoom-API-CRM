<?php
//include 'common.php';
    $authorizationcode_error = ''; 
    $msg ='';
    if(isset($_REQUEST['submit']))
    {
       if($_POST['access_token'] == "" || $_POST['access_token'] == null)
       {
            $authorizationcode_error = "Authorization Token is Required";
       }
       else
       {
            $access_token = $_POST['access_token'];
       }
       
       if($_POST['access_token']!="")
       {
            
            $curl = curl_init();
           curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.zoom.us/v2/users/me/recordings",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              "Authorization: Bearer ".$_POST['access_token'],
            ),
          ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            $result=json_decode($response);
            
            curl_close($curl);

            if ($err) 
            {
             $msg = $err;
            } 
            else 
            {  
               $msg =   json_encode($result);    
                
            }
       }
        
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>List Contact information</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
  <div class="container" style="margin-top : 30px">
    
    <div class="panel panel-info">
      
            <div class="panel-heading">
                <div class="panel-title">Get recording</div>
            </div>  
            <div class="panel-body" >
              <form method="post" action="">
              

                    <div id="authorization_code" class="form-group required">
                        <label for="authorization_code" class="control-label col-md-4  requiredField">access Token</label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  textinput textInput form-control" id="authorization_code" name="access_token" style="margin-bottom: 10px" type="text" />
                             <p class="text-danger"><?php echo $authorizationcode_error; ?></p>
                        </div>
                    </div>

            
                    <div class="form-group"> 
                        <div class="aab controls col-md-4 "></div>
                        <div class="controls col-md-8 ">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                        </div>
                    </div> 
              </form> 
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Result</div>
            </div>
            <div class="panel-body" >
               <?php
                    
                    if(isset($_REQUEST['submit']))
                    { 
                      //echo "<pre>";
                      echo $msg;
                      //echo "</pre>";
                    }
                ?>
            </div>
        </div>
  </div>
</body>
</html>

