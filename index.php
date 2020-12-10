<?php
error_reporting(0);
$tok = '1481445555:AAF3eYzgz6KZGDcHw7VpBhVqDSN5fUc4CTE';

function botaction($method, $data){
	global $tok;
	global $dadel;
	global $dueto;
    $url = "https://api.telegram.org/bot$tok/$method";
    $curld = curl_init();
    curl_setopt($curld, CURLOPT_POST, true);
    curl_setopt($curld, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curld, CURLOPT_URL, $url);
    curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($curld);
    curl_close($curld);
    $dadel = json_decode($output,true);
    $dueto = $dadel['description'];
    return $output;
}
$update = file_get_contents('php://input');
$update = json_decode($update, true);

$update = file_get_contents('php://input');
$update = json_decode($update, true);


$mid = $update['message']['message_id'];
$cid = $update['message']['chat']['id'];
$uid = $update['message']['chat']['id'];
$cname = $update['message']['chat']['username'];
$fid = $update['message']['from']['id'];
$fname = $update['message']['from']['first_name'];
$lname = $update['message']['from']['last_name'];
$uname = $update['message']['from']['username'];
$typ = $update['message']['chat']['type'];
$text = $update['message']['text'];
$fullname = ''.$fname.' '.$lname.'';

##################NEW MEMBER DATA ################
$gname = $update['message']['chat']['title'];
$nid = $update['message']['new_chat_member']['id'];
$nfname = $update['message']['new_chat_member']['first_name'];
$nlname = $update['message']['new_chat_member']['last_name'];
$nuname = $update['message']['new_chat_member']['username'];
$nfullname = ''.$nfname.' '.$nlname.'';
#################################################
    $lfname = $update['message']['left_chat_member']['first_name'];
    $llname = $update['message']['left_chat_member']['last_name'];
    $luname = $update['message']['left_chat_member']['username'];
$reply_message = $update['message']['reply_to_message'];
$reply_message_id = $update['message']['reply_to_message']['message_id'];
$reply_message_user_id = $update['message']['reply_to_message']['from']['id'];
$reply_message_text = $update['message']['reply_to_message']['text'];
$reply_message_user_fname = $update['message']['reply_to_message']['from']['first_name'];
$reply_message_user_lname = $update['message']['reply_to_message']['from']['last_name'];
$reply_message_user_uname = $update['message']['reply_to_message']['from']['username'];
#######################################################################################
###########################CALL BACK DATA##############################################
$callback = $update['callback_query'];
$callback_id = $update['callback_query']['id'];
$callback_from_id = $update['callback_query']['from']['id'];
$callback_from_uname = $update['callback_query']['from']['username'];
$callback_from_fname = $update['callback_query']['from']['first_name'];
$callback_from_lname = $update['callback_query']['from']['last_name'];
$callback_user_data = $update['callback_query']['data'];
$callback_message_id = $update['callback_query']['message']['id'];
$cbid = $update['callback_query']['message']['chat']['id'];
$cbmid = $update['callback_query']['message']['message_id'];
$thug_chat_id = '-1001458570254';
$chat_id = (string)$cid;
#########################################################################################
$my_frnds = array("801636048","672783900","1475113905","774256618","1485379027","642510273","633384904");


#########################################################################################
if($chat_id !== $thug_chat_id){
    $warning_for_adding = [
        'chat_id'=>$cid,
        'text'=>"<b>English</b> => <code>Fuck Off You Fool... I Work Only For My Master....</code> \n<b>Hindi</b> => <code>[Pehle Fursat Mai Nikal Jao]</code>",
        'parse_mode'=>'HTML',
        'reply_to_message_id'=>$mid,
    ];
    botaction("sendMessage",$warning_for_adding);
      $leave2 = [
        'chat_id'=>''.$cid.'',
];
    botaction("leaveChat",$leave2);
}
else{

if ($update['message']['new_chat_member']) {
    if ($nid == '1481445555') {
    $thanks = [
        'chat_id' => ''.$cid.'',
        'text' => "Hey $fullname ! Whats Up?? BTW Thanks For Adding Me",
        'reply_to_message_id'=>''.$mid.'',
           ];
    botaction("sendMessage",$thanks);
}//End Self Thanks
elseif($nid == '801636048'){
        $welcome_msg = [
        'chat_id' => ''.$cid.'',
        'text' => "My Master Is Here !! Let's Do Some Party !!",
        'reply_to_message_id'=>''.$mid.'',
    ];
    botaction("sendMessage",$welcome_msg);
}
elseif(in_array($nid, $my_frnds)){
    $welcome_msg = [
        'chat_id' => ''.$cid.'',
        'text' => "My Friend [$nfname] Is Here !! Let's Do Some Party !!",
        'reply_to_message_id'=>''.$mid.'',
    ];
    botaction("sendMessage",$welcome_msg);
}
else{
    $welcome_msg = [
        'chat_id' => ''.$cid.'',
        'text' => "$nfname Welcome To $gname ... By The Way! How Are You??",
        'reply_to_message_id'=>''.$mid.'',
    ];
    botaction("sendMessage",$welcome_msg);
}//End Normal Welcome!!
}//End Welcome


elseif ($update['message']['left_chat_member'] == true) {
    $left_message = [
        'chat_id'=>$cid,
        'text'=>"<b>Leaving Is Not The Option <a href='t.me/$luname'>$lfname</a>!!</b>",
        'parse_mode'=>'HTML',
        'disable_web_page_preview'=>'True',
        'reply_to_message_id'=>$mid,
    ];
    botaction("sendMessage",$left_message);
}

}//End Maine Else

