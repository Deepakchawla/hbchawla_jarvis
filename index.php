<?php

$access_token = "EAAYT0dQvVnEBAPwtcWZCkzaniwy0R99sfJw4r94SPxoBdT3TXWUbXoZAGQVo9BrMSFi3CemNQbLMqopHwdkjZBDzPiyvAYmVCcvU0TZBAcPksd03shNfJrw47WZAkYsYviCky60KWQYdq3H9KNUcFSIcyYt862uxi4IircimBmwZDZD";
if(isset($_REQUEST['hub_challenge']))
{

$challenge = $_REQUEST['hub_challenge'];
$token = $_REQUEST['hub_verify_token'];
}

if($token == "hbchawla_token")
{

echo $challenge;
}

$input = json_decode(file_get_contents('php://input'),true);

$userID = $input['entry'][0]['messaging'][0]['sender']['id'];

$message =  $input['entry'][0]['messaging'][0]['message']['text'];

#$reply = "I don't understand. Ask me to 'tell a joke'";

/*if(preg_match('/(send|tell|text)(.*?)joke/',$message)){
  $res = json_decode(file_get_contents('http://api.yomomma.info/'),true);
  $reply = $res['joke'];
}*/
switch ($message) {
  case (preg_match('/(Hello|hello|Hy|hy|Hi|hi|Hey|hey)/',$message) ? true :false ):
    $reply = "Hello Mr. APS";
    break;
    case (preg_match('/(How are you|how are you)/',$message) ? true :false ):
      $reply = "I am fit as fiddle.... How are you...??";
      break;
    case (preg_match('/(I am fine|I am good|i am fine|i am good)/',$message) ? true :false ):
      $reply = "It is very good";
      break;
  default:
    $reply = "I don't understand. Ask me to 'tell a joke'";
    break;
}

$url = "https://graph.facebook.com/v2.6/me/messages?access_token=$access_token";



/*$jsonData = "{
  'recipient' :{
  'id' : $userID
  },
  'message':{
    'attachment':{
      'type':'image',
      'payload':{
        'url' : 'https://b7bc5329.ngrok.io/hbchawla_jarvis/deepakchawla.jpg'
      }
    }
  }
}";
*/

$jsonData = "{
  'recipient' :{
  'id' : $userID
  },
  'message':{
  'text': '".addslashes($reply)."'
  }
}";
$ch = curl_init($url);

curl_setopt($ch,CURLOPT_POST,true);

curl_setopt($ch,CURLOPT_POSTFIELDS,$jsonData);
curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type:application/json']);

if(!empty($input['entry'][0]['messaging'][0]['message']))
{
curl_exec($ch);
echo $reply;
}
?>
