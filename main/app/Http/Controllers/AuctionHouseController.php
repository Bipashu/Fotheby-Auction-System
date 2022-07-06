<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

use App\Models\Auction;
use App\Models\Catalogue;
use App\Models\Bid;
use App\Models\Commisssion;
use Hash;
use DateTime;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PDF;
class AuctionHouseController extends Controller
{
    function homeView(){
        $now = new DateTime();
        $date1 =$now->format('Y-m-d');
        $date=$now->modify('+1 day');
        $date2=$date->format('Y-m-d');
       
        $auctions=Auction::all();
        if($auctions){
            foreach($auctions as $auction){
                if($auction->auction_date==$date2){
                    $auction->auction_status='upcoming';
                    $auction->save();
                }
                else if($auction->auction_date==$date1){
                    $auction->auction_status='on';
                    $auction->save();
                }
                else{
                    $auction->auction_status='off';
                    $auction->save();
                }
            }
        }
       
        $items=Item::where('item_status','=','pending')->get();
       
        return view('home',['items'=>$items]);
    }
    function loginView(){
        return view('login');
    }
    function login(Request $req){

        $req->validate([
            'emailaddress'=>'required',
            'password'=>'required | min:8 | max:14',
           
        ]);
        $user=User::where('email','=',$req->emailaddress)->first();
        if($req->emailaddress=='admin@admin.com' && $req->password=='admin112233'){
            return redirect('itemsModel');
        }
        else if($user){
            if(Hash::check($req->password,$user->password)){
                
                 if($user->user_type=='Seller'){
                    $req->session()->put('loginID',$user->id);
                    return redirect('itemsModelSeller');
                }
                else if($user->user_type=='Buyer'){
                    $req->session()->put('loginID',$user->id);
                    return redirect('auctionCatalogues');
                }
            }else{
                return back()->with('fail','Password do not match.');
            }
        }
        else{
            return back()->with('fail','Password do not match.');
        }
    }
    function viewItemsModel(Request $req){
        $search=$req['search'] ?? "";
        if($search != ""){
           $data=DB::table('items')->where('isArchieved','=','no')->Where('item_status','=','pending')->first();
           $allItems=Item::where('isArchieved','=','no')->Where('item_status','=','pending')->where('item_name','LIKE',"$search%")->orWhere('artist_name','LIKE',"$search%")->get();
        }else{
            $data=DB::table('items')->where('isArchieved','=','no')->Where('item_status','=','pending')->first();
            $allItems=Item::where('isArchieved','=','no')->Where('item_status','=','pending')->get();
        }
        return view('itemsModel',['items'=>$allItems,'data'=>$data,'search'=>$search]);
    }
    function viewAuctionsModel(){
        $now = new DateTime();
        $date1 =$now->format('Y-m-d');
        $date=$now->modify('+1 day');
        $date2=$date->format('Y-m-d');
       
        $auctions=Auction::all();
        if($auctions){
            foreach($auctions as $auction){
                if($auction->auction_date==$date2){
                    $auction->auction_status='upcoming';
                    $auction->save();
                }
                else if($auction->auction_date==$date1){
                    $auction->auction_status='on';
                    $auction->save();
                }
                else{
                    $auction->auction_status='off';
                    $auction->save();
                }
            }
        }
        $auctions=Auction::where('isArchieved','=','no')->get();
        $data=DB::table('auctions')->where('isArchieved','=','no')->first();
        return view('auctionsModel',['auctions'=>$auctions,'data'=>$data,'date1'=>$date1,'date2'=>$date2]);
    }
    function viewVerifiedItemsModel(){
        return  view('verifiedItemsModel');
    }
    function showItemDetails($id){
        $aItem=Item::find($id);
        return view('itemdetails',['item'=>$aItem]);
    }
    function showItemDetailsForCustomer($id){
        $aItem=Item::find($id);
        return view('itemdetailsForCustomer',['item'=>$aItem]);
    }
    function showItemDetailsForSeller($id){
        $aItem=Item::find($id);
        return view('itemdetailsForSeller',['item'=>$aItem]);
    }
    function showVerifiedItems(){
        $verifiedItems=Item::where('item_status','=','verified')->first();
        $items=Item::where('item_status','=','verified')->get();
        return view('verifiedItemsModel',['verifiedItems'=>$verifiedItems,'items'=>$items]);
    }
    function verifyItem($id){
        $item=Item::find($id);
        if($item){
            $item->item_status='verified';
            $item->save();
        }
        return redirect('itemsModel');
    }
    function denyItem($id){
        $item=Item::find($id);
        if($item){
            $item->item_status='denied';
            $item->save();
        }
        return redirect('itemsModel');
    }
    function viewCreateAuction(){
        return view('createAuction');
    }
    function createAuction(Request $req){
        $now = new DateTime();
        $date1 =$now->format('Y-m-d');
        $date =$now->modify('+1 day');
        $date2=$date->format('Y-m-d');
      
        $req->validate([
            'auction_title'=>'required',
           
            'auction_date'=>'required|unique:auctions',
           
        ]);
        $auction=new Auction;
        $auction->auction_title=$req->auction_title;
        $auction->isArchieved='no';
        $auction->has_catalogue='no';
    
        $auction->auction_date=$req->auction_date;
        if($req->auction_date==$date1){
            $auction->auction_status='on';
        }
        else if($req->auction_date==$date2){
            $auction->auction_status='upcoming';
        }
        else{
            $auction->auction_status='off';
        }
        
        $reg=$auction->save();

        if($reg){
           return back()->with('success','You have registered successfully');
        }else{
            return back()->with('fail','Something wrong');
        }
    }
    function viewCataloguesModel(){
        
        $catalogues=Catalogue::where('isArchieved','=','no')->where('auction_id','=',NULL)->get();
        $data=DB::table('catalogues')->where('isArchieved','=','no')->where('auction_id','=',NULL)->first();
        return view('cataloguesModel',['catalogues'=>$catalogues,'data'=>$data]);
    }
    function viewCreateCatalogue(){
        return view('createCatalogue');
    }
    function createCatalogue(Request $req){
        $req->validate([
            'catalogue_title'=>'required',
           'lot_number'=>'required|unique:catalogues|min:2|max:2'
           
        ]);
        $catalogue=new Catalogue();
        $catalogue->catalogue_title=$req->catalogue_title;
        $catalogue->lot_number=$req->lot_number;
        $catalogue->isArchieved='no';
        $catalogue->save();
        return redirect('cataloguesModel');
    }
    function archieveCatalogue($id){
        $catalogue=Catalogue::find($id);
        $catalogue->isArchieved='yes';
        $catalogue->save();
        return redirect('cataloguesModel');
    }
    function viewArchievedCatalogues(){
        $catalogues=Catalogue::where('isArchieved','=','yes')->get();
       
        return view('archievedCatalogues',['catalogues'=>$catalogues]);
    }
    function unarchieveCatalogue($id){
        $catalogue=Catalogue::find($id);
        $catalogue->isArchieved='no';
        $catalogue->save();
        return redirect('archievedCatalogues ');
    }
    function deleteCatalogue($id){
        $catalogue=Catalogue::find($id);
        $items=Item::where('catalogue_id','=',$id)->get();
        foreach($items as $item){
            $item->catalogue_id=NULL;
            $item->item_status='verified';
            $item->save();
        }
        $catalogue->delete();
        return redirect('cataloguesModel');
    }
    function showCatalogueDetails($id){
        $aCatalogue=Catalogue::find($id);
        $items=Item::where('catalogue_id','=',$id)->where('item_status','=','catalogued')->get();
        return view('cataloguedetails',['catalogue'=>$aCatalogue,'items'=>$items]);
    }
    function viewEditCatalogue($id){
        $catalogue=Catalogue::find($id);
        return view('catalogueEditForm',['catalogue'=>$catalogue]);
    }
    function editCatalogue(Request $req){
        $req->validate([
           'catalogue_title'=>'required',
          
        ]);
        $catalogue=Catalogue::find($req->id);
        $catalogue->catalogue_title=$req->catalogue_title;
       
        $catalogue->save();
         return redirect('cataloguesModel');
    }
    function viewAddItems($id){
        
        $items=Item::where('item_status','=','verified')->get();
        $catalogue_id=$id;
        return view('addItems',['items'=>$items,'catalogue_id'=>$catalogue_id]);
    }
    function addItem($catalogueId,$itemId){
        $item=Item::find($itemId);
        $item->catalogue_id=$catalogueId;
        $item->item_status='catalogued';
        $item->save();
        return redirect('addItems/'.$catalogueId );
    }
    function viewCatalogue($id,Request $req){
        $search=$req['search'] ?? "";
        if($search != ""){
        $catalogue=Catalogue::find($id);
        $items=Item::where('catalogue_id','=',$id)->where('item_status','=','catalogued')->where('item_name','LIKE',"$search%")->get();
        $isitems=Item::where('catalogue_id','=',$id)->where('item_status','=','catalogued')->first();
        }else{
            $catalogue=Catalogue::find($id);
            $items=Item::where('catalogue_id','=',$id)->where('item_status','=','catalogued')->get();
            $isitems=Item::where('catalogue_id','=',$id)->where('item_status','=','catalogued')->first();
        }
        return view('catalogue',['items'=>$items,'catalogue'=>$catalogue,'isitems'=>$isitems,'search'=>$search]);

    }
    
       
    
    function removeItem($catalogueid,$itemid){
        $item=Item::find($itemid);
        $item->catalogue_id=NULL;
        $item->item_status='verified';
        $item->save();
        return redirect('view/'.$catalogueid);
    }
    function hideItem($catalogueid,$itemid){
        $item=Item::find($itemid);
        
        $item->item_status='catalogued(hidden)';
        $item->save();
        return redirect('view/'.$catalogueid);
    }
    function viewhideItem($catalogueid){
        $catalogue=Catalogue::find($catalogueid);
        $items=Item::where('catalogue_id','=',$catalogueid)->where('item_status','=','catalogued(hidden)')->get();
        $isitems=Item::where('catalogue_id','=',$catalogueid)->where('item_status','=','catalogued(hidden)')->first();
        return view('hiddenItems',['items'=>$items,'catalogue'=>$catalogue,'isitems'=>$isitems]);
    }
    function showItem($catalogueid,$itemid){
        $item=Item::find($itemid);
        
        $item->item_status='catalogued';
        $item->save();
        return redirect('hiddens/'.$catalogueid);
    }
    function showAuctionDetails($id){
        $auction=Auction::find($id);
        $catalogues=Catalogue::where('auction_id','=',$id)->get();
        $iscatalogue=Catalogue::where('auction_id','=',$id)->first();
        return view('auctiondetails',['auction'=>$auction,'iscatalogue'=>$iscatalogue,'catalogues'=>$catalogues]);
    }
    function deleteAuction($id){
        
         $iscatalogues=Catalogue::where('auction_id','=',$id)->first();
         $catalogues=Catalogue::where('auction_id','=',$id)->get();
         $now = new DateTime();
        $date1 =$now->format('Y-m-d');
        $date =$now->modify('+1 day');
        $date2=$date->format('Y-m-d');
         if($iscatalogues){
             foreach($catalogues as $catalogue){
                $catalogue->auction_id=NULL;
                
                $catalogue->save();
                
                $auction=Auction::find($id);
                if(strtotime($auction->auction_date)==strtotime($date1)  || strtotime($auction->auction_date)==strtotime($date2)){
                    $items=Item::where('catalogue_id','=',$catalogue->id)->get();
                    foreach($items as $item){
                        $item->item_status='catalogued';
                        $item->save();
                    }
                }
               
             }
         }
         
        $auction=Auction::find($id);
        $auction->delete();
        return redirect('auctionsModel');
    }
    function vieweditAuction($id){
        $auction=Auction::find($id);
        return view('editAuction',['auction'=>$auction]);
    }
    function editAuction(Request $req){
        $req->validate([
            'auction_title'=>'required',
            'auction_date'=>'required'
         ]);
         $auction=Auction::find($req->id);
         $auction->auction_title=$req->auction_title;
         $auction->auction_date=$req->auction_date;
         $auction->save();
          return redirect('auctionsModel');
        
        
        
        
    }
    function archieveAuction($id){
        $auction=Auction::find($id);
        $auction->isArchieved='yes';
        $auction->save();
        return redirect('auctionsModel');
    }
    function viewArchievedAuctions(){
        $auctions=Auction::where('isArchieved','=','yes')->get();
       
        return view('archievedAuctions',['auctions'=>$auctions]);
    }
    function unarchieveAuction($id){
        $auction=Auction::find($id);
        $auction->isArchieved='no';
        $auction->save();
        return redirect('archievedAuctions');
    }
    function viewCatalogues($id){
        $auction=Auction::find($id);
        $catalogues=Catalogue::where('auction_id','=',NULL)->get();
        return view('catalogues',['catalogues'=>$catalogues,'auctionId'=>$id,'auction'=>$auction]);
    }
    function viewCatalogueForAuction($id){
        $catalogue=Catalogue::find($id);
        $now = new DateTime();
       
        $items=Item::where('catalogue_id','=',$id)->where('item_status','=','catalogued')->orWhere('catalogue_id','=',$id)->where('item_status','=','pending-sales')->get();
        $isitems=Item::where('catalogue_id','=',$id)->where('item_status','=','catalogued')->orWhere('catalogue_id','=',$id)->where('item_status','=','pending-sales')->first();
        return view('catalogueForAuction',['items'=>$items,'catalogue'=>$catalogue,'isitems'=>$isitems]);

    }
    function attachCatalogue($auctionid,$catalogueid){
        $now = new DateTime();
        
        $catalogue=Catalogue::find($catalogueid);
        $catalogue->auction_id=$auctionid;
        $auction=Auction::find($auctionid);
        //eta
             $items=Item::where('catalogue_id','=',$catalogueid)->get();
             foreach($items as $item){
                 $item->item_status='pending-sales';
                 $item->save();
             
         }
        $auction->has_catalogue='yes';
        $auction->save();
        $catalogue->save();
        return redirect('attachCatalogue/'.$auctionid);
        
    }
    function viewAuction($id){
        $now = new DateTime();
        $date1 =$now->format('Y-m-d');
        $date =$now->modify('+1 day');
        $date2=$date->format('Y-m-d');
        $catalogues=DB::table('catalogues')->where('auction_id','=',$id)->get();
        $data=Catalogue::where('auction_id','=',$id)->first();
        $auction=Auction::find($id);
         return view('auction',['catalogues'=>$catalogues,'auction'=>$auction,'data'=>$data,'date1'=>$date1,'date2'=>$date2]);
        
    }
    function deleteFromAuction($auctionid,$id){
        $catalogue=Catalogue::find($id);
        $catalogue->auction_id=NULL;
        $auction=Auction::find($auctionid);
        $auction->has_catalogue='no';
        $items=Item::where('catalogue_id','=',$catalogue->id)->get();
             foreach($items as $item){
                 $item->item_status='catalogued';
                 $item->save();
             }
        $auction->save();
        $catalogue->save();
        return redirect('viewAuction/'.$auctionid);
    }
    function removeItemForAuction($catalogueid,$itemid){
        $item=Item::find($itemid);
        $item->catalogue_id=NULL;
        $item->item_status='verified';
        $item->save();
        return redirect('viewForAuction/'.$catalogueid);
    }
    function viewEditItem($catalogueid,$itemid){
        $item=Item::find($itemid);
        return view('itemEditFormForAuction',['item'=>$item,'catalogueid'=>$catalogueid]);

    }
    function editItem(Request $req,$catalogueid,$itemid){
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
         return redirect('viewForAuction/'.$catalogueid);
    }
    function hideItemForAuction($catalogueid,$itemid){
        $item=Item::find($itemid);
        
        $item->item_status='catalogued(hidden)';
        $item->save();
        return redirect('viewForAuction/'.$catalogueid);
    }
    function viewEditCatalogueForAuction($id){
        $catalogue=Catalogue::find($id);
        return view('catalogueEditFormForAuction',['catalogue'=>$catalogue]);
    }
    function editCatalogueForAuction(Request $req,$id){
        $req->validate([
           'catalogue_title'=>'required',
          
        ]);
        $catalogue=Catalogue::find($req->id);
        $catalogue->catalogue_title=$req->catalogue_title;
       
        $catalogue->save();
         return redirect('viewAuction/'.$id);
    }
    function showAllItems(Request $req){
        $search=$req['search'] ?? "";
        $search1=$req['item_name'] ?? "";
        $search2=$req['category_name'] ?? "";
        if($search != ""){
            
           $items=Item::where('item_name','LIKE',"$search%")->orWhere('artist_name','LIKE',"$search%")->orWhere('category_name','LIKE',"$search%")->orWhere('start_price','LIKE',"$search%")->orWhere('subject_classification','LIKE',"$search%")->where('item_status','!=','sold')->get();
           
        }else if($search1 != "" & $search2 != ""){
            $items=Item::where('item_name','LIKE',"$search1%")->where('category_name','LIKE',"$search2%")->where('item_status','!=','sold')->get();
       }else{
           
            $items=Item::where('item_status','!=','sold')->get();
        }
        
        
        
        return view('searchItemsModel',['items'=>$items,'search'=>$search,'search1'=>$search1,'search2'=>$search2]);
    }
    function viewOngoingAuction(){
       
        $now = new DateTime();
        $date1 =$now->format('Y-m-d');
        $date =$now->modify('+1 day');
        $date2=$date->format('Y-m-d');
      
        $data='No happening auctions sorry';
        // $auctions=Auction::where('has_catalogue','=','yes')->where('isArchieved','=','no')->where('auction_date','=',$date1)->get();
        $isauctions=Auction::where('auction_status','=','on')->first();
        $auctions=Auction::where('auction_status','=','on')->get();
        
       return view('ongoinAuction',['auctions'=>$auctions,'data'=>$data,'isauctions'=>$isauctions,'date1'=>$date1,'date2'=>$date2]);
    }
    function viewOngoingCatalogue($auctionid){
      $catalogues=Catalogue::where('auction_id','=',$auctionid)->get();
      $catalogue=NULL;
      $items=array();
      foreach($catalogues as $catalogue){
          $catalogueid=$catalogue->id;
          $items=Item::where('catalogue_id','=',$catalogue->id)->where('item_status','=','pending-sales')->get();
         
         
      }
      return view('ongoingItemsCatalogue',['items'=>$items,'auctionid'=>$auctionid,'catalogueid'=>$catalogueid]);
    }
    function showItemBids($id,$auctionid){
        $bids=Bid::where('item_id',$id)->get();
        $bidders=[];
        foreach($bids as $bid){

            $bidders[]=User::find($bid->buyer_id);
        }
        return view('itemBids',['bids'=>$bids,'auctionid'=>$auctionid,'bidders'=>$bidders]);
    }
    function sellItem($itemid,$buyerid,$auctionid,$bidid){
        $item=Item::find($itemid);
        $item->item_status='sold';
       $item->bid_id=$bidid;
       $item->buyer_id=$buyerid;
       $user=User::find($buyerid);
       $user->bid_id=$bidid;
       $bid=Bid::find($bidid);
       $commisssion=new Commisssion;
       $commisssion->bid_id=$bidid;
       $commisssion->item_id=$itemid;
       $commisssion->commission_amount=(10/100)*$bid->bid_amount;
       $commisssion->save();
       $user->save();
        $item->save();
       return redirect('viewCatalogue/'.$auctionid);
    }
    function viewSoldItems($auctionid){
        $catalogues=Catalogue::where('auction_id','=',$auctionid)->get();
       $commissions=[];
       $soldprices=[];
       $buyers=[];
        foreach($catalogues as $catalogue){
            $items=Item::where('catalogue_id','=',$catalogue->id)->where('item_status','=','sold')->get();
           foreach($items as $item){
               $commissions[]=Bid::find($item->bid_id)->getCommission;
               $soldprices[]=Bid::find($item->bid_id);
               $buyers[]=User::find($item->buyer_id);
           }
           
           
        }
        return view('soldItems',['items'=>$items, 'commissions'=> $commissions,'soldprices'=>$soldprices,'buyers'=>$buyers]);
    }
    function viewSpendAmount($bidid){
        $bid=Bid::find($bidid);
        $item=Item::find($bid->item_id);
        return view('amountspend',['bid'=>$bid,'item'=>$item]);
    }
    function commissions($id){
        $commissions=Commisssion::where('catalogue_id','=',$id)->get();
       return view('commissions',['commissions'=>$commissions]);
    }
    function getReport($auctionid){
        $auction=Auction::find($auctionid);
        $catalogues=Catalogue::where('auction_id','=',$auctionid)->get();
        $catalogue=NULL;
        $items=array();
        $commissions=[];
        $soldprices=[];
        $buyers=[];
        foreach($catalogues as $catalogue){
           
            $items=Item::where('catalogue_id','=',$catalogue->id)->where('item_status','=','sold')->get();
           $unsolds=Item::where('catalogue_id','=',$catalogue->id)->where('item_status','=','pending-sales')->get();
            foreach($items as $item){
                $commissions[]=Bid::find($item->bid_id)->getCommission;
                $soldprices[]=Bid::find($item->bid_id);
                $buyers[]=User::find($item->buyer_id);
            }
           
        }
        return view('report',['items'=>$items,'auction'=>$auction,'catalogues'=>$catalogues, 'commissions'=> $commissions,'soldprices'=>$soldprices,'buyers'=>$buyers,'unsolds'=>$unsolds]);
    }
    function downloadPDF($auctionid){
        $auction=Auction::find($auctionid);
        $catalogues=Catalogue::where('auction_id','=',$auctionid)->get();
        $catalogue=NULL;
        $items=array();
        $commissions=[];
        $soldprices=[];
        $buyers=[];
        $coms=[];
        foreach($catalogues as $catalogue){
            $coms=Commisssion::where('catalogue_id','=',$catalogue->id)->get();
            $items=Item::where('catalogue_id','=',$catalogue->id)->where('item_status','=','sold')->get();
           $unsolds=Item::where('catalogue_id','=',$catalogue->id)->where('item_status','=','pending-sales')->get();
            foreach($items as $item){
                $commissions[]=Bid::find($item->bid_id)->getCommission;
                $soldprices[]=Bid::find($item->bid_id);
                $buyers[]=User::find($item->buyer_id);
            }
           
        }
        $pdf=PDF::loadView('report',['items'=>$items,'auction'=>$auction,'catalogues'=>$catalogues, 'commissions'=> $commissions,'soldprices'=>$soldprices,'buyers'=>$buyers,'unsolds'=>$unsolds,'coms'=>$coms]);
        return $pdf->download('auctionresult.pdf');
    }
}
