<?php 
function getaccessToken($refresToken)
{
   echo $refresToken;
    
    $clientId='1NeK_FGoRgKOKVGKkgdn1Q';
    $clientSecet='Od2xwdMcoKFJNzzSfDNHPhebqrk5zVV7';

    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://zoom.us/oauth/token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('grant_type' => 'refresh_token','refresh_token'=>$refresToken),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic MU5lS19GR29SZ0tPS1ZHS2tnZG4xUTpPZDJ4d2RNY29LRkpOenpTZkROSFBoZWJxcms1elZWNw==',
    'Content-Type: application/x-www-form-urlencoded',
    'Cookie: _zm_chtaid=515; _zm_ctaid=7pqoTxMrTy-k2X35Sy4grA.1637225447579.d3c8619798cc0341a76b62806b19bbe9; _zm_currency=INR; _zm_mtk_guid=e48ecad428cf4fbdbb5ae975f7f24a81; _zm_page_auth=us05_c_NAnWy7ziTxOpPC5ebn6Q_w; _zm_ssid=us05_c_DfC166BSTNSrRzge3bFsrA; cred=3A7A901661793BDC3F6EAB2EE84ACEFC'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
		//  $curl = curl_init();
        //  curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://zoom.us/oauth/token',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS => array('grant_type' => 'refresh_token','refresh_token' => 'eyJhbGciOiJIUzUxMiIsInYiOiIyLjAiLCJraWQiOiJkMzZmMmFhOC01ZmFlLTRiZWEtOWQ4OC0xNTM1N2JkN2E4Y2EifQ.eyJ2ZXIiOjcsImF1aWQiOiI4MjFhZmQ5MDQzMzUzOWUzZjdhOGNlZGRlMzc1YWVkMiIsImNvZGUiOiJqUWJNTVRucUlZX0lHNGozMXVGVC02TnlMZi1qY3FLQnciLCJpc3MiOiJ6bTpjaWQ6MU5lS19GR29SZ0tPS1ZHS2tnZG4xUSIsImdubyI6MCwidHlwZSI6MSwidGlkIjowLCJhdWQiOiJodHRwczovL29hdXRoLnpvb20udXMiLCJ1aWQiOiJJRzRqMzF1RlQtNk55TGYtamNxS0J3IiwibmJmIjoxNjM3MjI1NTIwLCJleHAiOjIxMTAyNjU1MjAsImlhdCI6MTYzNzIyNTUyMCwiYWlkIjoic3hhbXVPVEdSSksta3ZiNl9JM3R1dyIsImp0aSI6ImFmMWY3MzU2LTVkN2UtNDEzZi1iMGEwLTE0NmI5ZTFjZTBiOSJ9.kv33yXVNaGhdEDaAynwB2i1jQGa4hoF41gw7NPMP7N9aFXVA186JOfYYsYcjvvB3O8-sIaQB7nRFsvqiCZrEvw
        //   '),
        //     CURLOPT_HTTPHEADER => array(
        //       'Authorization: Basic MU5lS19GR29SZ0tPS1ZHS2tnZG4xUTpPZDJ4d2RNY29LRkpOenpTZkROSFBoZWJxcms1elZWNw==',
        //       'Content-Type: application/x-www-form-urlencoded',
        //       'Cookie: _zm_chtaid=515; _zm_ctaid=7pqoTxMrTy-k2X35Sy4grA.1637225447579.d3c8619798cc0341a76b62806b19bbe9; _zm_currency=INR; _zm_mtk_guid=e48ecad428cf4fbdbb5ae975f7f24a81; _zm_page_auth=us05_c_NAnWy7ziTxOpPC5ebn6Q_w; _zm_ssid=us05_c_DfC166BSTNSrRzge3bFsrA; cred=3A7A901661793BDC3F6EAB2EE84ACEFC'
        //     ),
        //   ));
        //     $response = curl_exec($curl);
        //     $err = curl_error($curl);

        //    echo "------".$response;


        //     curl_close($curl);
        //     $result=json_decode($response);
        //     return $result->access_token;
}



//getaccessToken('498a8723c19f8812e5a088b303d58de58e974d10',$clinetId,$clinetSecret,$redirectUri);

?>