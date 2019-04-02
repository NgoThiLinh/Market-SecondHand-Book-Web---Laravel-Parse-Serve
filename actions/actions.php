<?php
use Parse\ParseClient;
use Parse\ParseException;
use Parse\ParseQuery;
use Parse\ParseObject;
use Parse\ParseUser;

session_start();



    function dataLog($data){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    // Write your code here

    // Get book information for home page start
    function getNewBook()
    {
        $query = new ParseQuery("Books");
        try {
            $newbook = $query->greaterThanRelativeTime('createdAt', '1 week ago')->limit(10)->find();
        } catch (ParseException $ex) {
            echo("<script>console.log('[Book Market] Can not load data!');</script>");
        }
        return $newbook;
    }

    function getAllBook()
    {
        $query = new ParseQuery("Books");
        try{
            $allbook = $query->find();
        } catch (ParseException $ex){
            echo("<script>console.log('[Book Market] Can not load data!');</script>");
        }
        return $allbook;
    }

    function getTextBook()
    {
        $query = new ParseQuery("Books");
        try{
            $textBook = $query->equalTo("idCategory", 0)->find();
        } catch (ParseException $ex){
            echo("<script>console.log('[Book Market] Can not load data!');</script>");
        }
        return $textBook;
    }
    
    function findCategories($idCate){
        $query = new ParseQuery("Categories");
        $query->equalTo("objectId", $idCate);
        $findCate = $query->find();
        return $findCate;
    }

    function getComicBook()
    {
        $query = new ParseQuery("Books");
        try{
            $comicBook = $query->equalTo("idCategory", 'uTHs3si6Xz')->find();
        } catch (ParseException $ex){
            echo("<script>console.log('[Book Market] Can not load data!');</script>");
        }
        return $comicBook;
    }

    function getMagazineBook()
    {
        $query = new ParseQuery("Books");
        try{
            $magazineBook = $query->equalTo("idCategory", 1)->find();
        } catch (ParseException $ex){
            echo("<script>console.log('[Book Market] Can not load data!');</script>");
        }
        return $magazineBook;
    }
   // Get book information for home page end

    // Get categories
    function getCategories(){
        $query = new ParseQuery("Categories");
        
        try {
            $data = $query->find();
        } catch (ParseException $ex) {
            echo("<script>console.log('[Book Market] Can not load data!');</script>");
        }
        return $data;
    }
    // Get book by categories
    function getBookByCate($idCate){        
        $query = new ParseQuery("Books");
        $query->equalTo("idCategory", $idCate);
        $bookByCate = $query->find();
        return $bookByCate;
    }
    function getBookDetail($id){
        $query = new ParseQuery("Books");
        try {
          $bookDetailObject = $query->get($id);
          $idCategory = $bookDetailObject->get("idCategory");
          $idUser = $bookDetailObject->get("userId");
          $title = $bookDetailObject->get("title");
          $OriginPrice = $bookDetailObject->get("OriginPrice");
          $promotionPrice = $bookDetailObject->get("promotionPrice");
          $description = $bookDetailObject->get("description");
          $quantity = $bookDetailObject->get("quantity");
          $image = $bookDetailObject->get("images");
        } catch (ParseException $ex) {
        }
        return $bookDetailObject;
    }

    function getBookSell($idUser){
        $query = new ParseQuery("BookSold");
        $bookSell = $query->equalTo("userId", $idUser)->find();
        return $bookSell;
    }

    function User ($idUser){
        $query = ParseUser::query();
        $query->equalTo("objectId", $idUser);
        $users = $query->find();
        return $users;
    }
    function getCateByID($idCate){
        $query = new ParseQuery("Categories");
        $query->equalTo("objectId", $idCate);
        $cates = $query->find();
        return $cates;
    }

    function getBookSeller($idUser){
        $query = new ParseQuery("Books");
        $query->equalTo("userId", $idUser);
        $bookSeller = $query->find();
        return $bookSeller;
    }
    function getBookCate($idCate){
        $query = new ParseQuery("Books");
        $query->equalTo("idCategory", $idCate);
        $bookCate = $query->limit(3)->find();
        return $bookCate;
    }
    function getBookDifCate($idCate){
        $query = new ParseQuery("Books");
        $query->notEqualTo("idCategory", $idCate);
        $bookDifCate = $query->limit(3)->find();
        return $bookDifCate;
    }
    function getReviewAndRating($idUser){
        $query = new ParseQuery("RatingReview");
        $query->equalTo("UserIdBeFeedBack", $idUser);
        $reviewAndRating = $query->greaterThanOrEqualTo("numberOfStar", 4)->limit(4)->find();
        return $reviewAndRating;
    }
    function countBookOrderd($idUser){
        $query = new ParseQuery("Orders");
        $query->equalTo("sellerId", $idUser);
        $bookOrdered = $query->equalTo("shippedOrder", 1)->find();
        return $bookOrdered;
    }

    function paymentInfor($idUser){
    $query = new ParseQuery("MoneyAccount");
    $paymentObject = $query->equalTo("sellerId", $idUser)->find();
    return $paymentObject;
    }
    function getContact(){
        $query = new ParseQuery("Contact");
        $contact = $query->equalTo("Status", 1)->limit(4)->find();
        return $contact;
    }

    function bestSeller(){
        $query = new ParseQuery("Orders");
        $shipped = $query->equalTo("shippedOrder",1)->find();
        $listSellerID = getListSellerID($shipped);
        $listTopSellerID = countTopSellerID($shipped, $listSellerID);
        $listBestSellerName = getBestSellerName($listTopSellerID);

        return $listTopSellerID;

    }

    function getListSellerID($shipped) {
        $listSellerID = array();
        for ($i = 0; $i < count($shipped); $i++ ) {
            $isUnique = true;
            for($j = 0; $j < count($listSellerID); $j++  ) {
                if($shipped[$i]->get("sellerId")->getObjectId() == $listSellerID[$j])
                $isUnique = false;
            }

            if ($isUnique) {
                array_push($listSellerID, $shipped[$i]->get("sellerId")->getObjectId());
            }

            
        }
        return $listSellerID;
    }

    function countTopSellerID($shipped, $listSellerID) {
        $listTopSellerID = array();
        for ($i = 0; $i < count($listSellerID); $i++ ) {
            $topSellerObject = array(
                $listSellerID[$i] => 0
            );

            for ($j = 0; $j < count($shipped); $j++ ) {
                if($shipped[$j]->get("sellerId")->getObjectId() == $listSellerID[$i])
                    $topSellerObject[$listSellerID[$i]]++;
            }
            $listTopSellerID = $listTopSellerID + $topSellerObject;
        }
        
        arsort($listTopSellerID);

        return $listTopSellerID;
    }

    function getBestSellerName($listTopSellerID) {
        $listBestSellerName = array();
        $parseQuery = ParseUser::query();
        
        $limit = 4;

        foreach($listTopSellerID as $key=>$value) {
           if ($limit-- > 0) {
                $sellerObject = $parseQuery->equalTo("objectId", $key)->find();
                array_push($listBestSellerName, $sellerObject[0]->get("yourName"));
           }
        }

        return $listBestSellerName;
    }

    function getAllBookOfBestSeller($idBestSeller){

        $query = new ParseQuery("Books");
        $query->equalTo("userId", $idBestSeller);
        $BookOfBestSeller = $query->find();
        return $BookOfBestSeller;

    }
 
    function getOrder($idOrder){
        $query = new ParseQuery("Orders");
        try {
          $orderObject = $query->get($idOrder);
          $totalPrice = $orderObject->get("totalPrice");
          $receivedOrder = $orderObject->get("receivedOrder");
          $packagedOrder = $orderObject->get("packagedOrder");
          $inprogressOrder = $orderObject->get("inprogressOrder");
          $shippedOrder = $orderObject->get("shippedOrder");
          $sellerId = $orderObject->get("sellerId");
          $buyerId = $orderObject->get("buyerId");
          $bookId = $orderObject->get("bookId");
          $quanlity = $orderObject->get("quanlity");
        } catch (ParseException $ex) {
        }
        return $orderObject;
    } 
    function getBookSold($idBookSold){
        $query = new ParseQuery("BookSold");
        $query->equalTo("ObjectIdBookSold", $idBookSold);
        $bookSoldObject = $query->find();
        return $bookSoldObject;
    }
    function getBookSoldByUser($idUser){
        $query = new ParseQuery("BookSold");
        $query->equalTo("userId", $idUser);
        $bookSoldByUserObject = $query->find();
        return $bookSoldByUserObject;
    }
    function getBookSoldBuyByUser($idBookSold){
        $query = new ParseQuery("BookSold");
        $query->equalTo("ObjectIdBookSold", $idBookSold);
        $bookSoldBuyByUserObject = $query->find();
        return $bookSoldBuyByUserObject;
    }
    function getOrderByBookSold($idBookSold){
        $query = new ParseQuery("Orders");
        $query->equalTo("bookSoldId", $idBookSold);
        $orderByBookSoldObject = $query->find();
        return $orderByBookSoldObject;
    }
    function getOrderBySellerId($sellerId){
        $query = new ParseQuery("Orders");
        $query->equalTo("sellerId", $sellerId);
        $orderBySellerId = $query->find();
        return $orderBySellerId;
    }

    function getOrderByBuyerId($buyerId){
        $query = new ParseQuery("Orders");
        $query->equalTo("buyerId", $buyerId);
        $orderByBuyerId = $query->find();
        return $orderByBuyerId;
    }

    function getBookSoldDetail($id){
        $query = new ParseQuery("BookSold");
        try {
          $bookSoldObDetail = $query->get($id);
          $title = $bookSoldObDetail->get("title");
          $images = $bookSoldObDetail->get("images");
          $promotionPrice = $bookSoldObDetail->get("promotionPrice");
          $quanlity = $bookSoldObDetail->get("quanlity");
          $userId = $bookSoldObDetail->get("userId");
          $description = $bookSoldObDetail->get("description");
          $idCategory = $bookSoldObDetail->get("idCategory");
          $OriginPrice = $bookSoldObDetail->get("OriginPrice");
          $blocked = $bookSoldObDetail->get("blocked");
          $ObjectIdBookSold = $bookSoldObDetail->get("ObjectIdBookSold");
        } catch (ParseException $ex) {
         
        }
        return $bookSoldObDetail;
    }

    
    // Notification
    function notification(){
        echo("
            <div class='dev-notification' style='right: 0px; top: auto; bottom: 24px;'>
                <span>
                    <div id='dev-log' class='dev-notification-notice dev-show-off' >
                        <div class='dev-notification-notice-with-icon'>
                            <i class='dev-notification-notice-icon dev-success'>
                                <svg id='info' style='display: none;' viewBox='64 64 896 896' class=''  width='1em' height='1em' fill='currentColor' aria-hidden='true'><path d='M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z'></path><path d='M464 336a48 48 0 1 0 96 0 48 48 0 1 0-96 0zm72 112h-48c-4.4 0-8 3.6-8 8v272c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V456c0-4.4-3.6-8-8-8z'></path></svg>
                                <svg id='warning' style='display: none;' viewBox='64 64 896 896' class='' data-icon='exclamation-circle' width='1em' height='1em' fill='currentColor' aria-hidden='true'><path d='M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z'></path><path d='M464 688a48 48 0 1 0 96 0 48 48 0 1 0-96 0zm24-112h48c4.4 0 8-3.6 8-8V296c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v272c0 4.4 3.6 8 8 8z'></path></svg>
                                <svg id='error' style='display: none;' viewBox='64 64 896 896' class='' data-icon='close-circle' width='1em' height='1em' fill='currentColor' aria-hidden='true'><path d='M685.4 354.8c0-4.4-3.6-8-8-8l-66 .3L512 465.6l-99.3-118.4-66.1-.3c-4.4 0-8 3.5-8 8 0 1.9.7 3.7 1.9 5.2l130.1 155L340.5 670a8.32 8.32 0 0 0-1.9 5.2c0 4.4 3.6 8 8 8l66.1-.3L512 564.4l99.3 118.4 66 .3c4.4 0 8-3.5 8-8 0-1.9-.7-3.7-1.9-5.2L553.5 515l130.1-155c1.2-1.4 1.8-3.3 1.8-5.2z'></path><path d='M512 65C264.6 65 64 265.6 64 513s200.6 448 448 448 448-200.6 448-448S759.4 65 512 65zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z'></path></svg>
                                <svg id='success' style='display: none;' viewBox='64 64 896 896' class='' data-icon='check-circle' width='1em' height='1em' fill='currentColor' aria-hidden='true'><path d='M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z'></path><path d='M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z'></path></svg>
                                </i>
                                <div id='notificationTitle' class='dev-notification-notice-message'></div>
                                <div id='notificationContent' class='dev-notification-notice-description'></div>
                            </div>
                        <a id='notice-close' class='dev-notification-notice-close'>
                            <img style='width: 18px' src='https://www.freeiconspng.com/uploads/close-button-png-27.png' alt=''>
                        </a>
                    </div>
                </span>
            </div>
        ");
    }

    // Preloader
    function preloader(){
        echo("
        <div id='preloader' style='display: none;' class='dev-fade-in preloader-single shadow-inner res-mg-b-30'>
            <div class='ts_preloading_box'>
                <div id='ts-preloader-absolute23'>
                    <div class='tsperloader23' id='tsperloader23_one'></div>
                    <div class='tsperloader23' id='tsperloader23_two'></div>
                    <div class='tsperloader23' id='tsperloader23_three'></div>
                    <div class='tsperloader23' id='tsperloader23_four'></div>
                    <div class='tsperloader23' id='tsperloader23_five'></div>
                    <div class='tsperloader23' id='tsperloader23_six'></div>
                    <div class='tsperloader23' id='tsperloader23_seven'></div>
                    <div class='tsperloader23' id='tsperloader23_eight'></div>
                    <div class='tsperloader23' id='tsperloader23_big'></div>
                </div>
            </div>
        </div>
        ");
    }

    function getCity(){
        $path = storage_path("resources\dataset\province.json"); 
        $data = json_decode(file_get_contents($path), true); 
        return $data;
    }

    function getTreeLocation(){
        $path = storage_path("resources\dataset\data_tree.json"); 
        $data = json_decode(file_get_contents($path), true); 
        return $data;
    }

    function getMinLocation(){
        $path = storage_path("resources\dataset\min_tree.json"); 
        $data = json_decode(file_get_contents($path), true); 
        return $data;
    }

    function selectData($_data){
        $query = new ParseQuery($_data);
        
        try {
            $data = $query->find();
        } catch (ParseException $ex) {
            $data = ["Noti" => "No data..."];
        }
        return $data;
    }

    function saveSession($objectId){
        $_SESSION["_token"] = $objectId;
        return true;
    }

    class User { 
        var $userName = 'no'; 
     }

    function getCurrentUser(){
        $language = session()->get('language-web');
        
        if(!empty($_SESSION["_token"])) {
            $_token = $_SESSION["_token"];
        }else{
            $_SESSION["_token"] = 'null';
            $_token = $_SESSION["_token"];
        }
        

        $userClass = new ParseQuery("_User");
        $user_ = new User ();

        if($_token != "null"){
            $user = $userClass->get($_token);
        }else{
            $user = $user_;
        }
        $data = array($language, $_token, $user);
        return $data;
    }

    function removeToken(){
        $_SESSION["_token"] = "null";
        return true;
    }

    function getBooks(){
        $query = new ParseQuery("Books");
        
        try {
            $data = $query->find();
        } catch (ParseException $ex) {
            echo($ex);
        }
        return $data;
    }

    function sendMail($subject, $content, $nameTo, $emailTo, $emailCC = '') {
        $nFrom = '[Brighten]';
        $mFrom = 'disk29866@gmail.com'; //dia chi email cua ban
        $mPass = 'nguyenva'; //mat khau email cua ban
        $mail = new PHPMailer();
        $body = $content;
        $mail->IsSMTP();
        $mail->CharSet = "utf-8";
        $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->Username = $mFrom; // GMAIL username
        $mail->Password = $mPass; // GMAIL password
        $mail->SetFrom($mFrom, $nFrom);
        //chuyen chuoi thanh mang
        $ccmail = explode(',', $emailCC);
        $ccmail = array_filter($ccmail);
        if (!empty($ccmail)) {
            foreach ($ccmail as $k => $v) {
                $mail->AddCC($v);
            }
        }
        $mail->Subject = $subject;
        $mail->MsgHTML($body);
        $address = $emailTo;
        $mail->AddAddress($address, $nameTo);
        $mail->AddReplyTo('disk29866@gmail.com', 'Customer Service');
        if (!$mail->Send()) {
            return 0;
        } else {
            return 1;
        }
    }

    function mailForBuy(){
        $content = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html style='width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;'> <head> <meta charset='UTF-8'> <meta content='width=device-width, initial-scale=1' name='viewport'> <meta name='x-apple-disable-message-reformatting'> <meta http-equiv='X-UA-Compatible' content='IE=edge'> <meta content='telephone=no' name='format-detection'> <title>hi</title> <!--[if (mso 16)]> <style type='text/css'> a {text-decoration: none;} </style> <![endif]--> <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--> <!--[if !mso]><!-- --> <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700,700i' rel='stylesheet'> <!--<![endif]--> <style type='text/css'>@media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:16px!important; line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { font-size:30px!important } h2 a { font-size:26px!important } h3 a { font-size:20px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:12px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:12px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class='gmail-fix'] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button { font-size:20px!important; display:block!important; border-width:10px 0px 10px 0px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } .es-desk-menu-hidden { display:table-cell!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-menu td a { font-size:14px!important } }#outlook a {padding:0;}.ExternalClass {width:100%;}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div {line-height:100%;}.es-button {mso-style-priority:100!important;text-decoration:none!important;}a[x-apple-data-detectors] {color:inherit!important;text-decoration:none!important;font-size:inherit!important;font-family:inherit!important;font-weight:inherit!important;line-height:inherit!important;}.es-desk-hidden {display:none;float:left;overflow:hidden;width:0;max-height:0;line-height:0;mso-hide:all;}</style> </head> <body style='width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;'> <div class='es-wrapper-color' style='background-color:#E6E7E8;'> <!--[if gte mso 9]><v:background xmlns:v='urn:schemas-microsoft-com:vml' fill='t'><v:fill type='tile' color='#e6e7e8'></v:fill></v:background><![endif]--> <table class='es-wrapper' width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;'> <tr style='border-collapse:collapse;'> <td valign='top' style='padding:0;Margin:0;'> <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <table class='es-content-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;' width='600' cellspacing='0' cellpadding='0' bgcolor='#f7f7f7' align='center'> <tr style='border-collapse:collapse;'> <td align='left' style='Margin:0;padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;'> <!--[if mso]><table width='580' cellpadding='0' cellspacing='0'><tr><td width='369' valign='top'><![endif]--> <table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;'> <tr style='border-collapse:collapse;'> <td class='es-m-p0r es-m-p20b' width='369' valign='top' align='center' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td class='es-infoblock es-m-txt-c' align='left' style='padding:0;Margin:0;line-height:14px;font-size:12px;color:#999999;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:18px;color:#999999;'>Put your preheader text here</p> </td> </tr> </table> </td> </tr> </table> <!--[if mso]></td><td width='20'></td><td width='191' valign='top'><![endif]--> <table cellspacing='0' cellpadding='0' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td width='191' align='left' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td esdev-links-color='#666666' class='es-infoblock es-m-txt-c' align='right' style='padding:0;Margin:0;line-height:14px;font-size:12px;color:#999999;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:18px;color:#999999;'><a href='http://viewstripo.email' target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:12px;text-decoration:underline;color:#666666;'>Not displaying correctly?</a><br></p> </td> </tr> </table> </td> </tr> </table> <!--[if mso]></td></tr></table><![endif]--> </td> </tr> </table> </td> </tr> </table> <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> <tr style='border-collapse:collapse;'> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <table class='es-header-body' width='600' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;'> <tr style='border-collapse:collapse;'> <td align='left' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td width='600' valign='top' align='center' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-top:20px;padding-bottom:20px;'> <a target='_blank' href='http://viewstripo.email' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:13px;text-decoration:underline;color:#666666;'> <img src='https://i.imgur.com/q2BFAYF.png' alt='Furniture logo' title='Furniture logo' width='132' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;' height='88'> </a> </td> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-top:5px;padding-bottom:10px;'> <table width='100%' height='100%' cellspacing='0' cellpadding='0' border='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td style='padding:0;Margin:0px 0px 0px 0px;border-bottom:1px solid #CCCCCC;background:none;height:1px;width:100%;margin:0px;'></td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> <tr style='border-collapse:collapse;'> <td align='left' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td width='600' valign='top' align='center' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td style='padding:0;Margin:0;'> <table class='es-menu' width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr class='links' style='border-collapse:collapse;'> <td align='center' valign='top' width='25.00%' style='Margin:0;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:15px;border:0;' id='esd-menu-id-0' bgcolor='transparent'> <a target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:13px;text-decoration:none;display:block;color:#333333;font-weight:bold;' href='http://localhost:8000/'>HOME</a> </td> <td align='center' valign='top' width='25.00%' style='Margin:0;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:15px;border:0;' id='esd-menu-id-1' bgcolor='transparent'> <a target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:13px;text-decoration:none;display:block;color:#333333;font-weight:bold;' href='http://localhost:8000/book'>BOOKS</a> </td> <td align='center' valign='top' width='25.00%' style='Margin:0;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:15px;border:0;' id='esd-menu-id-2' bgcolor='transparent'> <a target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:13px;text-decoration:none;display:block;color:#333333;font-weight:bold;' href='http://localhost:8000/about'>ABOUT</a> </td> <td align='center' valign='top' width='25.00%' style='Margin:0;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:15px;border:0;' id='esd-menu-id-5' bgcolor='transparent'> <a target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:13px;text-decoration:none;display:block;color:#333333;font-weight:bold;' href='http://localhost:8000/contact'>CONTACT</a> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> <tr style='border-collapse:collapse;'> <td style='padding:0;Margin:0;padding-top:10px;padding-bottom:10px;background-color:#E8E4E1;' bgcolor='#e8e4e1' align='left'> <!--[if mso]><table width='600' cellpadding='0' cellspacing='0'><tr><td width='207'><![endif]--> <table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;'> <tr style='border-collapse:collapse;'> <td class='es-m-p0r es-m-p20b' width='187' align='center' style='padding:0;Margin:0;'> <table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;' width='100%' cellspacing='0' cellpadding='0'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:20px;color:#666666;'>GOOD QUALITY</p> </td> </tr> </table> </td> <td class='es-hidden' width='20' style='padding:0;Margin:0;'></td> </tr> </table> <!--[if mso]></td><td width='187'><![endif]--> <table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;'> <tr style='border-collapse:collapse;'> <td class='es-m-p20b' width='187' align='center' style='padding:0;Margin:0;'> <table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-width:0px 0px 0px 1px;border-style:solid;border-color:#E8E4E1 #E8E4E1 #E8E4E1 #CCCCCC;' width='100%' cellspacing='0' cellpadding='0'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:20px;color:#666666;'><span style='line-height:150%;'>CHEAP</span></p> </td> </tr> </table> </td> </tr> </table> <!--[if mso]></td><td width='20'></td><td width='186'><![endif]--> <table class='es-right' cellspacing='0' cellpadding='0' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;'> <tr style='border-collapse:collapse;'> <td width='186' align='center' style='padding:0;Margin:0;'> <table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-width:0px 0px 0px 1px;border-style:solid;border-color:#E8E4E1 #E8E4E1 #E8E4E1 #CCCCCC;' width='100%' cellspacing='0' cellpadding='0'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:20px;color:#666666;'><span style='line-height:150%;'>SUPPORT 24/7</span></p> </td> </tr> </table> </td> </tr> </table> <!--[if mso]></td></tr></table><![endif]--> </td> </tr> </table> </td> </tr> </table> <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <table class='es-content-body' width='600' cellspacing='0' cellpadding='0' bgcolor='#f7f7f7' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#F7F7F7;'> <tr style='border-collapse:collapse;'> <td style='Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;padding-bottom:30px;background-color:#C9E3A0;background-repeat:no-repeat;' bgcolor='#c9e3a0' align='left'> <!--[if mso]><table width='560' cellpadding='0' cellspacing='0'><tr><td width='270' valign='top'><![endif]--> <table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;'> <tr style='border-collapse:collapse;'> <td class='es-m-p20b' width='270' align='left' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td style='padding:0;Margin:0;position:relative;' align='center'> <img class='adapt-img' src='https://rivks.stripocdn.email/content/guids/bannerImgGuid/images/84661553676499406.png' alt='Many thanks for your order' title='Many thanks for your order' width='100%' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;'></td> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-top:15px;'> <span class='es-button-border' style='border-style:solid;border-color:#38761D;background:#C9E3A0 none repeat scroll 0% 0%;border-width:2px;display:inline-block;border-radius:5px;width:auto;'> <a href='http://localhost:8000/' class='es-button' target='_blank' style='mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:16px;color:#38761D;border-style:solid;border-color:#C9E3A0;border-width:5px 25px;display:inline-block;background:#C9E3A0 none repeat scroll 0% 0%;border-radius:5px;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center;'>Shop now</a> </span> </td> </tr> </table> </td> </tr> </table> <!--[if mso]></td><td width='20'></td><td width='270' valign='top'><![endif]--> <table class='es-right' cellspacing='0' cellpadding='0' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;'> <tr style='border-collapse:collapse;'> <td width='270' align='left' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-top:40px;'> <img class='adapt-img' src='https://rivks.stripocdn.email/content/guids/CABINET_3c93e680f17fc99b8d960eac81c2f811/images/86361520937827147.png' alt='' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;' width='250' height='273.89'></td> </tr> </table> </td> </tr> </table> <!--[if mso]></td></tr></table><![endif]--> </td> </tr> </table> </td> </tr> </table> <table cellpadding='0' cellspacing='0' class='es-content' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <table bgcolor='#ffffff' class='es-content-body' align='center' cellpadding='0' cellspacing='0' width='600' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#F7F7F7;'> <tr style='border-collapse:collapse;'> <td align='left' style='padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;'> <!--[if mso]><table width='560' cellpadding='0' cellspacing='0'><tr><td width='270' valign='top'><![endif]--> <table cellpadding='0' cellspacing='0' class='es-left' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;'> <tr style='border-collapse:collapse;'> <td width='270' class='es-m-p20b' align='left' style='padding:0;Margin:0;'> <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:21px;font-family:'source sans pro', 'helvetica neue', helvetica, arial, sans-serif;line-height:32px;color:#008000;'><strong>Cảm ơn bạn đã mua hàng</strong></p><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:21px;font-family:'source sans pro', 'helvetica neue', helvetica, arial, sans-serif;line-height:32px;color:#008000;'><strong>(Many thanks for your order)</strong></p> </td> </tr> </table> </td> </tr> </table> <!--[if mso]></td><td width='20'></td><td width='270' valign='top'><![endif]--> <table cellpadding='0' cellspacing='0' class='es-right' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;'> <tr style='border-collapse:collapse;'> <td width='270' align='left' style='padding:0;Margin:0;'> <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:10px;Margin:0;'> <span class='es-button-border' style='border-style:solid;border-color:#E29A07;background:#18AA0A;border-width:2px;display:inline-block;border-radius:5px;width:auto;'> <a href='http://localhost:8000/profile/historybuy' class='es-button' target='_blank' style='mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:'source sans pro', 'helvetica neue', helvetica, arial, sans-serif;font-size:16px;color:#000000;border-style:solid;border-color:#18AA0A;border-width:10px 20px 10px 20px;display:inline-block;background:#18AA0A;border-radius:5px;font-weight:bold;font-style:normal;line-height:19px;width:auto;text-align:center;'>Xem đơn hàng (View order)</a> </span> </td> </tr> </table> </td> </tr> </table> <!--[if mso]></td></tr></table><![endif]--> </td> </tr> </table> </td> </tr> </table> <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> <tr style='border-collapse:collapse;'> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <table class='es-footer-body' width='600' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#EFEFEF;'> <tr style='border-collapse:collapse;'> <td style='Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#EFEFEF;' bgcolor='#efefef' align='left'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td width='560' valign='top' align='center' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-bottom:5px;'> <table class='es-table-not-adapt es-social' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px;'> <img title='Twitter' src='https://stripo.email/cabinet/assets/editor/assets/img/social-icons/logo-gray/twitter-logo-gray.png' alt='Tw' width='32' height='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;'></td> <td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px;'> <img title='Facebook' src='https://stripo.email/cabinet/assets/editor/assets/img/social-icons/logo-gray/facebook-logo-gray.png' alt='Fb' width='32' height='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;'></td> <td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px;'> <img title='Youtube' src='https://stripo.email/cabinet/assets/editor/assets/img/social-icons/logo-gray/youtube-logo-gray.png' alt='Yt' width='32' height='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;'></td> <td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px;'> <img title='Instagram' src='https://stripo.email/cabinet/assets/editor/assets/img/social-icons/logo-gray/instagram-logo-gray.png' alt='Ig' width='32' height='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;'></td> <td valign='top' align='center' style='padding:0;Margin:0;'> <img title='Pinterest' src='https://stripo.email/cabinet/assets/editor/assets/img/social-icons/logo-gray/pinterest-logo-gray.png' alt='P' width='32' height='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;'></td> </tr> </table> </td> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-top:10px;padding-bottom:10px;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:18px;color:#999999;'>Make sure our messages get to your Inbox (and not your bulk or junk folders). Please, add customer.care.devteam@gmail.com to your contacts!</p> </td> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-bottom:10px;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:18px;color:#999999;'>You are receiving this email because you have visited our site or asked us about the regular newsletter. <a target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:12px;text-decoration:underline;color:#666666;line-height:18px;' href='http://localhost:8080'>Unsubscribe</a></p> </td> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:18px;color:#999999;'><span style='font-size:12px;'><span style='line-height:150%;'>Sơn Trà, TP. Đà Nẵng</span></span></p> </td> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-top:10px;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#666666;'>Vector graphics designed by Brighten TEAM</p> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <table class='es-content-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;' width='600' cellspacing='0' cellpadding='0' bgcolor='#f7f7f7' align='center'> <tr style='border-collapse:collapse;'> <td align='left' style='Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;padding-bottom:30px;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td width='560' valign='top' align='center' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td class='es-infoblock' align='center' style='padding:0;Margin:0;line-height:14px;font-size:12px;color:#999999;'> <a target='_blank' href='http://viewstripo.email/?utm_source=templates&utm_medium=email&utm_campaign=furniture_home_decor&utm_content=st_patricks_day' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:12px;text-decoration:underline;color:#666666;'> <img src='https://i.imgur.com/q2BFAYF.png' alt='' width='125' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;' height='83.33'> </a> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </div> </body></html>";
        return $content;
    }

    function mailForSeller(){
        $content = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html style='width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;'> <head> <meta charset='UTF-8'> <meta content='width=device-width, initial-scale=1' name='viewport'> <meta name='x-apple-disable-message-reformatting'> <meta http-equiv='X-UA-Compatible' content='IE=edge'> <meta content='telephone=no' name='format-detection'> <title>hi</title> <!--[if (mso 16)]> <style type='text/css'> a {text-decoration: none;} </style> <![endif]--> <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--> <!--[if !mso]><!-- --> <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700,700i' rel='stylesheet'> <!--<![endif]--> <style type='text/css'>@media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:16px!important; line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { font-size:30px!important } h2 a { font-size:26px!important } h3 a { font-size:20px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:12px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:12px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class='gmail-fix'] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button { font-size:20px!important; display:block!important; border-width:10px 0px 10px 0px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } .es-desk-menu-hidden { display:table-cell!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-menu td a { font-size:14px!important } }#outlook a { padding:0;}.ExternalClass { width:100%;}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div { line-height:100%;}.es-button { mso-style-priority:100!important; text-decoration:none!important;}a[x-apple-data-detectors] { color:inherit!important; text-decoration:none!important; font-size:inherit!important; font-family:inherit!important; font-weight:inherit!important; line-height:inherit!important;}.es-desk-hidden { display:none; float:left; overflow:hidden; width:0; max-height:0; line-height:0; mso-hide:all;}</style> </head> <body style='width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;'> <div class='es-wrapper-color' style='background-color:#E6E7E8;'> <!--[if gte mso 9]> <v:background xmlns:v='urn:schemas-microsoft-com:vml' fill='t'> <v:fill type='tile' color='#e6e7e8'></v:fill> </v:background> <![endif]--> <table class='es-wrapper' width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;'> <tr style='border-collapse:collapse;'> <td valign='top' style='padding:0;Margin:0;'> <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <table class='es-content-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;' width='600' cellspacing='0' cellpadding='0' bgcolor='#f7f7f7' align='center'> <tr style='border-collapse:collapse;'> <td align='left' style='Margin:0;padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;'> <!--[if mso]><table width='580' cellpadding='0' cellspacing='0'><tr><td width='369' valign='top'><![endif]--> <table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;'> <tr style='border-collapse:collapse;'> <td class='es-m-p0r es-m-p20b' width='369' valign='top' align='center' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td class='es-infoblock es-m-txt-c' align='left' style='padding:0;Margin:0;line-height:14px;font-size:12px;color:#999999;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:18px;color:#999999;'>Put your preheader text here</p> </td> </tr> </table> </td> </tr> </table> <!--[if mso]></td><td width='20'></td><td width='191' valign='top'><![endif]--> <table cellspacing='0' cellpadding='0' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td width='191' align='left' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td esdev-links-color='#666666' class='es-infoblock es-m-txt-c' align='right' style='padding:0;Margin:0;line-height:14px;font-size:12px;color:#999999;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:18px;color:#999999;'><a href='http://viewstripo.email' target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:12px;text-decoration:underline;color:#666666;'>Not displaying correctly?</a><br></p> </td> </tr> </table> </td> </tr> </table> <!--[if mso]></td></tr></table><![endif]--> </td> </tr> </table> </td> </tr> </table> <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> <tr style='border-collapse:collapse;'> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <table class='es-header-body' width='600' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;'> <tr style='border-collapse:collapse;'> <td align='left' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td width='600' valign='top' align='center' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-top:20px;padding-bottom:20px;'> <a target='_blank' href='http://viewstripo.email' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:13px;text-decoration:underline;color:#666666;'> <img src='https://i.imgur.com/q2BFAYF.png' alt='Furniture logo' title='Furniture logo' width='132' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;' height='88'> </a> </td> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-top:5px;padding-bottom:10px;'> <table width='100%' height='100%' cellspacing='0' cellpadding='0' border='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td style='padding:0;Margin:0px 0px 0px 0px;border-bottom:1px solid #CCCCCC;background:none;height:1px;width:100%;margin:0px;'></td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> <tr style='border-collapse:collapse;'> <td align='left' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td width='600' valign='top' align='center' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td style='padding:0;Margin:0;'> <table class='es-menu' width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr class='links' style='border-collapse:collapse;'> <td align='center' valign='top' width='25.00%' style='Margin:0;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:15px;border:0;' id='esd-menu-id-0' bgcolor='transparent'> <a target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:13px;text-decoration:none;display:block;color:#333333;font-weight:bold;' href='http://localhost:8000/'>HOME</a> </td> <td align='center' valign='top' width='25.00%' style='Margin:0;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:15px;border:0;' id='esd-menu-id-1' bgcolor='transparent'> <a target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:13px;text-decoration:none;display:block;color:#333333;font-weight:bold;' href='http://localhost:8000/book'>BOOKS</a> </td> <td align='center' valign='top' width='25.00%' style='Margin:0;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:15px;border:0;' id='esd-menu-id-2' bgcolor='transparent'> <a target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:13px;text-decoration:none;display:block;color:#333333;font-weight:bold;' href='http://localhost:8000/about'>ABOUT</a> </td> <td align='center' valign='top' width='25.00%' style='Margin:0;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:15px;border:0;' id='esd-menu-id-5' bgcolor='transparent'> <a target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:13px;text-decoration:none;display:block;color:#333333;font-weight:bold;' href='http://localhost:8000/contact'>CONTACT</a> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> <tr style='border-collapse:collapse;'> <td style='padding:0;Margin:0;padding-top:10px;padding-bottom:10px;background-color:#E8E4E1;' bgcolor='#e8e4e1' align='left'> <!--[if mso]><table width='600' cellpadding='0' cellspacing='0'><tr><td width='207'><![endif]--> <table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;'> <tr style='border-collapse:collapse;'> <td class='es-m-p0r es-m-p20b' width='187' align='center' style='padding:0;Margin:0;'> <table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;' width='100%' cellspacing='0' cellpadding='0'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:20px;color:#666666;'>GOOD QUALITY</p> </td> </tr> </table> </td> <td class='es-hidden' width='20' style='padding:0;Margin:0;'></td> </tr> </table> <!--[if mso]></td><td width='187'><![endif]--> <table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;'> <tr style='border-collapse:collapse;'> <td class='es-m-p20b' width='187' align='center' style='padding:0;Margin:0;'> <table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-width:0px 0px 0px 1px;border-style:solid;border-color:#E8E4E1 #E8E4E1 #E8E4E1 #CCCCCC;' width='100%' cellspacing='0' cellpadding='0'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:20px;color:#666666;'><span style='line-height:150%;'>CHEAP</span></p> </td> </tr> </table> </td> </tr> </table> <!--[if mso]></td><td width='20'></td><td width='186'><![endif]--> <table class='es-right' cellspacing='0' cellpadding='0' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;'> <tr style='border-collapse:collapse;'> <td width='186' align='center' style='padding:0;Margin:0;'> <table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-width:0px 0px 0px 1px;border-style:solid;border-color:#E8E4E1 #E8E4E1 #E8E4E1 #CCCCCC;' width='100%' cellspacing='0' cellpadding='0'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:13px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:20px;color:#666666;'><span style='line-height:150%;'>SUPPORT 24/7</span></p> </td> </tr> </table> </td> </tr> </table> <!--[if mso]></td></tr></table><![endif]--> </td> </tr> </table> </td> </tr> </table> <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <table class='es-content-body' width='600' cellspacing='0' cellpadding='0' bgcolor='#f7f7f7' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#F7F7F7;'> <tr style='border-collapse:collapse;'> <td style='Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;padding-bottom:30px;background-color:#C9E3A0;background-repeat:no-repeat;' bgcolor='#c9e3a0' align='left'> <!--[if mso]><table width='560' cellpadding='0' cellspacing='0'><tr><td width='270' valign='top'><![endif]--> <table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;'> <tr style='border-collapse:collapse;'> <td class='es-m-p20b' width='270' align='left' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td style='padding:0;Margin:0;position:relative;' align='center'> <img class='adapt-img' src='https://rivks.stripocdn.email/content/guids/bannerImgGuid/images/84661553676499406.png' alt='Many thanks for your order' title='Many thanks for your order' width='100%' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;'></td> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-top:15px;'> <span class='es-button-border' style='border-style:solid;border-color:#38761D;background:#C9E3A0 none repeat scroll 0% 0%;border-width:2px;display:inline-block;border-radius:5px;width:auto;'> <a href='http://localhost:8000/' class='es-button' target='_blank' style='mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:16px;color:#38761D;border-style:solid;border-color:#C9E3A0;border-width:5px 25px;display:inline-block;background:#C9E3A0 none repeat scroll 0% 0%;border-radius:5px;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center;'>Shop now</a> </span> </td> </tr> </table> </td> </tr> </table> <!--[if mso]></td><td width='20'></td><td width='270' valign='top'><![endif]--> <table class='es-right' cellspacing='0' cellpadding='0' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;'> <tr style='border-collapse:collapse;'> <td width='270' align='left' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-top:40px;'> <img class='adapt-img' src='https://rivks.stripocdn.email/content/guids/CABINET_3c93e680f17fc99b8d960eac81c2f811/images/86361520937827147.png' alt='' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;' width='250' height='273.89'></td> </tr> </table> </td> </tr> </table> <!--[if mso]></td></tr></table><![endif]--> </td> </tr> </table> </td> </tr> </table> <table cellpadding='0' cellspacing='0' class='es-content' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <table bgcolor='#ffffff' class='es-content-body' align='center' cellpadding='0' cellspacing='0' width='600' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#F7F7F7;'> <tr style='border-collapse:collapse;'> <td align='left' style='padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;'> <!--[if mso]><table width='560' cellpadding='0' cellspacing='0'><tr><td width='270' valign='top'><![endif]--> <table cellpadding='0' cellspacing='0' class='es-left' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;'> <tr style='border-collapse:collapse;'> <td width='270' class='es-m-p20b' align='left' style='padding:0;Margin:0;'> <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:21px;font-family:'source sans pro', 'helvetica neue', helvetica, arial, sans-serif;line-height:32px;color:#008000;'><strong>Cảm ơn bạn đã mua hàng</strong></p><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:21px;font-family:'source sans pro', 'helvetica neue', helvetica, arial, sans-serif;line-height:32px;color:#008000;'><strong>(Many thanks for your order)</strong></p> </td> </tr> </table> </td> </tr> </table> <!--[if mso]></td><td width='20'></td><td width='270' valign='top'><![endif]--> <table cellpadding='0' cellspacing='0' class='es-right' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;'> <tr style='border-collapse:collapse;'> <td width='270' align='left' style='padding:0;Margin:0;'> <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:10px;Margin:0;'> <span class='es-button-border' style='border-style:solid;border-color:#E29A07;background:#18AA0A;border-width:2px;display:inline-block;border-radius:5px;width:auto;'> <a href='http://localhost:8000/profile/historysell' class='es-button' target='_blank' style='mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:'source sans pro', 'helvetica neue', helvetica, arial, sans-serif;font-size:16px;color:#000000;border-style:solid;border-color:#18AA0A;border-width:10px 20px 10px 20px;display:inline-block;background:#18AA0A;border-radius:5px;font-weight:bold;font-style:normal;line-height:19px;width:auto;text-align:center;'>Xem đơn hàng (View order)</a> </span> </td> </tr> </table> </td> </tr> </table> <!--[if mso]></td></tr></table><![endif]--> </td> </tr> </table> </td> </tr> </table> <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> <tr style='border-collapse:collapse;'> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <table class='es-footer-body' width='600' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#EFEFEF;'> <tr style='border-collapse:collapse;'> <td style='Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#EFEFEF;' bgcolor='#efefef' align='left'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td width='560' valign='top' align='center' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-bottom:5px;'> <table class='es-table-not-adapt es-social' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px;'> <img title='Twitter' src='https://stripo.email/cabinet/assets/editor/assets/img/social-icons/logo-gray/twitter-logo-gray.png' alt='Tw' width='32' height='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;'></td> <td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px;'> <img title='Facebook' src='https://stripo.email/cabinet/assets/editor/assets/img/social-icons/logo-gray/facebook-logo-gray.png' alt='Fb' width='32' height='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;'></td> <td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px;'> <img title='Youtube' src='https://stripo.email/cabinet/assets/editor/assets/img/social-icons/logo-gray/youtube-logo-gray.png' alt='Yt' width='32' height='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;'></td> <td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px;'> <img title='Instagram' src='https://stripo.email/cabinet/assets/editor/assets/img/social-icons/logo-gray/instagram-logo-gray.png' alt='Ig' width='32' height='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;'></td> <td valign='top' align='center' style='padding:0;Margin:0;'> <img title='Pinterest' src='https://stripo.email/cabinet/assets/editor/assets/img/social-icons/logo-gray/pinterest-logo-gray.png' alt='P' width='32' height='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;'></td> </tr> </table> </td> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-top:10px;padding-bottom:10px;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:18px;color:#999999;'>Make sure our messages get to your Inbox (and not your bulk or junk folders). Please, add customer.care.devteam@gmail.com to your contacts!</p> </td> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-bottom:10px;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:18px;color:#999999;'>You are receiving this email because you have visited our site or asked us about the regular newsletter. <a target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:12px;text-decoration:underline;color:#666666;line-height:18px;' href='http://localhost:8080'>Unsubscribe</a></p> </td> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:18px;color:#999999;'><span style='font-size:12px;'><span style='line-height:150%;'>Sơn Trà, TP. Đà Nẵng</span></span></p> </td> </tr> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;padding-top:10px;'> <p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#666666;'>Vector graphics designed by Brighten TEAM</p> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> <tr style='border-collapse:collapse;'> <td align='center' style='padding:0;Margin:0;'> <table class='es-content-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;' width='600' cellspacing='0' cellpadding='0' bgcolor='#f7f7f7' align='center'> <tr style='border-collapse:collapse;'> <td align='left' style='Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;padding-bottom:30px;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td width='560' valign='top' align='center' style='padding:0;Margin:0;'> <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> <tr style='border-collapse:collapse;'> <td class='es-infoblock' align='center' style='padding:0;Margin:0;line-height:14px;font-size:12px;color:#999999;'> <a target='_blank' href='http://viewstripo.email/?utm_source=templates&utm_medium=email&utm_campaign=furniture_home_decor&utm_content=st_patricks_day' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:12px;text-decoration:underline;color:#666666;'> <img src='https://i.imgur.com/q2BFAYF.png' alt='' width='125' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;' height='83.33'> </a> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </div> </body></html>";
        return $content;
    }
    