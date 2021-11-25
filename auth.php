<?php
    $authorizationcode_error = ''; 
    $userid_error = ''; 
    $allData = array();
    $kay = 0;
    if(isset($_REQUEST['submit']))
    {
       if($_POST['client_id'] == "" || $_POST['client_id'] == null)
       {
            $authorizationcode_error = "client_id  is Required";
       }
       else
       {
            $client_id = $_POST['client_id'];
       }
       if($_POST['client_secret'] == "" || $_POST['client_secret'] == null)
       {
            $userids_error = "client_secret is Required";
       }
       else
       {
            $client_secret = $_POST['client_secret'];
       }
       if($_POST['redUri'] == "" || $_POST['redUri'] == null)
       {
            $userid_error = "redUri is Required";
       }
       else
       {
            $redUri = $_POST['redUri'];
       }

       echo $redUri;


       if($_POST['client_id']!="" && $_POST['redUri']!=""&&$_POST['client_secret']!="" )
       {
         
          $url="https://zoom.us/oauth/authorize?response_type=code&client_id=".$client_id."&redirect_uri=".$redUri;
          
          header("Location:".$url);

    
           
       }

      
          
        
        
    }
    $redirectUrl='http://localhost/zoom_api/auth.php';
    $clientId='GYmhYlCDT0CmK6XtpLTfBQ';
    $clientSecet='jFfPGgZLripLC6Tp2xt2V7hRRr56ALRF';
    if($_GET['code'])
    {
    
        $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://zoom.us/oauth/token",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => "{  \n   \"code\": \"".$_GET['code']."\",\n  \"redirect_uri\": \"".$redirectUrl."\",\n  \"grant_type\": \"authorization_code\"\n}",
//   CURLOPT_HTTPHEADER => array(
//     // "cache-control: no-cache",
//     "Content-Type: application/x-www-form-urlencoded",
//   ),
// ));
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://zoom.us/oauth/token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'grant_type=authorization_code&code='.$_GET['code'].'&redirect_uri='.$redirectUrl,
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic '.base64_encode($clientId.':'.$clientSecet),
    'Content-Type: application/x-www-form-urlencoded',
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
   $allData = $response;
}
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>List Call Log Records</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<div class="container" style="margin-top : 30px">
		
		<div class="panel panel-info">
			
            <div class="panel-heading">
                <div class="panel-title">Oauth flow</div>
            </div>  
            <div class="panel-body" >
            	<form method="post" action="">
                <div id="user_id" class="form-group required">
                  <label for="user_id" class="control-label col-md-4  requiredField">ClientID</label>
                  <div class="controls col-md-8 ">
                      <input class="input-md  textinput textInput form-control" id="user_id"  name="client_id" style="margin-bottom: 10px" type="text" value="GYmhYlCDT0CmK6XtpLTfBQ"/>
                       <p class="text-danger"><?php //echo $userid_error; ?></p>
                  </div>
                </div>
                <div id="user_id" class="form-group required">
                  <label for="user_id" class="control-label col-md-4  requiredField">Client secret</label>
                  <div class="controls col-md-8 ">
                      <input class="input-md  textinput textInput form-control" id="user_id"  name="client_secret" style="margin-bottom: 10px" type="text" value="jFfPGgZLripLC6Tp2xt2V7hRRr56ALRF" placeholder="1" />
                       <p class="text-danger"><?php echo $userid_error; ?></p>
                  </div>
                </div>


                <div id="user_id" class="form-group required">
                  <label for="user_id" class="control-label col-md-4  requiredField">Redirect Uri</label>
                  <div class="controls col-md-8 ">
                      <input class="input-md  textinput textInput form-control" id="user_id"  name="redUri" style="margin-bottom: 10px" type="text" value="http://localhost/zoom_api/auth.php" placeholder="1" />
                       <p class="text-danger"><?php echo $userid_error; ?></p>
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
                    //$data = json_decode($response);
                    // if(isset($_REQUEST['submit']))
                    // { 
                    //   //echo "<pre>";
                    //  // echo count($allData);
                    //   echo $allData;
                    //   //echo "</pre>";
                    // }
                if($_GET['code']){
echo $allData;
                }
                
                    
                ?>
            </div>
        </div>
	</div>
</body>
</html>

