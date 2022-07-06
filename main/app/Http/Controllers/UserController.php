<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Item;
use App\Models\Catalogue;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\Commisssion;
use Illuminate\Support\Facades\DB;
use Hash;
use DateTime;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function viewRegistration(){
        return view('register');
    }
    function createUser(Request $req){
        $req->input();
        $req->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password0'=>'required | min:8 | max:14 | same:password',
            'password'=>'required | min:8 | max:14',
            'user_type'=>'required',
            'telephone_no'=>'required|unique:users| min:10 | max:10',
            'address'=>'required',
            'bank_account_no'=>'required|unique:users| min:8 | max:8'
           
        ]);
        $user=new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->user_type=$req->user_type;
        $user->telephone_no=$req->telephone_no;
        $user->address=$req->address;
        $user->bank_account_no=$req->bank_account_no;
        $reg=$user->save();

        if($reg){
           return back()->with('success','You have registered successfully');
        }else{
            return back()->with('fail','Something wrong');
        }
    }
    function viewItemsModel(){
        $userData=array();
        $itemData=array();
        if(session()->has('loginID')){
            $userData=User::where('id','=',session()->get('loginID'))->first();
            $itemData=Item::where('user_id','=',$userData->id)->Where('isArchieved','=','no')->Where('item_status','=','pending')->first();
            $data=DB::table('items')
            ->where('user_id',$userData->id)->Where('isArchieved','=','no')->Where('item_status','=','pending')
            ->get();
        }
       
        return view('itemsModelSeller',['itemData'=>$itemData,'data'=>$data]);
    }
    function viewVerifiedItemsModel(){
        if(session()->has('loginID')){
            $data=Item::where('user_id','=',session()->get('loginID'))->Where('item_status','=','verified')->get();
            
        }
       
        return view('verifiedItemsModelSeller',['data'=>$data]);
    }
    function viewPendingItemsModel(){
        if(session()->has('loginID')){
            $data=Item::where('user_id','=',session()->get('loginID'))->Where('item_status','=','pending-sales')->get();
            
        }
       
        return view('pendingItemsModelSeller',['data'=>$data]);
    }
    function viewSoldItemsModel(){
        if(session()->has('loginID')){
          $soldprices=[];
            $data=Item::where('user_id','=',session()->get('loginID'))->Where('item_status','=','sold')->get();
            foreach($data as $item){
                $soldprices[]=Bid::find($item->bid_id);
            }
           
        }
       
        return view('soldItemsModelSeller',['data'=>$data,'soldprices'=>$soldprices]);
    }
    function viewAuctionCatalogues(){
        $now = new DateTime();
        $date1 =$now->format('Y-m-d');
        $date =$now->modify('+1 day');
        $date2=$date->format('Y-m-d');
       
       
        $data='No happening auctions sorry';
        $isauctions=Auction::where('auction_status','=','on')->orWhere('auction_status','=','upcoming')->first();
        $auctions=Auction::where('auction_status','=','on')->orWhere('auction_status','=','upcoming')->get();
        
       
       
            return view('auctionCatalogues',['data'=>$data,'auctions'=>$auctions,'isauctions'=>$isauctions,'date1'=>$date1,'date2'=>$date2]);
       
      
    }function viewYourItems(){
        $data=array();
        $amountspends=[];
       
            $data=Item::where('buyer_id','=',session()->get('loginID'))->get();
            foreach($data as $item){
                $amountspends[]=Bid::find($item->bid_id);
               
            }
           
       
        return view('yourItems',['data'=>$data,'amountspends'=>$amountspends]);
    }
   
    function choose(){
        return view('choose');
    }
    function createItem(Request $req){
        // return $req->input();
        $category_name=$req->category_name;
         return view('createItem',['category_name'=>$category_name]);
    }
        function registerItem(Request $req){
          
        $num=10000000;
        $items=Item::all();
        $itemCount=$items->count();
      if($itemCount>0){
        $lot= Item::all()->last()->lot_reference_number;
        $num=$lot+1;
      }
      else{
       $num=10000000;
      }

        $item=new Item;
        $item->user_id=session()->get('loginID');
        $item->lot_reference_number=$num;
        $item->category_name=$req->category_name;
        $username=User::find(session()->get('loginID'));
        $item->user_name=$username->name;
        $item->item_name=$req->item_name;
        $item->item_status='pending';
        $item->isArchieved='no';
        $item->artist_name=$req->artist_name;
        $item->year_of_production=$req->year_of_production;
        $item->subject_classification=$req->subject_classification;
        $item->description=$req->description;
        $item->start_price=$req->start_price;
        $item->frame_status=$req->frame_status;
        if($req->category_name=='Drawings' || $req->category_name=='Paintings' || $req->category_name=='Photographic Images')
        {
            $item->dimension=$req->height.'cm X'.$req->length.'cm';
        }else{
            $item->dimension=$req->height.'cm X'.$req->length.'cm X'.$req->width.'cm';
        }
       
        $item->medium=$req->medium;
        $item->image_type=$req->image_type;
        $item->material_used=$req->material_used;
        $item->weight=$req->weight;
        if($req->hasfile('picture')){
            $file=$req->file('picture');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('images/', $filename);
            $item->picture=$filename;
        }
        $item->save();
         return redirect('itemsModelSeller');
    }
    function deleteItem($id){
        $item=Item::find($id);
        $item->delete();
        return redirect('itemsModelSeller');
    }
    function deletePendingItem($id){
        $item=Item::find($id);
        $commission=new Commisssion;
        $commission->commission_amount=(5/100)*$item->start_price;
        $commission->catalogue_id=$item->catalogue_id;
        $commission->save();
        $item->delete();
        return redirect('pendingItemsModelSeller');
    }
    function viewEditItem($id){
        $item=Item::find($id);
        return view('itemEditForm',['item'=>$item]);
    }
    function editItem(Request $req){
        $req->validate([
           'picture'=>'required'
        ]);
        $item=Item::find($req->id);
        $item->category_name=$req->category_name;
        $item->item_name=$req->item_name;
        $item->artist_name=$req->artist_name;
        $item->year_of_production=$req->year_of_production;
        $item->description=$req->description;
        $item->start_price=$req->start_price;
        $item->subject_classification=$req->subject_classification;
        $item->frame_status=$req->frame_status;
        $item->dimension=$req->dimension;
        $item->medium=$req->medium;
        $item->image_type=$req->image_type;
        $item->material_used=$req->material_used;
        $item->weight=$req->weight;
        if($req->hasfile('picture')){
            $file=$req->file('picture');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('images/', $filename);
            $item->picture=$filename;
        }
        $item->save();
         return redirect('itemsModelSeller');
    }
    function archieveItem($id){
        $item=Item::find($id);
        $item->isArchieved='yes';
        $item->save();
        return redirect('itemsModelSeller');
    }
    function viewArchievedItems(){
        $userData=array();
        $itemData=array();
        if(session()->has('loginID')){
            $userData=User::where('id','=',session()->get('loginID'))->first();
            $itemData=Item::where('user_id','=',$userData->id)->Where('isArchieved','=','yes')->first();
            $data=DB::table('items')
            ->where('user_id',$userData->id)->Where('isArchieved','=','yes')
            ->get();
        }
       
        return view('archievedItems',['itemData'=>$itemData,'data'=>$data]);
    }
    function unarchieveItem($id){
        $item=Item::find($id);
        $item->isArchieved='no';
        $item->save();
        return redirect('archievedItems');
    }
    function showCataloguedItemsModel(){
        $userData=array();
        $itemData=array();
        if(session()->has('loginID')){
            $userData=User::where('id','=',session()->get('loginID'))->first();
            $itemData=Item::where('user_id','=',$userData->id)->Where('item_status','LIKE','catalogued%')->first();
            $data=DB::table('items')
            ->where('user_id',$userData->id)->Where('isArchieved','=','no')->Where('item_status','LIKE','catalogued%')
            ->get();
        }
       
        
        return view('cataloguedItemsModelSeller',['itemData'=>$itemData,'data'=>$data]);
    }
    function showSoldItemsModel(){
        $userData=array();
        $itemData=array();
      
        if(session()->has('loginID')){
            $userData=User::where('id','=',session()->get('loginID'))->first();
            $itemData=Item::where('user_id','=',$userData->id)->Where('isArchieved','=','no')->Where('item_status','=','sold')->first();
            $data=DB::table('items')
            ->where('user_id',$userData->id)->Where('isArchieved','=','no')->Where('item_status','=','sold')
            ->get();
           
        }
       
        
        return view('soldItemsModelSeller',['itemData'=>$itemData,'data'=>$data,'commission'=>$commission]);
    }
    function viewOngoingCatalogue($auctionid){
        $auction=Auction::find($auctionid);
        $catalogues=Catalogue::where('auction_id','=',$auctionid)->get();
        $items=array();
        foreach($catalogues as $catalogue){
            $items=Item::where('catalogue_id','=',$catalogue->id)->where('item_status','=','pending-sales')->get();
         
           
        }
        return view('ongoingItemsCatalogueForCustomer',['items'=>$items,'auctionid'=>$auctionid,'auction'=>$auction]);
      }
      function viewSoldItemsForCustomer($auctionid){
        $catalogues=Catalogue::where('auction_id','=',$auctionid)->get();
        $items=array();
        foreach($catalogues as $catalogue){
            $items=Item::where('catalogue_id','=',$catalogue->id)->where('item_status','=','sold')->get();
         
           
        }
        return view('soldItemsForCustomer',['items'=>$items,'auctionid'=>$auctionid]);
      }
      function putbid($id){
          
        if(session()->has('loginID')){
            $bids=Bid::where('buyer_id','=',session()->get('loginID'))->Where('item_id','=',$id)->first();
            
        return view('PutBid',['id'=>$id,'bids'=>$bids]);
    }
    
      }
      function bid(Request $req,$id){
          $req->validate([
             'bid_amount'=>'required'
          ]);
        $bid=new Bid;
        $bid->bid_amount=$req->bid_amount;
        $bid->item_id=$id;
        $bid->buyer_id=session()->get('loginID');
        $bid->save();
        return redirect('putbid/'.$id);
      }

      function viewProfile(){
          
        if(session()->has('loginID')){
           $user=User::find(session()->get('loginID'));

    }
    return view('profile',['user'=>$user]);
      }
      function viewYourProfile(){
          
        if(session()->has('loginID')){
           $user=User::find(session()->get('loginID'));

    }
    return view('yourprofile',['user'=>$user]);
      }
      function profiles(){
          
        
           

   $users=User::all();
   $sales=[];
   $boughts=[];
   foreach($users as $user){
   
       if($user->user_type=='Seller'){
        $items=Item::where('user_id','=',$user->id)->where('item_status','=','sold')->get();
        $sales[]=$items->count();
       
       }
       else if($user->user_type=='Buyer'){
        $items=Item::where('buyer_id','=',$user->id)->get();
        $boughts[]=$items->count();
       }
   }
// var_dump($sales);
//   var_dump($boughts);
    return view('profiles',['users'=>$users,'sales'=>$sales,'boughts'=>$boughts]);
      }
      function allitems(Request $req){ 
        $search=$req['auction_date'] ?? "";
        $search1=$req['item_name'] ?? "";
        $search2=$req['category_name'] ?? "";
        $search3=$req['search'] ?? "";
        if($search != ""){
           
              $auction=Auction::where('auction_date','=',$search)->first();
             $catalogue=Catalogue::where('auction_id','=',$auction->id)->first();
           $items=Item::where('catalogue_id','=',$catalogue->id)->where('item_status','=','pending-sales')->get();
        }else if($search1 != "" & $search2 != ""){
            $items=Item::where('item_name','LIKE',"$search1%")->where('category_name','LIKE',"$search2%")->where('item_status','=','pending-sales')->get();
       }
       else if($search3 != ""){
        $items=Item::where('item_name','LIKE',"$search3%")->orWhere('artist_name','LIKE',"$search3%")->orWhere('category_name','LIKE',"$search3%")->orWhere('start_price','LIKE',"$search3%")->orWhere('subject_classification','LIKE',"$search3%")->where('item_status','=','pending-sales')->get();
     
      }   else{
           
            $items=Item::where('item_status','=','pending-sales')->get();
        }
        
          return view('allItems',['items'=>$items,'search'=>$search,'search1'=>$search1,'search2'=>$search2,'search3'=>$search3]);
      }
      function allitemsSeller(Request $req){ 
        $search=$req['auction_date'] ?? "";
        $search1=$req['item_name'] ?? "";
        $search2=$req['category_name'] ?? "";
        $search3=$req['search'] ?? "";
        if($search != ""){
           
              $auction=Auction::where('auction_date','=',$search)->first();
             $catalogue=Catalogue::where('auction_id','=',$auction->id)->first();
           $items=Item::where('catalogue_id','=',$catalogue->id)->where('item_status','!=','sold')->where('user_id','=',session()->get('loginID'))->get();
        }else if($search1 != "" & $search2 != ""){
            $items=Item::where('item_name','LIKE',"$search1%")->where('category_name','LIKE',"$search2%")->where('item_status','!=','sold')->where('user_id','=',session()->get('loginID'))->get();
       }
       else if($search3 != ""){
        $items=Item::where('item_status','!=','sold')->where('user_id','=',session()->get('loginID'))->where('subject_classification','LIKE',"$search3%")->get();
      } 
         else{
           
            $items=Item::where('item_status','!=','sold')->where('user_id','=',session()->get('loginID'))->get();
        }
        
          return view('allItemsSeller',['items'=>$items,'search'=>$search,'search1'=>$search1,'search2'=>$search2,'search3'=>$search3]);
      }
}
