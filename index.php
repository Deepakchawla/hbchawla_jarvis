<?php
include 'contants.php';

class Main_Controller
{
  private $input,$userID,$message,$url,$reply;
  function __construct()
  {
    if(isset($_REQUEST['hub_challenge']))
    {
    if($_REQUEST['hub_verify_token'] == "hbchawla_token")
    {
    echo $_REQUEST['hub_challenge'];
    }
    }
    $this->input = json_decode(file_get_contents('php://input'),true);
    $this->userID = $this->input['entry'][0]['messaging'][0]['sender']['id'];
    $this->message =  $this->input['entry'][0]['messaging'][0]['message']['text'];
    $this->url = "https://graph.facebook.com/v2.6/me/messages?access_token=".access_token;
    $this->text_message_reply($this->message);
    //$this->text_json_creation($this->reply);
  }
  public function text_message_reply($message)
  {
    switch ($message) {
        case (preg_match('/(Hello|hello|Hy|hy|Hi|hi|Hey|hey)/',$message) ? true :false ):
          $reply = "Hello Mr. Chawla Ji";
          $this->text_json_creation($reply);
          break;
        case (preg_match('/(How are you|how are you)/',$message) ? true :false ):
          $reply = "I am fit as fiddle.... How are you...??";
          $this->text_json_creation($reply);
          break;
        case (preg_match('/(fine|good|fine|good)/',$message) ? true :false ):
          $reply = "It is very good";
          $this->text_json_creation($reply);
          break;
        case (preg_match('/(Who are you|What is your name|who are you|what is your name)/',$message) ? true :false ):
          $reply = "My name is HBChawla Jarvis and I am an AI based personal home assistant..";
          $this->text_json_creation($reply);
          break;
        case (preg_match('/(Who develop you|who develop you)/',$message) ? true :false ):
          $reply = "Mr. Deepak Chawla. He is a MLVTEC Final Year Engineering Student";
          $this->text_json_creation($reply);
          break;
        case (preg_match('/(like|Like)/',$message) ? true :false ):
          $reply = "I like you too";
          $this->text_json_creation($reply);
          break;
        case (preg_match('/(love|Love)/',$message) ? true :false ):
          $reply = "I love you too";
          $this->text_json_creation($reply);
          break;
        case (preg_match('/(send me a joke|text me a joke|tell me a joke)/',$message) ? true :false ):
          $res = json_decode(file_get_contents('http://api.yomomma.info/'),true);
          $reply = $res['joke'];
          $this->text_json_creation($reply);
          break;
        case (preg_match('/(send image)/',$message) ? true :false ):
          $this->image_json_creation("abba.jpg");
          break;
        default:
          $reply = "Sorry, I don't understand... Wants to laugh, tell me 'send or text me a joke'";
          $this->text_json_creation($reply);
          break;
    }

  }
  public function text_json_creation($reply)
  {
    $jsonData = "{
      'recipient' :{
      'id' : $this->userID
      },
      'message':{
      'text': '".addslashes($reply)."'
      }
    }";

    $this->text_msg_execute_curl_request($jsonData);
  }
  public function image_json_creation($image_name)
  {
    $jsonData = "{
      'recipient' :{
      'id' : '1355566767862976'
      },
      'message':{
    'attachment':{
      'type':'image',
      'payload':{
        'url':\"https://okvinimuxm.localtunnel.me/hbchawla_jarvis/$image_name\"
      }
    }
  }
    }";
    $this->img_msg_execute_curl_request($jsonData);


  }
  public function img_msg_execute_curl_request($jsonData)
  {

    $ch = curl_init($this->url);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$jsonData);
    curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type:application/json']);
    curl_exec($ch);
  }
  public function text_msg_execute_curl_request($jsonData)
  {

    $ch = curl_init($this->url);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$jsonData);
    curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type:application/json']);
    if(!empty($this->input['entry'][0]['messaging'][0]['message']))
    {
    curl_exec($ch);
    }
  }
}


$object = new Main_Controller();
function foo($username)
{
$object = new Main_Controller();
$object->image_json_creation($username);
}
 ?>
