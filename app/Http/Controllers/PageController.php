<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demo;
require '..\autoload.php';
use Parse\ParseClient;
use Parse\ParseException;
use Parse\ParseQuery;
use Parse\ParseObject;
use Parse\ParseUser;
use Mail;

require '..\actions\apiconfig.php';
require '..\actions\actions.php';
require "..\lib\class.smtp.php";
require "..\lib\class.phpmailer.php";

class PageController extends Controller
{
    public function indexPage()
    {
        $showNewBook = getNewBook();
        $showAllBook = getAllBook();
        $categories = getCategories();
        $city = getCity();
        $data = getCurrentUser();
        $currentUser = $data[1];
        $currentUserInfor = $data[2];
        $paymentInfor = paymentInfor($currentUser);
        $showContact = getContact();
        $listTopSellerID = bestSeller();
        $listBestSellerName = getBestSellerName($listTopSellerID);
        $stop = 1;
        foreach($listTopSellerID as $key=>$value) {
          if($stop == 1){
            $bestId = $key;
          }
          $stop--;
          
        }

        $objectUserBestSeller = User($bestId);
        for($i=0;$i<count($objectUserBestSeller);$i++){
          $bestSellerObject = $objectUserBestSeller[0];
        }
        $allBookOfBestSeller = getAllBookOfBestSeller($bestSellerObject);

        $showComicBook = array();
        $idCT = "fWr6mNLZza";
        for ($i = 0; $i < count($showAllBook); $i++) {
            if($showAllBook[$i]->get("idCategory")->getObjectId() == $idCT){
                $item = array($showAllBook[$i]->getObjectId(),$showAllBook[$i]->get("title"), $showAllBook[$i]->get("promotionPrice"), $showAllBook[$i]->get("OriginPrice"), $showAllBook[$i]->get("images")[0]);
                array_push($showComicBook,$item);

            }
        }

        $showTextBook = array();
        $idCT = "sMukVop7G9";
        for ($i = 0; $i < count($showAllBook); $i++) {
            if($showAllBook[$i]->get("idCategory")->getObjectId() == $idCT){
                $item = array($showAllBook[$i]->getObjectId(),$showAllBook[$i]->get("title"), $showAllBook[$i]->get("promotionPrice"), $showAllBook[$i]->get("OriginPrice"), $showAllBook[$i]->get("images")[0]);
                array_push($showTextBook,$item);

            }
        }

        $showMagazineBook = array();
        $idCT = "YA8PRVU17p";
        for ($i = 0; $i < count($showAllBook); $i++) {
            if($showAllBook[$i]->get("idCategory")->getObjectId() == $idCT){
                $item = array($showAllBook[$i]->getObjectId(),$showAllBook[$i]->get("title"), $showAllBook[$i]->get("promotionPrice"), $showAllBook[$i]->get("OriginPrice"), $showAllBook[$i]->get("images")[0]);
                array_push($showMagazineBook,$item);

            }
        }


        return view('index',compact('showNewBook', 'showAllBook', 'showTextBook','showComicBook','showMagazineBook', 'categories', 'city', 'showContact', 'listBestSellerName', 'data','paymentInfor','allBookOfBestSeller'));
    }

    public function shopPage(){
        $categories = getCategories();
        $city = getCity();
        $data = getBooks();
        $books = array();
        $bookOfCate = array();
        for ($i = 0; $i < count($data); $i++) {
            array_push($books, $data[$i]);
        }
        for ($i = 0; $i< count($categories);$i++){
            array_push($bookOfCate, getBookByCate($categories[$i]));
        }
        $numberOfBookByCate = array();
        for ($i = 0; $i< count($bookOfCate);$i++){
            array_push($numberOfBookByCate, count($bookOfCate[$i]));
        }
        $data = getCurrentUser();
        $currentUser = $data[1];
        $currentUserInfor = $data[2];
        $paymentInfor = paymentInfor($currentUser);
        return view('user.shop', compact('categories', 'books', 'city','paymentInfor','numberOfBookByCate'));
    }

    public function getBookCategory($idCate){
        $categories = getCategories();
        $city = getCity();
        $data = getBooks();
        $books = array();
        $bookOfCate = array();
        for ($i = 0; $i < count($data); $i++) {
            array_push($books, $data[$i]);
        }
        for ($i = 0; $i< count($categories);$i++){
            array_push($bookOfCate, getBookByCate($categories[$i]));
        }
        $numberOfBookByCate = array();
        for ($i = 0; $i< count($bookOfCate);$i++){
            array_push($numberOfBookByCate, count($bookOfCate[$i]));
        }
        $objectcate = findCategories($idCate);
        $allBookByCate = getBookByCate($objectcate[0]);
        $detailBookByCate = array();
        for($i = 0; $i < count($allBookByCate);$i++){
            array_push($detailBookByCate, getBookDetail($allBookByCate[$i]->getObjectId()));
        }
        $data = getCurrentUser();
        $currentUser = $data[1];
        $currentUserInfor = $data[2];
        $paymentInfor = paymentInfor($currentUser);
        return view('user.book-of-category', compact('categories', 'books', 'city','paymentInfor','numberOfBookByCate','detailBookByCate'));

    }


    public function getBook(){
        $cars=array("Volvo","BMW","Toyota");
        echo '<script>';
        echo 'console.log('. json_encode( $cars ) .')';
        echo '</script>';
    }

    public function productDetail($id){

        $showdetail = getBookDetail($id);
        $userIdFromBook = $showdetail->get("userId");
        $userIdFromUser = $userIdFromBook->getObjectId();
        $users = User($userIdFromUser);
        $idCategoryFromBook = $showdetail->get("idCategory");
        $idCategoryFromCategory = $idCategoryFromBook->getObjectId();
        $cates = getCateByID($idCategoryFromCategory);
        $bookSeller = getBookSeller($showdetail->get("userId"));
        $categories = getCategories();
        $city = getCity();
        $bookCate = getBookCate($showdetail->get("idCategory"));
        $bookDifCate = getBookDifCate($showdetail->get("idCategory"));
        $reviewAndRating = getReviewAndRating($userIdFromUser);
        $countReview = count($reviewAndRating);
        $bookOrderes = countBookOrderd($showdetail->get("userId"));
        $countbookOrdered = count($bookOrderes);
        $data = getCurrentUser();
        $currentUser = $data[1];
        $currentUserInfor = $data[2];
        $paymentInfor = paymentInfor($currentUser);
        return view('user.detail',compact('showdetail','users','cates','bookSeller','bookCate','bookDifCate','reviewAndRating','countReview','countbookOrdered','categories','city','paymentInfor'));
    }


    public function getProfileSell(){
        $categories = getCategories();
        $city = getCity();
        $data = getCurrentUser();
        $currentUser = $data[2];
        return view('user.profile-sell-history',compact('categories', 'city'));



    }

    public function getProfileBuy(){
        // $showProfile = User($idUser);
        $categories = getCategories();
        $city = getCity();
    
        return view('user.profile-buy-history',compact('categories', 'city'));

    }

    public function viewCart(){
        $categories = getCategories();
        $data = getCurrentUser();
        $currentUser = $data[1];
        $currentUserInfor = $data[2];
        $paymentInfor = paymentInfor($currentUser);
        return view('user.cart',compact('categories', 'paymentInfor'));
    }

    public function checkOut(){
        $city = getCity();
        $categories = getCategories();
        $data = getCurrentUser();
        $currentUser = $data[1];
        $currentUserInfor = $data[2];
        $paymentInfor = paymentInfor($currentUser);
        return view('user.checkout',compact('city', 'categories', 'paymentInfor'));
    }

    public function wishList(){
        return view('user.wishlist',compact(''));
    }

    public function about(){
        $categories = getCategories();
        $city = getCity();
        return view('user.about',compact('categories','city'));
    }

    public function contact(){

        $categories = getCategories();
        $city = getCity();
        $data = getCurrentUser();
        $currentUser = $data[1];
        $currentUserInfor = $data[2];
        $paymentInfor = paymentInfor($currentUser);
        return view('user.contact',compact('city','categories','paymentInfor','currentUserInfor'));
    }

    public function setContact(Request $request){
        $contactObject = new ParseObject("Contact");
        $contactObject->set("fullName", $request->name);
        $contactObject->set("email", $request->email);
        $contactObject->set("message", $request->message);
        $contactObject->set("subject", $request->subject);
        $contactObject->set("Status", 0);
        try {
          $contactObject->save();
            return 'success';
        } catch (ParseException $ex) {
            return 'failed';
        }
    }
    public function delivery($id){
        $categories = getCategories();
        $city = getCity();
        $order = getOrder($id);
        $data = getCurrentUser();
        $currentUser = $data[1];
        $currentUserInfor = $data[2];
        $paymentInfor = paymentInfor($currentUser);
        //buyer information 
        $buyerInforIdFromOrder = $order->get("buyerId");
        $buyerInforIdFromUser = $buyerInforIdFromOrder->getObjectId();
        $buyerInfor = User($buyerInforIdFromUser);
        //seller information
        $usersellerIdFromOrder = $order->get("sellerId");
        $userSellerIdFromUser = $usersellerIdFromOrder->getObjectId();
        $users = User($userSellerIdFromUser);
        if($order->get("shippedOrder")==0){
        //book information
        $bookIdFromOrder = $order->get("bookId");
        $bookIdFromBookSold = $bookIdFromOrder->getObjectId();
        $bookInfor = getBookDetail($bookIdFromBookSold);
        }else if($order->get("shippedOrder")==1){

        //book solded information
        $bookIdFromOrder = $order->get("bookId");
        $bookIdFromBookSold = $bookIdFromOrder->getObjectId();
        $objectBookSold = getBookSold($bookIdFromBookSold);
        for($i=0;$i<count($objectBookSold);$i++){
          $idSoldBook = $objectBookSold[$i]->getObjectId();
        }
        $bookInfor = getBookSoldDetail($idSoldBook);
        }

        return view('user.delivery',compact('categories','city','users','order','bookInfor','buyerInfor','userSellerIdFromUser','buyerInforIdFromUser','paymentInfor'));
    }

    public function policy(){
        $categories = getCategories();
        $city = getCity();
        $data = getCurrentUser();
        $currentUser = $data[1];
        $currentUserInfor = $data[2];
        $paymentInfor = paymentInfor($currentUser);
        return view('user.policy', compact('categories','city','paymentInfor'));
    }

    public function search(){
        return view('user.search', compact(''));
    }

    public function finished(){
        return view('user.finished',compact(''));
    }

    public function profile(){
        $categories = getCategories();
        $city = getCity();
        return view('user.profile',compact('categories','city'));
    }

    public function profileUserInfor(){
      $categories = getCategories();
        $city = getCity();
        $data = getCurrentUser();
        $currentUser = $data[1];
        $currentUserInfor = $data[2];
        $paymentInfor = paymentInfor($currentUser);
        return view('user.profile-userInfor',compact('categories','city','paymentInfor','currentUserInfor'));
    }

    public function profileEnterMoney(){
        $categories = getCategories();
        $city = getCity();
        $data = getCurrentUser();
        $currentUser = $data[1];
        $currentUserInfor = $data[2];
        $paymentInfor = paymentInfor($currentUser);
        return view('user.profile-enter-money',compact('categories','city','paymentInfor','currentUserInfor'));
    }
    public function setAddScoreExchange(Request $request){
      $moneyExchange = (int)$request->totalMoneyExchange;
      $currentUser = getCurrentUser();
      $user = $currentUser[1];
      $obUser = $currentUser[2];
      $query = new ParseQuery("MoneyAccount");
      $objectUser = $query->equalTo("sellerId", $user)->find();
      for ($i=0; $i< count($objectUser) ;$i++){
      $idObjectmoneyAccount = $objectUser[$i]->getObjectId();
      }
      $queryMoney = new ParseQuery("MoneyAccount");
      try {
          $moneyAccountObject = $queryMoney->get($idObjectmoneyAccount);
          $moneyAccountObject->set("moneyAccount",  $moneyExchange);
          $moneyAccountObject->set("score",  0);
          $moneyAccountObject->save();
          return "success";
        } catch (ParseException $ex) {
          return "failed";
        }

    }
    
    public function setProfileEnterMoney(Request $request){
      $currentUser = getCurrentUser();
      $user = $currentUser[1];
      $moneyAccount = (int)$request->total;
      $numberActiveday = (int)$request->day;
      $active = (int)$request->active;
      $freeTrial = (int)$request->freeTrial;
      $query = new ParseQuery("MoneyAccount");
      $objectUser = $query->equalTo("sellerId", $user)->find();
      for ($i=0; $i< count($objectUser) ;$i++){
      $idObjectmoneyAccount = $objectUser[$i]->getObjectId();
      }
        try {
          $moneyAccountObject = $query->get($idObjectmoneyAccount);
          $moneyAccountObject->set("sellerActive",  1);
          $moneyAccountObject->set("freeTrial", 1);
          $moneyAccountObject->set("moneyAccount", $moneyAccount);
          $moneyAccountObject->set("activeDay", $request->today);
          $moneyAccountObject->set("numberActiveDay",$numberActiveday);
          $moneyAccountObject->save();
          return "success";
        } catch (ParseException $ex) {
          return "failed";
        }
        

    }
    public function profileStopActive(){
        $data = getCurrentUser();
        $currentUser = $data[1];
        $currentUserInfor = $data[2];
        $paymentInfor = paymentInfor($currentUser);
        $categories = getCategories();
        $city = getCity();
        return view('user.profile-stop-active',compact('categories','city','paymentInfor','currentUserInfor'));
    }
    public function setprofileStopActive(Request $request){
      $currentUser = getCurrentUser();
      $user = $currentUser[1];
      $obUser = $currentUser[2];
      $query = new ParseQuery("MoneyAccount");
      $objectUser = $query->equalTo("sellerId", $user)->find();
      for ($i=0; $i< count($objectUser) ;$i++){
      $idObjectmoneyAccount = $objectUser[$i]->getObjectId();
      }
      $queryBook = new ParseQuery("Books");
      $allobjectbook = $queryBook->equalTo("userId",$obUser)->find();

        try {
          $moneyAccountObject = $query->get($idObjectmoneyAccount);
          $moneyAccountObject->set("sellerActive",  0);
          $moneyAccountObject->set("activeDay", "");
          $moneyAccountObject->set("numberActiveDay", 0);
          for ($i=0; $i< count($allobjectbook) ;$i++){
            $bookObject = $queryBook->get($allobjectbook[$i]->getObjectId());
            $bookObject->set("blocked", 1);
            $bookObject->save();
          }

          $moneyAccountObject->save();
          return "success";
        } catch (ParseException $ex) {
          return "failed";
        }
    }
    public function setprofileActiveAgain(Request $request){
      $currentUser = getCurrentUser();
      $user = $currentUser[1];
      $obUser = $currentUser[2];
      $query = new ParseQuery("MoneyAccount");
      $numberActiveday = (int)$request->date;
      $objectUser = $query->equalTo("sellerId", $user)->find();
      for ($i=0; $i< count($objectUser) ;$i++){
      $idObjectmoneyAccount = $objectUser[$i]->getObjectId();
      }
      $queryBook = new ParseQuery("Books");
      $allobjectbook = $queryBook->equalTo("userId",$obUser)->find();
        try {
          $moneyAccountObject = $query->get($idObjectmoneyAccount);
          $moneyAccountObject->set("sellerActive",  1);
          $moneyAccountObject->set("activeDay", $request->today);
          $moneyAccountObject->set("numberActiveDay",$numberActiveday);
          $moneyAccountObject->set("reasonStop", "");
          for ($i=0; $i< count($allobjectbook) ;$i++){
            $bookObject = $queryBook->get($allobjectbook[$i]->getObjectId());
            $bookObject->set("blocked", 0);
            $bookObject->save();
          }
          $moneyAccountObject->save();
          return "success";
        } catch (ParseException $ex) {
          return "failed";
        }
    }
    public function history(){
        $categories = getCategories();
        $city = getCity();
        return view('user.history',compact('categories','city'));
    
    }
    public function profileUserHistorySell(){
        if(getCurrentUser()[2]->userName == "no"){
            $_SESSION["page"] = "http://localhost:8000/profile/historysell";
            header("Location: /", true, 301);
            exit();
        }else{
            $categories = getCategories();
            $city = getCity();
            $data = getCurrentUser();
            $currentUser = $data[1];
            $currentUserInfor = $data[2];
            $paymentInfor = paymentInfor($currentUser);
            $bookSoldOfCurrentUser = getBookSoldByUser($currentUserInfor);
            $numberOfBookSoldOfUser = count($bookSoldOfCurrentUser);
            $arrayidobjectBookSold = array();
            for($i =0 ; $i<count($bookSoldOfCurrentUser);$i++){
                array_push($arrayidobjectBookSold,$bookSoldOfCurrentUser[$i]->get("ObjectIdBookSold"));
            }
            $arrayobjectOrderByBookSold = array();
            for($i =0 ; $i<count($arrayidobjectBookSold);$i++){
              $idObjectSoldB =  getOrderByBookSold($arrayidobjectBookSold[$i]);
             for($j = 0; $j<count($idObjectSoldB);$j++){
              $objectOrder = getOrder($idObjectSoldB[$j]->getObjectId());
                array_push($arrayobjectOrderByBookSold,$objectOrder);
             }
            }
      
            $arayObjectOrderNotFinish = array();
            $arrayIdObjectBook = array();
            $allOrderObjectSellByUser = getOrderBySellerId($currentUserInfor);
            for($i=0;$i<count($allOrderObjectSellByUser);$i++){
              if($allOrderObjectSellByUser[$i]->get("inprogressOrder")== 0){
                array_push($arayObjectOrderNotFinish,$allOrderObjectSellByUser[$i]);
                array_push($arrayIdObjectBook,$allOrderObjectSellByUser[$i]->get("bookId"));
              }
            }
            $arryBookAfterFoundInOrder= array();
            for($i=0;$i<count($arrayIdObjectBook);$i++){
             array_push($arryBookAfterFoundInOrder,getBookDetail($arrayIdObjectBook[$i]->getObjectId()));
            }
      
            $numberOfbBookSellByUserNotFinish = count($arayObjectOrderNotFinish);
            return view('user.profile-history-sell',compact('categories','city','paymentInfor','currentUserInfor','bookSoldOfCurrentUser','numberOfBookSoldOfUser','arrayobjectOrderByBookSold','arayObjectOrderNotFinish','arryBookAfterFoundInOrder','numberOfbBookSellByUserNotFinish'));
        }
    }

    public function profileUserHistorySellMore(){
      $categories = getCategories();
      $city = getCity();
      $data = getCurrentUser();
      $currentUser = $data[1];
      $currentUserInfor = $data[2];
      $paymentInfor = paymentInfor($currentUser);
      $bookSoldOfCurrentUser = getBookSoldByUser($currentUserInfor);
      $numberOfBookSoldOfUser = count($bookSoldOfCurrentUser);
      $arrayidobjectBookSold = array();
      for($i =0 ; $i<count($bookSoldOfCurrentUser);$i++){
          array_push($arrayidobjectBookSold,$bookSoldOfCurrentUser[$i]->get("ObjectIdBookSold"));
      }
      $arrayobjectOrderByBookSold = array();
      for($i =0 ; $i<count($arrayidobjectBookSold);$i++){
        $idObjectSoldB =  getOrderByBookSold($arrayidobjectBookSold[$i]);
       for($j = 0; $j<count($idObjectSoldB);$j++){
        $objectOrder = getOrder($idObjectSoldB[$j]->getObjectId());
          array_push($arrayobjectOrderByBookSold,$objectOrder);
       }
      }
      return view('user.profile-history-sell-more',compact('categories','city','paymentInfor','currentUserInfor','bookSoldOfCurrentUser','numberOfBookSoldOfUser','arrayobjectOrderByBookSold'));
    }
    public function profileUserHistorySellNotFinishMore(){
      $categories = getCategories();
      $city = getCity();
      $data = getCurrentUser();
      $currentUser = $data[1];
      $currentUserInfor = $data[2];
      $paymentInfor = paymentInfor($currentUser);
      $arayObjectOrderNotFinish = array();
      $arrayIdObjectBook = array();
      $allOrderObjectSellByUser = getOrderBySellerId($currentUserInfor);
      for($i=0;$i<count($allOrderObjectSellByUser);$i++){
        if($allOrderObjectSellByUser[$i]->get("inprogressOrder")== 0){
          array_push($arayObjectOrderNotFinish,$allOrderObjectSellByUser[$i]);
          array_push($arrayIdObjectBook,$allOrderObjectSellByUser[$i]->get("bookId"));
        }
      }
      $arryBookAfterFoundInOrder= array();
      for($i=0;$i<count($arrayIdObjectBook);$i++){
       array_push($arryBookAfterFoundInOrder,getBookDetail($arrayIdObjectBook[$i]->getObjectId()));
      }

      $numberOfbBookSellByUserNotFinish = count($arayObjectOrderNotFinish);
      return view('user.profile-hsnfmore',compact('categories','city','paymentInfor','currentUserInfor','arayObjectOrderNotFinish','arryBookAfterFoundInOrder','numberOfbBookSellByUserNotFinish'));
    }

    public function profileUserHistoryBuy(){
        
    //    dataLog(getCurrentUser()[2]->userName);
       if (getCurrentUser()[2]->userName == "no"){
        $_SESSION["page"] = "http://localhost:8000/profile/historybuy";
        header("Location: /", true, 301);
        exit();
        }else{
            $categories = getCategories();
            $city = getCity();
            $data = getCurrentUser();
            $currentUser = $data[1];
            $currentUserInfor = $data[2];
            $paymentInfor = paymentInfor($currentUser);

            $arayObjectOrderBuyOfUserNotFinish = array();
            $arrayIdObjectBookBuy = array();
            $allBookBuyOfCurrentUser = getOrderByBuyerId($currentUserInfor);
            for($i=0;$i<count($allBookBuyOfCurrentUser);$i++){
                if($allBookBuyOfCurrentUser[$i]->get("inprogressOrder")== 0){
                array_push($arayObjectOrderBuyOfUserNotFinish,$allBookBuyOfCurrentUser[$i]);
                array_push($arrayIdObjectBookBuy,$allBookBuyOfCurrentUser[$i]->get("bookId"));
                }
            }
            $numberOfBookBuyOfSellerNotFinish = count($arayObjectOrderBuyOfUserNotFinish);

            $arryBookBuyByUserAfterFoundInOrder= array();
            for($i=0;$i<count($arrayIdObjectBookBuy);$i++){
            array_push($arryBookBuyByUserAfterFoundInOrder,getBookDetail($arrayIdObjectBookBuy[$i]->getObjectId()));
            }

            $arayObjectOrderBuyOfUserFinished = array();
            $arrayIdObjectBookBuyFinished = array();
            for($i=0;$i<count($allBookBuyOfCurrentUser);$i++){
                if($allBookBuyOfCurrentUser[$i]->get("shippedOrder")== 1){
                array_push($arayObjectOrderBuyOfUserFinished,$allBookBuyOfCurrentUser[$i]);
                array_push($arrayIdObjectBookBuyFinished,$allBookBuyOfCurrentUser[$i]->get("bookSoldId"));
                }
            }
            $numberOfBookBuyOfSellerFinished = count($arayObjectOrderBuyOfUserFinished);
            $arayObjectBookBuyOfUserFinishedFromBookSold = array();

            for($i=0;$i<count($arrayIdObjectBookBuyFinished);$i++){
                $idSoldBuy= getBookSoldBuyByUser($arrayIdObjectBookBuyFinished[$i]);
            for($j=0;$j<count($idSoldBuy);$j++){
            array_push($arayObjectBookBuyOfUserFinishedFromBookSold,getBookSoldDetail($idSoldBuy[$j]->getObjectId()));
            }
            }
            return view('user.profile-history-buy',compact('categories','city','paymentInfor','currentUserInfor','arayObjectOrderBuyOfUserNotFinish','arryBookBuyByUserAfterFoundInOrder','numberOfBookBuyOfSellerNotFinish','numberOfBookBuyOfSellerFinished','arayObjectOrderBuyOfUserFinished','arayObjectBookBuyOfUserFinishedFromBookSold'));
        }
    }
    public function profileUserHistoryBuyNotFinishMore(){
      $categories = getCategories();
      $city = getCity();
      $data = getCurrentUser();
      $currentUser = $data[1];
      $currentUserInfor = $data[2];
      $paymentInfor = paymentInfor($currentUser);

      $arayObjectOrderBuyOfUserNotFinish = array();
      $arrayIdObjectBookBuy = array();
      $allBookBuyOfCurrentUser = getOrderByBuyerId($currentUserInfor);
      for($i=0;$i<count($allBookBuyOfCurrentUser);$i++){
        if($allBookBuyOfCurrentUser[$i]->get("inprogressOrder")== 0){
          array_push($arayObjectOrderBuyOfUserNotFinish,$allBookBuyOfCurrentUser[$i]);
          array_push($arrayIdObjectBookBuy,$allBookBuyOfCurrentUser[$i]->get("bookId"));
        }
      }
      $numberOfBookBuyOfSellerNotFinish = count($arayObjectOrderBuyOfUserNotFinish);

      $arryBookBuyByUserAfterFoundInOrder= array();
      for($i=0;$i<count($arrayIdObjectBookBuy);$i++){
       array_push($arryBookBuyByUserAfterFoundInOrder,getBookDetail($arrayIdObjectBookBuy[$i]->getObjectId()));
      }

      

      return view('user.profile-history-buy-nfmore',compact('categories','city','paymentInfor','currentUserInfor','arayObjectOrderBuyOfUserNotFinish','arryBookBuyByUserAfterFoundInOrder','numberOfBookBuyOfSellerNotFinish'));
    }

   
    public function profileUserHistoryBuyFinishedMore(){
      $categories = getCategories();
      $city = getCity();
      $data = getCurrentUser();
      $currentUser = $data[1];
      $currentUserInfor = $data[2];
      $paymentInfor = paymentInfor($currentUser);

      $arayObjectOrderBuyOfUserNotFinish = array();
      $arrayIdObjectBookBuy = array();
      $allBookBuyOfCurrentUser = getOrderByBuyerId($currentUserInfor);
      for($i=0;$i<count($allBookBuyOfCurrentUser);$i++){
        if($allBookBuyOfCurrentUser[$i]->get("inprogressOrder")== 0){
          array_push($arayObjectOrderBuyOfUserNotFinish,$allBookBuyOfCurrentUser[$i]);
          array_push($arrayIdObjectBookBuy,$allBookBuyOfCurrentUser[$i]->get("bookId"));
        }
      }
      $numberOfBookBuyOfSellerNotFinish = count($arayObjectOrderBuyOfUserNotFinish);

      $arryBookBuyByUserAfterFoundInOrder= array();
      for($i=0;$i<count($arrayIdObjectBookBuy);$i++){
       array_push($arryBookBuyByUserAfterFoundInOrder,getBookDetail($arrayIdObjectBookBuy[$i]->getObjectId()));
      }

      $arayObjectOrderBuyOfUserFinished = array();
      $arrayIdObjectBookBuyFinished = array();
      for($i=0;$i<count($allBookBuyOfCurrentUser);$i++){
        if($allBookBuyOfCurrentUser[$i]->get("shippedOrder")== 1){
          array_push($arayObjectOrderBuyOfUserFinished,$allBookBuyOfCurrentUser[$i]);
          array_push($arrayIdObjectBookBuyFinished,$allBookBuyOfCurrentUser[$i]->get("bookSoldId"));
        }
      }
      $numberOfBookBuyOfSellerFinished = count($arayObjectOrderBuyOfUserFinished);
      $arayObjectBookBuyOfUserFinishedFromBookSold = array();

      for($i=0;$i<count($arrayIdObjectBookBuyFinished);$i++){
         $idSoldBuy= getBookSoldBuyByUser($arrayIdObjectBookBuyFinished[$i]);
      for($j=0;$j<count($idSoldBuy);$j++){
      array_push($arayObjectBookBuyOfUserFinishedFromBookSold,getBookSoldDetail($idSoldBuy[$j]->getObjectId()));
      }
    }
      return view('user.profile-history-buy-finished-more',compact('categories','city','paymentInfor','currentUserInfor','arayObjectOrderBuyOfUserNotFinish','arryBookBuyByUserAfterFoundInOrder','numberOfBookBuyOfSellerNotFinish','numberOfBookBuyOfSellerFinished','arayObjectOrderBuyOfUserFinished','arayObjectBookBuyOfUserFinishedFromBookSold'));
    }

    public function setRatingAndReview(Request $request){

        $reviewAndRatingObject = new ParseObject("RatingReview");
        $numStar = (int)$request -> numberofstar;
        $reviewAndRatingObject->set("title", $request->textreview);
        $reviewAndRatingObject->set("numberOfStar", $numStar);
        $reviewAndRatingObject->set("UserIdBeFeedBack", $request->idUserBeFeedBack);
        $reviewAndRatingObject->set("UserIdGiveFeedBack", $request->idUserGiveFeedBack);
        try {
          $reviewAndRatingObject->save();
          return "success";
        } catch (ParseException $ex) {
          return "failed";

        }

    }
    public function receivedOrder(Request $request){

        $query = new ParseQuery("Orders");
        $idOrder = $request->orderId;
        $changestatus = (int)$request->receivedOrder;
        try {
          $receivedObject = $query->get($idOrder);
          $receivedObject->set("receivedOrder", $changestatus);
          $receivedObject->save();
          return "success";
        } catch (ParseException $ex) {
           return "failed";

        }

    }
    public function packagedOrder(Request $request){
        $query = new ParseQuery("Orders");
        $idOrder = $request->orderId;
        $changestatus = (int)$request->packagedOrder;
        try {
          $receivedObject = $query->get($idOrder);
          $receivedObject->set("packagedOrder", $changestatus);
          $receivedObject->save();
          return "success";
        } catch (ParseException $ex) {
           return "failed";

        }
    }

    public function inprogressOrder(Request $request){
        $query = new ParseQuery("Orders");
        $idOrder = $request->orderId;
        $changestatus = (int)$request->inprogress;
        try {
          $receivedObject = $query->get($idOrder);
          $receivedObject->set("inprogressOrder", $changestatus);
          $receivedObject->save();
          return "success";
        } catch (ParseException $ex) {
           return "failed";

        }
    }

    public function shippedOrder(Request $request){
        $bookObject = getBookDetail($request->idBoook);
        $bookSoldObject = new ParseObject("BookSold");
        $arrayBook = array();
        $userIdFromBook = $bookObject->get("userId");
        $idCategoryFromBook = $bookObject->get("idCategory");
        for($i=0;$i<count($bookObject->get("images"));$i++){
        array_push($arrayBook,$bookObject->get("images")[$i]);
        }
        $bookSoldObject->set("title", $bookObject->get("title"));
        $bookSoldObject->set("promotionPrice", $bookObject->get("promotionPrice"));
        $bookSoldObject->set("quanlity", $bookObject->get("quanlity"));
        $bookSoldObject->set("userId", $userIdFromBook);
        $bookSoldObject->set("description", $bookObject->get("description"));
        $bookSoldObject->set("idCategory", $idCategoryFromBook);
        $bookSoldObject->set("OriginPrice", $bookObject->get("OriginPrice"));
        $bookSoldObject->set("ObjectIdBookSold", $bookObject->getObjectId());
        $bookSoldObject->setArray("images", $arrayBook);
        
        $query = new ParseQuery("Orders");
        $idOrder = $request->orderId;
        $changestatus = (int)$request->shippedOrder;
        $receivedObject = $query->get($idOrder);
        $receivedObject->set("shippedOrder", $changestatus);
        //delete a book
        $queryDelete = new ParseQuery("Books");
        $bookDeleteObject = $queryDelete->get("$request->idBoook");
        $bookDeleteObject->delete("title");
        $bookDeleteObject->delete("promotionPrice");
        $bookDeleteObject->delete("description");
        $bookDeleteObject->delete("quanlity");
        $bookDeleteObject->delete("userId");
        $bookDeleteObject->delete("images");
        $bookDeleteObject->delete("OriginPrice");
        $bookDeleteObject->delete("idCategory");
        $bookDeleteObject->delete("blocked");

        //add score 
        $queryScore = new ParseQuery("MoneyAccount");
        $orderObject = $query->get($idOrder);
        $data = getCurrentUser();
        $idcurrentUser = $data[1];
        $buyerObject = $orderObject->get("buyerId");
        $idBuyer = $buyerObject->getObjectId();

        $objectSellerFromMoney =$queryScore->equalTo("sellerId", $idcurrentUser)->find();

        for($i=0;$i<count($objectSellerFromMoney);$i++){
          $idMoneyAccountSeller = $objectSellerFromMoney[$i]->getObjectId();
          $scoreSeller = $objectSellerFromMoney[$i]->get("score");
        }
        $scoreAddforSeller = $scoreSeller + 100 ;

        $objectBuyerFromMoney = $queryScore->equalTo("sellerId", $idBuyer)->find();

        for($i=0;$i<count($objectBuyerFromMoney);$i++){
          $idMoneyAccountBuyer = $objectBuyerFromMoney[$i]->getObjectId();
          $scoreBuyer = $objectBuyerFromMoney[$i]->get("score");
        }
        $scoreAddforBuyer = $scoreBuyer + 100;

        $queryScoreAdd = new ParseQuery("MoneyAccount");

        $scoreAddSellerObject = $queryScoreAdd->get($idMoneyAccountSeller);
        $scoreAddSellerObject->set("score", $scoreAddforSeller);

        $scoreAddBuyerObject = $queryScoreAdd->get($idMoneyAccountBuyer);
        $scoreAddBuyerObject->set("score", $scoreAddforBuyer);

        try {
          $scoreAddSellerObject->save();
          $scoreAddBuyerObject->save();
          $receivedObject->save();
          $bookSoldObject->save();
          $bookDeleteObject->save();
          $bookDeleteObject->destroy();
          return "success";
        } catch (ParseException $ex) {
          return "failed";

        }
    }


    public function getDistric(Request $request){
        $city = getCity();
        return $request;
    }

    public function uploadBook(){
        $city = getCity();
        $data = getCurrentUser();
        $currentUser = $data[1];
        $currentUserInfor = $data[2];
        $paymentInfor = paymentInfor($currentUser);
        $categories = getCategories();
        return view('user.upload',compact('categories','city','paymentInfor'));
    }

    public function uploadToServer(Request $request){
        $categoryId = $request -> category;
        $data = getCurrentUser();
        $currentUser = $data[1];

        $newRecord = new ParseObject("Books");

        $categoryClass = new ParseQuery("Categories");
        $categoryObjectId = $categoryClass->get($categoryId);

        $userClass = new ParseQuery("_User");
        $userObjectId = $userClass->get($currentUser);

        $newRecord->set("title", $request -> bookName);
        $newRecord->set("OriginPrice", $request -> bookPrice);
        $newRecord->set("promotionPrice", $request -> bookDiscount);
        $newRecord->set("description", $request -> description);
        $newRecord->set("quanlity", (int)$request -> bookNumber);
        $newRecord->set("idCategory", $categoryObjectId);
        $newRecord->set("userId", $userObjectId);
        $newRecord->setArray("images", $request -> data_images);

        try {
        $newRecord->save();
        echo('success');
        } catch (ParseException $ex) {
        echo('failed');
        }
    }

    public function clientLogin(Request $request){
        $userName = $request-> userName;
        $password = $request-> userPassword;
        $user = new ParseUser();

        $query = ParseUser::query();
        $query->equalTo("username", $userName);
        $user_data = $query->find();

        try {
            $user = ParseUser::logIn($userName, $password);
            $saveSession = saveSession($user_data[0]->getObjectId());
            if(!$saveSession){
                echo('error');
            }else{
                echo('success');
            }

          } catch (ParseException $error) {
            echo('failed');
          }
    }

    public function clientRegister(Request $request){

        $user = new ParseUser();
        $user->set("username", $request-> emailAddress);
        $user->set("password", $request-> password);
        $user->set("email", $request-> emailAddress);
        $user->set("emailAddress", $request-> emailAddress);
        $user->set("phoneNumber", $request-> phone);
        $user->set("yourName", $request-> yourName);
        $user->set("address", $request-> address);

        try {
            $user->signUp();

            $user = ParseUser::logIn($request-> emailAddress, $request-> password);

            $query = ParseUser::query();
            $query->equalTo("username", $request-> emailAddress);

            $user_data = $query->find();

            $myCustomObject = new ParseObject("MoneyAccount");

            $myCustomObject->set("sellerActive", 0);
            $myCustomObject->set("sellerId", $user_data[0]->getObjectId());
            $myCustomObject->set("freeTrial", 0);
            $myCustomObject->set("moneyAccount", 0);
            $myCustomObject->set("score", 0);

            try {
            $myCustomObject->save();
            } catch (ParseException $ex) {
            }

            $saveSession = saveSession($user_data[0]->getObjectId());
            echo('success');

        } catch (ParseException $ex) {
            echo('failed');
        }
    }

    public function getDataForSearch(){
        try{
            $data = getBooks();
            $books = array();
            for ($i = 0; $i < count($data); $i++) {
                array_push($books, array($data[$i]->get('title'),$data[$i]->get('promotionPrice'),$data[$i]->get('images')[0]));
            }
            return array('success',$books);
        }catch(ParseException $ex){
            return array('failed',array(null));
        }
    }

    public function clientAddToCart(Request $request){
        $objectId = $request->data;

        if (!empty($_SESSION['cart'])) {
            for ($i = 1; $i <= count($_SESSION['cart']); $i++) {
                if($_SESSION['cart'][$i-1]["title"] != "brighten"){
                    if($_SESSION['cart'][$i-1]["objectId"] == $objectId){
                        $data = array(
                            "status" => "full",
                            "numberOfItem" => 0,
                        );
                        return $data;
                    }
                }
            } 
        }

        $query = new ParseQuery("Books");
        try {
        $myCustomObject = $query->get($objectId);

        $title = $myCustomObject->get("title");
        $OriginPrice = $myCustomObject->get("OriginPrice");
        $promotionPrice = $myCustomObject->get("promotionPrice");
        $description = $myCustomObject->get("description");
        $quanlity = $myCustomObject->get("quanlity");
        $idCategory = $myCustomObject->get("idCategory");
        $userId = $myCustomObject->get("userId");
        $images = $myCustomObject->get("images");


        $userClass = new ParseQuery("_User");
        $otherData = $userClass->get( $userId->getObjectId());

        $sellerInfor = array(
            "objectId" => $otherData->getObjectId(),
            "yourName" => $otherData->get('yourName'),
            "phoneNumber" => $otherData->get('phoneNumber'),
            "username" => $otherData->get('username'),
            "address" => $otherData->get('address'),
        );

        $item = array(
            "objectId"         => $objectId,
            "title"            => $title,
            "OriginPrice"      => $OriginPrice,
            "promotionPrice"   => $promotionPrice,
            "description"      => $description,
            "quanlity"         => 1,
            "idCategory"       => $idCategory,
            "userId"           => $userId->getObjectId(),
            "images"           => $images,
            "otherData"        => $sellerInfor
        );

        $_SESSION['cart'][] = $item;

        $quanlity = 0;

        for ($i = 1; $i <= count($_SESSION['cart']); $i++) {
            if($_SESSION['cart'][$i-1]["title"] != "brighten"){
                $quanlity += 1;
            }
        } 
        $data = array(
            "status" => "success",
            "numberOfItem" => $quanlity,
        );
        return $data;
        } catch (ParseException $ex) {
            echo('error');
        }
    }



// THIS IS CONTENT FOR ADMINSTRATOR
//             ≧◔◡◔≦

    //DEV Team setup
    public function admin_cunguyen(){
        $city = getCity();
        return view('admin.cunguyen',compact('city'));
    }

    // Send email
    public function send(Request $request){
        Mail::send('admin.email', array('name'=>'HUy','email'=>'customer.care.devteam@gmail.com', 'content'=>'Content'), function($message){
            $mailTo = 'cunguyen.dev@gmail.com';
            $mailViewName = "Customer Care";
            $subject = 'Hello';
	        $message->to($mailTo, $mailViewName)->subject($subject);
        });

        return redirect()->back();
    }

    //Request for login page
    public function adminLogin(){
        return view('admin.login',compact(''));
    }

    // Login to system
    public function loginAuthencation(Request $request){
        $userName = $request-> data_userName;
        $password = $request-> data_password;
        $user = new ParseUser();
        try {
            $user = ParseUser::logIn($userName, $password);
            echo('success');
          } catch (ParseException $error) {
            echo('failed');
          }
    }

    public function getDashboard(){
        return view('admin.dashboard',compact(''));
    }

    public function getCategories(){
        $categories = getCategories();
        return view('admin.categories',compact('categories'));
    }

    public function doUpload(Request $request){
        $file = $request->filesTest;
        $fileGot = array(
            "Name" => $file->getClientOriginalName(),
            "Extension" => $file->getClientOriginalExtension(),
            "ULR Temp" => $file->getRealPath(),
            "Size" => $file->getSize(),
            "Type" => $file->getMimeType()
            );

        $file->move('img/books',$file->getClientOriginalName());
        dataLog($fileGot);


    }

    public function getCartData(){
        if (!empty($_SESSION['cart'])) {
            return $_SESSION['cart'];
        }else{
            return "false";
        }
    }

    public function removeItemInCart(Request $request){
        $itemId = $request -> data;
        $default_data = "brighten";
        $item = array(
            "objectId"         => $default_data,
            "title"            => $default_data,
            "OriginPrice"      => $default_data,
            "promotionPrice"   => $default_data,
            "description"      => $default_data,
            "quanlity"         => $default_data,
            "idCategory"       => $default_data,
            "userId"           => $default_data,
            "images"           => $default_data,
            "otherData"        => $default_data
        );

        try{
            $_SESSION['cart'][$itemId] = $item;

            if (!empty($_SESSION['cart'])) {
                $currentCart = $_SESSION['cart'];
            }

            $quanlity = 0;

            for ($i = 1; $i <= count($_SESSION['cart']); $i++) {
                if($_SESSION['cart'][$i-1]["title"] != "brighten"){
                    $quanlity += 1;
                }
            } 

            $data = array(
                "status" => "success",
                "numberOfItem" => $quanlity,
                "cart_" => $currentCart,
            );
            return $data;
        }catch(Exception $error){
            $quanlity = 0;

            for ($i = 1; $i <= count($_SESSION['cart']); $i++) {
                if($_SESSION['cart'][$i-1]["title"] != "brighten"){
                    $quanlity += 1;
                }
            } 

            $data = array(
                "status" => "failed",
                "numberOfItem" => $quanlity,
                "cart_" => $currentCart,
            );
            return $data;
        }
    }

    public function updateCart(Request $response){
        $typeOfUpdate = $response -> type;
        $index = $response -> index;

        $data = $_SESSION['cart'][$index];

        $objectId = $data["objectId"];
        $title = $data["title"];
        $OriginPrice = $data["OriginPrice"];
        $promotionPrice = $data["promotionPrice"];
        $description = $data["description"];
        $quanlity = $data["quanlity"];
        $idCategory = $data["idCategory"];
        $userId = $data["userId"];
        $images = $data["images"];
        $otherData =  $data["otherData"];
        $status = "";

        $query = new ParseQuery("Books");
        $myCustomObject = $query->get($objectId);
        
        if($typeOfUpdate == "addition"){
            if($quanlity >= $myCustomObject->get("quanlity")){
                $quanlity = $myCustomObject->get("quanlity");
                $status = "stock";
            }else{
                $status = "success";
                $quanlity++ ;
            }
        }else{
            if($quanlity  <= 1){
                $quanlity = 1 ;
                $status = "atlease";
            }else{
                $status = "success";
                $quanlity-- ;
            }
        }

        $item = array(
            "objectId"         => $objectId,
            "title"            => $title,
            "OriginPrice"      => $OriginPrice,
            "promotionPrice"   => $promotionPrice,
            "description"      => $description,
            "quanlity"         => $quanlity,
            "idCategory"       => $idCategory,
            "userId"           => $userId,
            "images"           => $images,
            "otherData"        => $otherData
        );
        try{
            $_SESSION['cart'][$index] = $item;
            $currentCart = $_SESSION['cart'];
            $quan = 0;

            for ($i = 1; $i <= count($_SESSION['cart']); $i++) {
                if($_SESSION['cart'][$i-1]["title"] != "brighten"){
                    $quan += 1;
                }
            } 
            $data = array(
                "status" => $status,
                "numberOfItem" => $quan,
                "cart_" => $currentCart,
            );
            return $data;
        }catch(Exception $error){
            $currentCart = $_SESSION['cart'];
            $quan = 0;

            for ($i = 1; $i <= count($_SESSION['cart']); $i++) {
                if($_SESSION['cart'][$i-1]["title"] != "brighten"){
                    $quan += 1;
                }
            } 
            $status = "failed";
            $data = array(
                "status" => $status,
                "numberOfItem" => $quan,
                "cart_" => $currentCart,
            );
            return $data;
        }
    }

    public function getCartDataForCheckoutPage(){
        $data_ = getCurrentUser();
        $h = $data_[2];
        $id = $data_[1];
        $c = $h->userName;

        if ($c == "no"){
            $data = array([
                "status" => "failed", 
            ]);
        }else{
            $data = array([
                "status" => "success", 
                "objectId" => $data_[2]->getObjectId(), 
                "yourName" => $data_[2]->get('yourName'), 
                "username" => $data_[2]->get('username'), 
                "phoneNumber" => $data_[2]->get('phoneNumber'), 
                "emailAddress" => $data_[2]->get('emailAddress'),
                "addressFull" =>  $data_[2]->get('address'),
                "address" => $address = explode ( "," ,  $data_[2]->get('address') ),
            ]);
        }
        return $data;
    }

    public function orderSubmit(Request $data){
        $name = $data->data[0];
        $address = $data->data[1];
        $addressStreet = $data->data[2];
        $addressDetail = $data->data[3];
        $email = $data->data[4];
        $phone = $data->data[5];
        $note = $data->data[6];

        $status = "";


        $data_ = getCurrentUser();
        $h = $data_[2];
        $id = $data_[1];
        $c = $h->userName;

        if ($c == "no"){
            //Not login
            $user = new ParseUser();
            $user->set("username", $email);
            $user->set("password", "abcd@1234");
            $user->set("email", $email);
            $user->set("emailAddress", $email);
            $user->set("phoneNumber", $phone);
            $user->set("yourName", $name);
            $user->set("address", $address);

            $contentS = mailForSeller();
            $content = mailForBuy();
    
            try {
                $user->signUp();
                $user->getObjectId();

                $query = ParseUser::query();
                $query->equalTo("username", $email);
                $buyerID = $query->find()[0];

                for ($i = 1; $i <= count($_SESSION['cart']); $i++) {
                    if($_SESSION['cart'][$i-1]["title"] != "brighten"){
                        
                        $price = ($_SESSION['cart'][$i-1]["promotionPrice"]) * ($_SESSION['cart'][$i-1]["quanlity"]);

                        $otherInformation = array($name, $address, $addressStreet, $addressDetail, $note);
                        // 1. Name -> Who will recever the product. Ex: Cherry Smith
                        // 2. Address -> The address buyer can recever product. Ex: 440 N Wolfe Rd, Sunnyvale, CA 94085, USA
                        // 3. Street's name -> Ex: Taiwan road
                        // 4. Address detail -> Ex: Before ABC company, Taiwan road, 440 N Wolfe Rd, Sunnyvale, CA 94085, USA
                        // 5. Note for shipper -> Ex: My house is green, when you come there please call me

                        $queryBook = new ParseQuery("Books");
                        $bookId = $queryBook->get($_SESSION['cart'][$i-1]["objectId"]);

                        $query = ParseUser::query();
                        $query->equalTo("objectId", $_SESSION['cart'][$i-1]["userId"]);

                        $users = $query->find()[0];

                        $addOrderObject = new ParseObject("Orders");

                        $addOrderObject->set("bookId", $bookId);
                        $addOrderObject->set("shippedOrder", 0);
                        $addOrderObject->set("sellerId", $users);
                        $addOrderObject->set("totalPrice", $price);
                        $addOrderObject->set("receivedOrder", 0);
                        $addOrderObject->set("inprogressOrder", 0);
                        $addOrderObject->set("buyerId", $buyerID);
                        $addOrderObject->set("quanlity", $_SESSION['cart'][$i-1]["quanlity"]);
                        $addOrderObject->set("packagedOrder", 0);
                        $addOrderObject->set("bookSoldId", $_SESSION['cart'][$i-1]["objectId"]);
                        $addOrderObject->setArray("otherInformation", $otherInformation);

                        try {
                            $addOrderObject->save();
                            unset($_SESSION['cart']);
                            $default_data = "brighten";
                            $item = array(
                                "objectId"         => $default_data,
                                "title"            => $default_data,
                                "OriginPrice"      => $default_data,
                                "promotionPrice"   => $default_data,
                                "description"      => $default_data,
                                "quanlity"         => $default_data,
                                "idCategory"       => $default_data,
                                "userId"           => $default_data,
                                "images"           => $default_data,
                                "otherData"        => $default_data
                            );
                    
                            $_SESSION['cart'][] = $item;
                            $timeNow=time();
                            sendMail("Order Successfully [".date("d/m/Y, h:m:s a", time())."]", $content, "",  $email , $emailCC = '');
                            sendMail("You have a new order [".date("d/m/Y, h:m:s a", time())."]", $contentS, "",  $query->find()[0]->get('emailAddress') , $emailCC = '');
                            
                            $status = "success";
                        } catch (ParseException $ex) {
                            $status = "failed";
                        }
                    }
                } 

                return $status;
               
            } catch (ParseException $ex) {
                $status = "exist";
            }
            return $status;
        }else{
            $queryForCurrentUser = ParseUser::query();
            $queryForCurrentUser->equalTo("objectId", $id);

            $buyerID = $queryForCurrentUser->find()[0];
            $contentS = mailForSeller();
            $content = mailForBuy();

            for ($i = 1; $i <= count($_SESSION['cart']); $i++) {
                if($_SESSION['cart'][$i-1]["title"] != "brighten"){
                    
                    $price = ($_SESSION['cart'][$i-1]["promotionPrice"]) * ($_SESSION['cart'][$i-1]["quanlity"]);

                    $otherInformation = array($name, $address, $addressStreet, $addressDetail, $note);
                    // 1. Name -> Who will recever the product. Ex: Cherry Smith
                    // 2. Address -> The address buyer can recever product. Ex: 440 N Wolfe Rd, Sunnyvale, CA 94085, USA
                    // 3. Street's name -> Ex: Taiwan road
                    // 4. Address detail -> Ex: Before ABC company, Taiwan road, 440 N Wolfe Rd, Sunnyvale, CA 94085, USA
                    // 5. Note for shipper -> Ex: My house is green, when you come there please call me

                    $queryBook = new ParseQuery("Books");
                    $bookId = $queryBook->get($_SESSION['cart'][$i-1]["objectId"]);

                    $query = ParseUser::query();
                    $query->equalTo("objectId", $_SESSION['cart'][$i-1]["userId"]);

                    $users = $query->find()[0];

                    $addOrderObject = new ParseObject("Orders");

                    $addOrderObject->set("bookId", $bookId);
                    $addOrderObject->set("shippedOrder", 0);
                    $addOrderObject->set("sellerId", $users);
                    $addOrderObject->set("totalPrice", $price);
                    $addOrderObject->set("receivedOrder", 0);
                    $addOrderObject->set("inprogressOrder", 0);
                    $addOrderObject->set("buyerId", $buyerID);
                    $addOrderObject->set("quanlity", $_SESSION['cart'][$i-1]["quanlity"]);
                    $addOrderObject->set("packagedOrder", 0);
                    $addOrderObject->set("bookSoldId", $_SESSION['cart'][$i-1]["objectId"]);
                    $addOrderObject->setArray("otherInformation", $otherInformation);

                    try {
                        $addOrderObject->save();
                        unset($_SESSION['cart']);
                            $default_data = "brighten";
                            $item = array(
                                "objectId"         => $default_data,
                                "title"            => $default_data,
                                "OriginPrice"      => $default_data,
                                "promotionPrice"   => $default_data,
                                "description"      => $default_data,
                                "quanlity"         => $default_data,
                                "idCategory"       => $default_data,
                                "userId"           => $default_data,
                                "images"           => $default_data,
                                "otherData"        => $default_data
                            );
                    
                        $_SESSION['cart'][] = $item;
                        $timeNow=time();
                        sendMail("Order Successfully [".date("d/m/Y, h:m:s a", time())."]", $content, "",  $email , $emailCC = '');
                        sendMail("You have a new order [".date("d/m/Y, h:m:s a", time())."]", $contentS, "",  $query->find()[0]->get('emailAddress') , $emailCC = '');
                        $status = "success";
                    } catch (ParseException $ex) {
                        $status = "failed";
                    }
                }
            } 
            return $status;
        }
    }

    public function resetPassword(Request $data){
        try{
            ParseUser::requestVerificationEmail($data->forgotEmailReset);
            return "success";
        }catch(ParseException $ex){
            return "failed";
        }
    }

    // THIS IS CONTENT FOR API
    //             ≧◔◡◔≦


    public function getLocation(){
        $location = getTreeLocation();
        return $location;
    }

    public function getProvince($province_code){
        $location = getTreeLocation();
        return $location[$province_code];
    }

    public function getDistricData($province_code, $distric_code){
        $location = getTreeLocation();
        $hi = $location[$province_code];
        $c = $hi['quan_huyen'];
        $f = $c[$distric_code];
        $u = $f['xa-phuong'];
        return $u;
    }

    public function getLocationDistric(){
        $location = getMinLocation();
        return $location;
    }

    public function getClass($classes){
        $data = selectData($classes);
        dataLog($data);
        echo('[DEV Team] Open console panel to check your data...');
    }

    public function hi( ){
        setcookie('dev_', "http://google.com");
        if(!isset($_COOKIE['dev_'])) {
            echo "Cookie is not set!";
        } else {
           dataLog($_COOKIE['dev_']);
           dataLog($_SERVER['REQUEST_URI']);
        }
    }

    public function cunguyenTest($type, Request $request){
        if ($type == "1"){
            $_SESSION["_token"] = "null";

        }elseif ($type == "2"){
            if(getCurrentUser() == 1){
                echo('DDang login');
            }else{
                echo('Logpout');
            }
        }elseif ($type == "3"){
            $value = $request->session()->get('language-web');
            echo($value);
        }elseif ($type == "4"){
            $objectId = "8cAhtrVrfY";
            $query = new ParseQuery("Books");
            try {
            $myCustomObject = $query->get($objectId);
    
            $title = $myCustomObject->get("title");
            $OriginPrice = $myCustomObject->get("OriginPrice");
            $promotionPrice = $myCustomObject->get("promotionPrice");
            $description = $myCustomObject->get("description");
            $quanlity = $myCustomObject->get("quanlity");
            $idCategory = $myCustomObject->get("idCategory");
            $userId = $myCustomObject->get("userId");
            $images = $myCustomObject->get("images");

            
            
    
            $item = array(
                "objectId"         => $objectId,
                "title"            => $title,
                "OriginPrice"      => $OriginPrice,
                "promotionPrice"   => $promotionPrice,
                "description"      => $description,
                "quanlity"         => $quanlity,
                "idCategory"       => $idCategory,
                "userId"           => $userId,
                "images"           => $images
            );

            $_SESSION['cart'][] = $item;
            $a = $item['idCategory'];
            
            dataLog($a->getObjectId());

            dataLog($_SESSION['cart']);


            } catch (ParseException $ex) {
                echo('error');
            }
        }elseif ($type == "5"){
           
        }elseif ($type == "6"){
            dataLog($_SESSION['cart']);
            dataLog(count($_SESSION['cart']));
        }elseif ($type == "7"){
            unset($_SESSION['cart']);
        }elseif ($type == "8"){
            Mail::send('admin.email', array('name'=>'HUy','email'=>'customer.care.devteam@gmail.com', 'content'=>'Content'), function($message){
                $mailTo = 'cunguyen.dev@gmail.com';
                $mailViewName = "Customer Care";
                $subject = 'Hello';
                $message->to($mailTo, $mailViewName)->subject($subject);
            });
        }elseif ($type == "11"){
            $data = getCurrentUser();
            $c = $data[2]->getEmail();
            var_dump($c); die();
            
        }elseif ($type == "9"){
            try {
                ParseClient::initialize( "app", "fc89a3ff-dbf9-e706-470c-47433d9b8d6b", "master" );
                ParseClient::setServerURL('http://localhost:1337/pars', '/');
                return "hihi";
            }catch(ParseException $ex){
                return $ex;
            }

            $query = new ParseQuery("Demo");
            try {
            $myCustomObject = $query->get("8socnCysMO");
            
            $Name = $myCustomObject->get("Name");
            return $Name;
            } catch (ParseException $ex) {
                return $ex;
            }
        }elseif($type == "10"){
            $data = getCurrentUser();
            dataLog($data[0]);
        }
    }

    function clientLogout(){
        removeToken();
        return redirect('/');
    }
}


