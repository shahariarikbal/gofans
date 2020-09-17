<?php
use App\Models\Category;
use App\Models\UserLoginLog;
use App\Models\ClientLoginLog;
use App\Models\SideNotification;
use App\Models\Comment;
use App\Models\Reply;


if (!function_exists('getModule')) {
    function getModule(){
        $modules = [
            ['route_name' => 'test1', 'module_name' => 'Test Module', 'access' => ['view', 'edit', 'all']],
            ['route_name' => 'test2','module_name' => 'Test Module 2', 'access' => ['view', 'edit']]
        ];

        return $modules;
    }
}

if (!function_exists('getAdminUsersModule')) {
    function getAdminUsersModule(){
        $modules = [
            ['route_name' => 'test1', 'module_name' => 'Test Module', 'access' => ['view', 'edit', 'all']],
            ['route_name' => 'test2','module_name' => 'Test Module 2', 'access' => ['view', 'edit']]
        ];

        return $modules;
    }
}

if (!function_exists('sendPhoneMessage')) {
    function sendPhoneMessage($phone, $code){
        $MessageBird = new \MessageBird\Client('MLtIjO7sf4kkWw0thNjLJu1oe');
        $Message = new \MessageBird\Objects\Message();
        $Message->originator = 'GoFans';
        $Message->recipients = array($phone);
        $Message->body = 'GoFans verification code is: '.$code;
        $MessageBird->messages->create($Message);
        return true;
    }
}

if (!function_exists('codeGenerated')) {
    function codeGenerated() {
        $code = '';
        $value = array_merge(range(0, 9));
        for ($i = 0; $i < 6; $i++) {
            $code .= $value[array_rand($value)];
        }
        return $code;
    }
}

if (!function_exists('getAllCategories')) {
    function getAllCategories(){
        $categories = Category::where('status', 1)->get();
        return $categories;
    }
}

if (!function_exists('serviceIcon')) {
    function serviceIcon($icon){
        if ($icon == 'download'){
            return '<i class="fa fa-download"></i>';
        }elseif($icon == 'testing'){
            return '<i class="fa fa-adjust"></i>';
        }elseif($icon == 'subscribe'){
            return '<i class="fa fa-bell"></i>';
        }elseif($icon == 'view'){
            return '<i class="fa fa-eye"></i>';
        }elseif($icon == 'like'){
            return '<i class="fa fa-thumbs-up"></i>';
        }elseif($icon == 'follow'){
            return '<i class="fa fa-user-plus"></i>';
        }elseif($icon == 'comment'){
            return '<i class="fa fa-comment"></i>';
        }elseif($icon == 'share'){
            return '<i class="fa fa-share-alt"></i>';
        }elseif($icon == 'retweet'){
            return '<i class="fa fa-retweet"></i>';
        }elseif($icon == 'listen'){
            return '<i class="fa fa-headphones"></i>';
        }elseif($icon == 'play'){
            return '<i class="fa fa-play"></i>';
        }else{
            return '<i class="fa fa-cubes"></i>';
        }
    }
}

if (!function_exists('categoryIcon')) {
    function categoryIcon($categoryName){
        if ($categoryName == 'Mobile App'){
            return '<i style="visibility: inherit;" class="fa fa-mobile"></i>';
        }elseif($categoryName == 'Youtube'){
            return '<i style="visibility: inherit;" class="fab fa-youtube"></i>';
        }elseif($categoryName == 'Instagram'){
            return '<i style="visibility: inherit;" class="fab fa-instagram"></i>';
        }elseif($categoryName == 'Facebook'){
            return '<i style="visibility: inherit;" class="fab fa-facebook"></i>';
        }elseif($categoryName == 'Twitter'){
            return '<i style="visibility: inherit;" class="fab fa-twitter"></i>';
        }elseif($categoryName == 'Podcast'){
            return '<i style="visibility: inherit;" class="fa fa-podcast"></i>';
        }elseif($categoryName == 'Google Music'){
            return '<i style="visibility: inherit;" class="fab fa-google"></i>';
        }elseif($categoryName == 'Apple Music'){
            return '<i style="visibility: inherit;" class="fab fa-apple"></i>';
        }elseif($categoryName == 'Spotify'){
            return '<i style="visibility: inherit;" class="fab fa-spotify"></i>';
        }elseif($categoryName == 'Tidal'){
            return '<i style="visibility: inherit;" class="fa fa-text-width"></i>';
        }else{
            return '<i style="visibility: inherit;" class="fa fa-cubes"></i>';
        }
    }
}

if (!function_exists('getIpAddress')) {
    function getIpAddress(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}

if (!function_exists('getCountryCode')) {
    function getCountryInfo(){
        $ip = getIpAddress();
//        $ip = ''; // Your static ip
        $country = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        return $country;
    }
}

if (!function_exists('createUserLoginLog')) {
    function createUserLoginLog($userId){
        UserLoginLog::create([
            'user_id'     => $userId,
            'county_name' => isset(getCountryInfo()->geoplugin_countryName) ? getCountryInfo()->geoplugin_countryName:null,
            'ip_address'  => getIpAddress(),
            'device'      => Browser::platformName(),
            'browser'     => Browser::browserFamily(),
            'version'     => Browser::browserVersion(),
        ]);
        return true;
    }
}

if (!function_exists('createClientLoginLog')) {
    function createClientLoginLog($clientId){
        ClientLoginLog::create([
            'client_id'   => $clientId,
            'county_name' => isset(getCountryInfo()->geoplugin_countryName) ? getCountryInfo()->geoplugin_countryName:null,
            'ip_address'  => getIpAddress(),
            'device'      => Browser::platformName(),
            'browser'     => Browser::browserFamily(),
            'version'     => Browser::browserVersion(),
        ]);
        return true;
    }
}

if (!function_exists('notificationStore')) {
    function notificationStore($notifyArray){
        if (!empty($notifyArray['user_id'] || $notifyArray['client_id'])){
            $notify = new SideNotification();
            $notify->user_id = isset($notifyArray['user_id']) ? $notifyArray['user_id']:null;
            $notify->client_id = isset($notifyArray['client_id']) ? $notifyArray['client_id']:null;
            $notify->type = isset($notifyArray['type']) ? $notifyArray['type']:null;
            $notify->message = isset($notifyArray['message']) ? $notifyArray['message']:null;
            $notify->save();
            return true;
        }else{
            return false;
        }
    }
}

if (!function_exists('notificationSeen')) {
    function notificationSeen($notifyId){
        if ($notifyId){
            $notify = SideNotification::find($notifyId);
            $notify->status = 1;
            $notify->save();
            return true;
        }else{
            return false;
        }
    }
}

if (!function_exists('notificationSeen')) {
    function notificationRemove($notifyId){
        if ($notifyId){
            $notify = SideNotification::find($notifyId);
            $notify->is_delete = 1;
            $notify->save();
            return true;
        }else{
            return false;
        }
    }
}

if (!function_exists('getTimeToString')) {
    function getTimeToString($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);

        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}

if (!function_exists('notificationTypeColor')) {
    function notificationTypeColor($type){
        if ($type == 'Facebook'){
            return '#80b3ff';
        }elseif ($type == 'Youtube'){
            return '#cc0000';
        }elseif ($type == 'Mobile App'){
            return '#00cc00';
        }else{
            return '#600080';
        }
    }
}

if ( ! function_exists('numberFormat')) {
    function numberFormat($amount=0, $coma=null)
    {
        if ($coma) {
            if ($amount==0)
                return '-';
            else
                return number_format($amount,2);
        } else {
            return number_format($amount,2,'.','');
        }
    }
}

if ( ! function_exists('getComments')) {
    function getComments($postId){
       $comments = Comment::with('replies')->where('post_id', $postId)->get();
        $commentData =[];
        foreach ($comments as $ck => $comment){
            $commentData[] = [
                'id'          => $comment->id,
                'post_id'     => $comment->post_id,
                'user_id'     => $comment->user_id,
                'body'        => $comment->body,
                'username'    => $comment->user->username,
                'user_name'   => $comment->user->name,
                'user_avatar' => $comment->user->profile_photo!='' && file_exists('storage/images/'.$comment->user->profile_photo) ? $comment->user->profile_photo:null,
                'post_date'   => $comment->created_at->diffForHumans(),
                'replies'     => getReplies($comment->id)
            ];
        }
        return $commentData;
    }
}

if ( ! function_exists('getReplies')) {
    function getReplies($commentId){
       $replies = Reply::with('user')->where('comment_id', $commentId)->get();
        $replyData =[];
        foreach ($replies as $ck => $reply){
            $replyData[] = [
                'id'          => $reply->id,
                'comment_id'  => $reply->comment_id,
                'user_id'     => $reply->user_id,
                'body'        => $reply->body,
                'username'    => $reply->user->username,
                'user_name'   => $reply->user->name,
                'user_avatar' => $reply->user->profile_photo!='' && file_exists('storage/images/'.$reply->user->profile_photo) ? $reply->user->profile_photo:null,
                'post_date'   => $reply->created_at->diffForHumans(),
            ];
        }
        return $replyData;
    }
}

if ( ! function_exists('thousandsOfFormat')) {
    function thousandsOfFormat($num) {
        if($num>1000) {
            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = array('k', 'm', 'b', 't');
            $x_count_parts = count($x_array) - 1;
            $x_display = $x;
            $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];
            return $x_display;
        }
        return $num;
    }
}

if ( ! function_exists('getYoutubeImage')) {
    function getYoutubeImage($link) {
        if (!empty($link)){
            $video_id = explode("?v=", $link);
            $video_id = $video_id[1];
            $thumbnail="http://img.youtube.com/vi/".$video_id."/maxresdefault.jpg";
            if (isset($thumbnail)){
                return $thumbnail;
            }else{
                return null;
            }
        }else{
            return null;
        }

    }
}

if ( ! function_exists('getCountries')) {
    function getCountries(){
        $countries = [
            'Afghanistan',
            'Aland Islands',
            'Albania',
            'Algeria',
            'American Samoa',
            'Andorra',
            'Angola',
            'Anguilla',
            'Antarctica',
            'Antigua and Barbuda',
            'Argentina',
            'Armenia',
            'Aruba',
            'Australia',
            'Austria',
            'Azerbaijan',
            'Bahamas the',
            'Bahrain',
            'Bangladesh',
            'Barbados',
            'Belarus',
            'Belgium',
            'Belize',
            'Benin',
            'Bermuda',
            'Bhutan',
            'Bolivia',
            'Bosnia and Herzegovina',
            'Botswana',
            'Bouvet Island (Bouvetoya)',
            'Brazil',
            'British Indian Ocean Territory (Chagos Archipelago)',
            'British Virgin Islands',
            'Brunei Darussalam',
            'Bulgaria',
            'Burkina Faso',
            'Burundi',
            'Cambodia',
            'Cameroon',
            'Canada',
            'Cape Verde',
            'Cayman Islands',
            'Central African Republic',
            'Chad',
            'Chile',
            'China',
            'Christmas Island',
            'Cocos (Keeling) Islands',
            'Colombia',
            'Comoros the',
            'Congo',
            'Congo the',
            'Cook Islands',
            'Costa Rica',
            'Cote d\'Ivoire',
            'Croatia',
            'Cuba',
            'Cyprus',
            'Czech Republic',
            'Denmark',
            'Djibouti',
            'Dominica',
            'Dominican Republic',
            'Ecuador',
            'Egypt',
            'El Salvador',
            'Equatorial Guinea',
            'Eritrea',
            'Estonia',
            'Ethiopia',
            'Faroe Islands',
            'Falkland Islands (Malvinas)',
            'Fiji the Fiji Islands',
            'Finland',
            'France, French Republic',
            'French Guiana',
            'French Polynesia',
            'French Southern Territories',
            'Gabon',
            'Gambia the',
            'Georgia',
            'Germany',
            'Ghana',
            'Gibraltar',
            'Greece',
            'Greenland',
            'Grenada',
            'Guadeloupe',
            'Guam',
            'Guatemala',
            'Guernsey',
            'Guinea',
            'Guinea-Bissau',
            'Guyana',
            'Haiti',
            'Heard Island and McDonald Islands',
            'Holy See (Vatican City State)',
            'Honduras',
            'Hong Kong',
            'Hungary',
            'Iceland',
            'India',
            'Indonesia',
            'Iran',
            'Iraq',
            'Ireland',
            'Isle of Man',
            'Israel',
            'Italy',
            'Jamaica',
            'Japan',
            'Jersey',
            'Jordan',
            'Kazakhstan',
            'Kenya',
            'Kiribati',
            'Korea',
            'Korea',
            'Kuwait',
            'Kyrgyz Republic',
            'Lao',
            'Latvia',
            'Lebanon',
            'Lesotho',
            'Liberia',
            'Libyan Arab Jamahiriya',
            'Liechtenstein',
            'Lithuania',
            'Luxembourg',
            'Macao',
            'Macedonia',
            'Madagascar',
            'Malawi',
            'Malaysia',
            'Maldives',
            'Mali',
            'Malta',
            'Marshall Islands',
            'Martinique',
            'Mauritania',
            'Mauritius',
            'Mayotte',
            'Mexico',
            'Micronesia',
            'Moldova',
            'Monaco',
            'Mongolia',
            'Montenegro',
            'Montserrat',
            'Morocco',
            'Mozambique',
            'Myanmar',
            'Namibia',
            'Nauru',
            'Nepal',
            'Netherlands Antilles',
            'Netherlands the',
            'New Caledonia',
            'New Zealand',
            'Nicaragua',
            'Niger',
            'Nigeria',
            'Niue',
            'Norfolk Island',
            'Northern Mariana Islands',
            'Norway',
            'Oman',
            'Pakistan',
            'Palau',
            'Palestinian Territory',
            'Panama',
            'Papua New Guinea',
            'Paraguay',
            'Peru',
            'Philippines',
            'Pitcairn Islands',
            'Poland',
            'Portugal, Portuguese Republic',
            'Puerto Rico',
            'Qatar',
            'Reunion',
            'Romania',
            'Russian Federation',
            'Rwanda',
            'Saint Barthelemy',
            'Saint Helena',
            'Saint Kitts and Nevis',
            'Saint Lucia',
            'Saint Martin',
            'Saint Pierre and Miquelon',
            'Saint Vincent and the Grenadines',
            'Samoa',
            'San Marino',
            'Sao Tome and Principe',
            'Saudi Arabia',
            'Senegal',
            'Serbia',
            'Seychelles',
            'Sierra Leone',
            'Singapore',
            'Slovakia (Slovak Republic)',
            'Slovenia',
            'Solomon Islands',
            'Somalia, Somali Republic',
            'South Africa',
            'South Georgia and the South Sandwich Islands',
            'Spain',
            'Sri Lanka',
            'Sudan',
            'Suriname',
            'Svalbard & Jan Mayen Islands',
            'Swaziland',
            'Sweden',
            'Switzerland, Swiss Confederation',
            'Syrian Arab Republic',
            'Taiwan',
            'Tajikistan',
            'Tanzania',
            'Thailand',
            'Timor-Leste',
            'Togo',
            'Tokelau',
            'Tonga',
            'Trinidad and Tobago',
            'Tunisia',
            'Turkey',
            'Turkmenistan',
            'Turks and Caicos Islands',
            'Tuvalu',
            'Uganda',
            'Ukraine',
            'United Arab Emirates',
            'United Kingdom',
            'United States of America',
            'United States Minor Outlying Islands',
            'United States Virgin Islands',
            'Uruguay, Eastern Republic of',
            'Uzbekistan',
            'Vanuatu',
            'Venezuela',
            'Vietnam',
            'Wallis and Futuna',
            'Western Sahara',
            'Yemen',
            'Zambia',
            'Zimbabwe'
        ];
        return $countries;
    }
}



