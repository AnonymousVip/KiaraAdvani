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
function startsWith ($string, $startString) 
{ 
    $len = strlen($startString); 
    return (substr($string, 0, $len) === $startString); 
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
$thug_chat_id = '-1001291062558';
$chat_id = (string)$cid;
    $admin_json=[
        'chat_id'=>$thug_chat_id
    ];
    $curl232 = curl_init();
    curl_setopt($curl232, CURLOPT_URL,"https://api.telegram.org/bot$tok/getChatAdministrators?");
    curl_setopt($curl232, CURLOPT_POST, 1);
    curl_setopt($curl232, CURLOPT_POSTFIELDS, $admin_json);
    curl_setopt($curl232, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl232, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl232, CURLOPT_SSL_VERIFYPEER, 0);
 $resp22 = curl_exec($curl232);
    $adms = json_decode($resp22,true);
 $total = count($adms['result']);
 $array_admin = '';
    for ($i=0; $i < $total ; $i++) { 
        $ddams = $adms['result'][$i]['user']['id'];
        $admin_id_list =  "$ddams,";
        $array_admin .= $admin_id_list;
    }
$admin_array = explode(',', $array_admin);
print_r($admin_array);

#########################################################################################
$my_frnds = array("801636048","672783900","1475113905","774256618","1485379027","642510273","633384904");
$ch12 = curl_init();
curl_setopt($ch12, CURLOPT_URL, "https://api.telegram.org/bot$tok/getChatMember?chat_id=$cid&user_id=$reply_message_user_id"); 
curl_setopt($ch12, CURLOPT_POST, false); 
curl_setopt($ch12, CURLOPT_RETURNTRANSFER, 1); 
    $output212 = curl_exec($ch12);
$json122 = json_decode($output212,true);
    curl_close($ch122);
$can_send_messages =  $json122['result']['can_send_messages'];
$can_send_media_messages = $json122['result']['can_send_media_messages'];
$can_send_other_messages = $json122['result']['can_send_other_messages'];
$can_add_web_page_previews = $json122['result']['can_add_web_page_previews'];
$stato = $json122['result']['status'];
##########################################################################################

#####################################CHECK ADMIN #########################################
$admi = curl_init();
curl_setopt($admi, CURLOPT_URL, "https://api.telegram.org/bot$tok/getChatMember?chat_id=$cid&user_id=$fid"); 
curl_setopt($admi, CURLOPT_POST, false); 
curl_setopt($admi, CURLOPT_RETURNTRANSFER, 1); 
    $output2121 = curl_exec($admi);
$json1221 = json_decode($output2121,true);
    curl_close($admi);
$status = $json1221['result']['status'];

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
 if(startsWith($text,'/mute')){
if (!in_array('1481445555', $admin_array)) {
    $i_am_not = [
        'chat_id'=>$cid,
        'text'=>'I am Not Admin To Mute And Unmute Members !!',
        'reply_to_message_id'=>$mid
    ];
    botaction("sendMessage",$i_am_not);
}
else{
    $res = str_replace("/mute", "", $text);
    if ($res == '') {
        $mute  = "<b>Silence Now...🤫🤫\n<a href='t.me/$reply_message_user_uname'>$reply_message_user_fname</a> Is Muted...🤐🔇</b>";
    }
    else{
        $mute = "<b>Silence Now...\n<a href='t.me/$reply_message_user_uname'>$reply_message_user_fname</a> Is Muted...🤐🔇\nReason => <i>$res</i></b>";
    }
    if ($reply_message) {
        if (in_array($reply_message_user_id, $admin_array)) {
    $no_cant = [
        'chat_id'=>$cid,
        'reply_to_message_id'=>$mid,
        'parse_mode'=>'HTML',
        'text'=>"<b> How High Are You To Mute An Admin</b>"
    ];
        botaction("sendMessage",$no_cant);
}
elseif($reply_message_user_id == '1481445555'){
    $no_cant_ever = [
        'chat_id'=>$cid,
        'reply_to_message_id'=>$mid,
        'parse_mode'=>'HTML',
        'text'=>"<b>Have U became So Big To Mute Me??? Just Be In Your Limits</b>"
    ];
        botaction("sendMessage",$no_cant);
}
        elseif($status == 'creator' || $status == 'administrator'){
        if (is_null($can_send_messages) or $can_send_messages == '1') { # code
            $muting_member = [
            'chat_id'=>$cid,
            'user_id'=>$reply_message_user_id,
            'can_send_messages'=>'False'
        ];
        botaction("restrictChatMember",$muting_member);
        $mute_message = [
        'chat_id'=>$cid,
        'reply_to_message_id'=>$mid,
        'parse_mode'=>'HTML',
        'disable_web_page_preview'=>'True',
        'text'=>"$mute"
        ];
        botaction("sendMessage",$mute_message);
}
        else{
            $user_is_muted = [
            'chat_id'=>$cid,
            'text' => "<b>There Is already a Cheese Burger 🍔 in his Mouth 😁.. \n[<i>User Is Already Muted</i>]</b>",
            'parse_mode'=>'HTML',
            'reply_to_message_id'=>$mid,
                ];
            botaction("sendMessage",$user_is_muted);
                        }

        }


        else{
        $who1 = [
            'chat_id'=>$cid,
            'reply_to_message_id'=>$mid,
            'caption'=>"<b>Who The Hell Are You !! Only Admins Are Allowed To Perform This Action..\nWant A Infinity Snap ??🤜</b>",
            'parse_mode'=>'HTML',
            'video'=>'https://s2.gifyu.com/images/ezgif.com-gif-maker93d51c6b80ca89ad.gif',
        ];
        botaction("sendVideo",$who1);
        }   

}
else{
    $no_reply = [
            'chat_id'=>$cid,
            'reply_to_message_id'=>$mid,
            'parse_mode'=>'HTML',
            'text'=>"<b>Is He A user??? Reply To A User's Message To Mute Him</b>"
        ];
        botaction("sendMessage",$no_reply);
}
}
}

if (startsWith($text,'/unmute')) {  
    if ($reply_message == true) {
        if($status == 'creator' || $status == 'adminstrator'){
        if(is_null($can_send_messages) and is_null($can_send_media_messages) and is_null($can_send_other_messages) and is_null($can_add_web_page_previews) or $can_send_messages == '1' and $can_send_media_messages == '1' and $can_send_other_messages == '1' and $can_add_web_page_previews == '1'){
            $user_already_unmuted = [
            'chat_id'=>$cid,
            'reply_to_message_id'=>$mid,
            'parse_mode'=>'HTML',
            'text'=>"<b>User Is Already Unmuted..</b>"
        ];
        botaction("sendMessage",$user_already_unmuted);
        }
        else{
        $unmute_message = [
            'chat_id'=>$cid,
            'reply_to_message_id'=>$mid,
            'parse_mode'=>'HTML',
            'text'=>"<b>$reply_message_user_fname Is Free Now... User Unmuted</b>"
        ];
        botaction("sendMessage",$unmute_message);
$unmuting_member = [
'chat_id'=>$cid,
'user_id'=>$reply_message_user_id,
'can_send_messages'=>'True',
'can_invite_users'=>'True',
'can_pin_messages'=>'True',
'can_send_polls'=>'True',
'can_change_info'=>'True',
'can_send_media_messages'=>'True',
'can_send_other_messages'=>'True',
'can_add_web_page_previews'=>'True',
];
        botaction("restrictChatMember",$unmuting_member);
        print_r($dadel);
}
    }
    else{
        $who = [
            'chat_id'=>$cid,
            'reply_to_message_id'=>$mid,
            'caption'=>"<b>Who The Hell Are You !! Only Admins Are Allowed To Perform This Action..\nWant A Infinity Snap ??🤜</b>",
            'parse_mode'=>'HTML',
            'video'=>'https://s2.gifyu.com/images/ezgif.com-gif-maker93d51c6b80ca89ad.gif',
        ];
        botaction("sendVideo",$who);
    }
}
    else{
        $no_reply = [
            'chat_id'=>$cid,
            'reply_to_message_id'=>$mid,
            'parse_mode'=>'HTML',
            'text'=>"<b>Is He A user??? Reply To A User's Message To Un-Mute Him</b>"
        ];
        botaction("sendMessage",$no_reply);
    }
}


if (startsWith($text,'/add')) {
    if(strpos($text,'"')){
        $mess_arr = str_replace('/add', "", $text);
        $mess_arr = explode('"', $text);
        $keyword = $mess_arr['1'];
        $reply = $mess_arr['2'];
    }
    else{
        $mess_arr = str_replace("/add","",$text);
        $mess_arr = explode(' ',$text);
        array_shift($mess_arr);
        $keyword = array_shift($mess_arr);
        $reply = str_replace(" ", "%20",implode(' ',$mess_arr));
    }

    if($reply_message){

    }
    elseif($keyword == true && $reply == true){
        echo "Hmmm";
        echo "https://4b3d0cc2c052.ngrok.io/Kiara/add_filter.php?key_word=$keyword&reply_message=$reply&type=message";
echo file_get_contents("https://4b3d0cc2c052.ngrok.io/Kiara/add_filter.php?key_word=$keyword&reply_message=$reply&type=message");    
}
    else{
        $wrng_frmt = [
            'chat_id'=>$cid,
            'text'=>'Wrong Format !!',
            'reply_to_message_id'=>$mid,
        ];
        botaction("sendMessage",$wrng_frmt);
    }
}


if (startsWith($text,'/insta')) {
    $username = str_replace('/insta ', "", $text);
    if($username == '/insta'){
        $wrng_frmat = [
            'chat_id'=>$cid,
            'text'=>"*Enter Correct Format Dude!!!* \n Syntax :-``` /insta <username_without_@> ```",
            'reply_to_message_id'=>$mid,
            'parse_mode'=>"MarkdownV2",
];
botaction("sendMessage",$wrng_frmat);
print_r($dadel);
    }
else{
 $insta = json_decode(file_get_contents("https://i-love-php.tk/Stark/Thug/insta.php?username=$username"),true);
 $bio = $insta['biography'];
 $followers = $insta['edge_followed_by']['count'];
 $following = $insta['edge_follow']['count'];
 $full_name = $insta['full_name'];
 if($insta['is_verified'] == ''){
 $is_verified = "No";
}
else{
    $is_verified = "Yes";
}
 if($insta['is_private'] == ''){
 $is_private = "No";
}
else{
    $is_private = "Yes";
}
 $profile_pic = $insta['profile_pic_url_hd'];
 $total_posts = $insta['edge_owner_to_timeline_media']['count'];   

 $message_with_details ="
 <b>INSTAGRAM DETAILS ARE GENERATED SUCCESSFULLY</b>
 \n<b>Full Name</b> : $full_name\n<b>Bio</b> : $bio\n<b>Followers</b> : $followers\n<b>Following</b> : $following\n<b>Is Verifed</b> : $is_verified\n<b>Is Private</b> : $is_private\n<b>Total Posts</b> : $total_posts\n<b>Insta Link</b> :<a href='https://instagram.com/$username'>Link</a>";

 $send_insta_details = [
        'chat_id'=>$cid,
        'photo'=>"$profile_pic",
        'caption'=>"$message_with_details",
        'reply_to_message_id'=>$mid,
        'disable_web_page_preview'=>'True',
        'parse_mode'=>"HTML",
];
botaction("sendPhoto",$send_insta_details);
print_r($dadel);
}

}

}//End Maine Else

