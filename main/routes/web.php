<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuctionHouseController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[AuctionHouseController::class,'homeView']);
Route::get('/login',[AuctionHouseController::class,'loginView']);
Route::post('loggedIn',[AuctionHouseController::class,'login']);
Route::get('itemsModel',[AuctionHouseController::class,'viewItemsModel']);
Route::get('auctionsModel',[AuctionHouseController::class,'viewAuctionsModel']);
Route::get('verifiedItemsModel',[AuctionHouseController::class,'viewVerifiedItemsModel']);
Route::get('/logout', function () {
    if(session()->has('loginID')){
        session()->pull('loginID');
        session()->forget('loginID');
     }
     return redirect('/');
});

Route::get('itemdetails/{id}',[AuctionHouseController::class,'showItemDetails']);
Route::get('verifiedItemsModel',[AuctionHouseController::class,'showVerifiedItems']);
Route::get('itemverified/{id}',[AuctionHouseController::class,'verifyItem']);
Route::get('itemdenied/{id}',[AuctionHouseController::class,'denyItem']);
Route::get('create',[AuctionHouseController::class,'viewCreateAuction']);
Route::post('auctionCreated',[AuctionHouseController::class,'createAuction']);
Route::get('register',[UserController::class,'viewRegistration']);
Route::post('userRegistered',[UserController::class,'createUser']);
Route::get('itemsModelSeller',[UserController::class,'viewItemsModel']);
Route::get('verifiedItemsModelSeller',[UserController::class,'viewVerifiedItemsModel']);
Route::get('auctionCatalogues',[UserController::class,'viewAuctionCatalogues']);
Route::get('yourItems',[UserController::class,'viewYourItems']);
Route::get('itemdetailsForCustomer/{id}',[AuctionHouseController::class,'showItemDetailsForCustomer']);
Route::get('itemdetailsForSeller/{id}',[AuctionHouseController::class,'showItemDetailsForSeller']);

Route::get('choose',[UserController::class,'choose']);
Route::post('createItem',[UserController::class,'createItem']);
Route::post('itemCreated',[UserController::class,'registerItem']);
Route::get('itemdelete/{id}',[UserController::class,'deleteItem']);
Route::get('pendingitemdelete/{id}',[UserController::class,'deletePendingItem']);
Route::get('itemedit/{id}',[UserController::class,'viewEditItem']);
Route::post('itemedited/{id}',[UserController::class,'editItem']);
Route::get('itemarchieve/{id}',[UserController::class,'archieveItem']);
Route::get('archievedItems',[UserController::class,'viewArchievedItems']);
Route::get('itemunarchieve/{id}',[UserController::class,'unarchieveItem']);

Route::get('cataloguesModel',[AuctionHouseController::class,'viewCataloguesModel']);
Route::get('createCatalogue',[AuctionHouseController::class,'viewCreateCatalogue']);
Route::post('catalogueCreated',[AuctionHouseController::class,'createCatalogue']);
Route::get('cataloguearchieve/{id}',[AuctionHouseController::class,'archieveCatalogue']);
Route::get('archievedCatalogues',[AuctionHouseController::class,'viewArchievedCatalogues']);
Route::get('catalogueunarchieve/{id}',[AuctionHouseController::class,'unarchieveCatalogue']);
Route::get('cataloguedelete/{id}',[AuctionHouseController::class,'deleteCatalogue']);
Route::get('cataloguedetails/{id}',[AuctionHouseController::class,'showCatalogueDetails']);
Route::get('catalogueedit/{id}',[AuctionHouseController::class,'viewEditCatalogue']);
Route::post('catalogueedited/{id}',[AuctionHouseController::class,'editCatalogue']);
Route::get('addItems/{id}',[AuctionHouseController::class,'viewAddItems']);
Route::get('addItems/itemdetails/{id}',[AuctionHouseController::class,'showItemDetails']);
Route::get('itemAdded/{catalogueId}/{itemId}',[AuctionHouseController::class,'addItem']);
Route::get('view/{id}',[AuctionHouseController::class,'viewCatalogue']);
Route::get('view/itemdetails/{id}',[AuctionHouseController::class,'showItemDetails']);
Route::get('/view/itemremove/{catalogueid}/{itemid}',[AuctionHouseController::class,'removeItem']);
Route::get('cataloguedItemsModelSeller',[UserController::class,'showCataloguedItemsModel']);
Route::get('soldItemsModelSeller',[UserController::class,'viewSoldItemsModel']);
Route::get('pendingItemsModelSeller',[UserController::class,'viewPendingItemsModel']);
Route::get('view/itemhide/{catalogueid}/{itemid}',[AuctionHouseController::class,'hideItem']);
Route::get('/hiddens/{catalogueid}',[AuctionHouseController::class,'viewhideItem']);
Route::get('/itemshow/{catalogueid}/{itemid}',[AuctionHouseController::class,'showItem']);

Route::get('auctiondetails/{id}',[AuctionHouseController::class,'showAuctionDetails']);
Route::get('auctiondelete/{id}',[AuctionHouseController::class,'deleteAuction']);
Route::get('auctionedit/{id}',[AuctionHouseController::class,'vieweditAuction']);
Route::get('auctionedited/{id}',[AuctionHouseController::class,'editAuction']);
Route::get('auctionarchieve/{id}',[AuctionHouseController::class,'archieveAuction']);
Route::get('archievedAuctions',[AuctionHouseController::class,'viewArchievedAuctions']);
Route::get('auctionunarchieve/{id}',[AuctionHouseController::class,'unarchieveAuction']);
Route::get('attachCatalogue/{id}',[AuctionHouseController::class,'viewCatalogues']);
Route::get('viewForAuction/{id}',[AuctionHouseController::class,'viewCatalogueForAuction']);
Route::get('attach/{auctionid}/{catalogueid}',[AuctionHouseController::class,'attachCatalogue']);
Route::get('viewAuction/{id}',[AuctionHouseController::class,'viewAuction']);
Route::get('deleteForAuction/{auctionid}/{id}',[AuctionHouseController::class,'deleteFromAuction']);
Route::post('/auctionedited/{id}',[AuctionHouseController::class,'editAuction']);
Route::get('/viewForAuction/itemremove/{catalogueid}/{itemid}',[AuctionHouseController::class,'removeItemForAuction']);
Route::get('viewForAuction/itemedit/{catalogueid}/{itemid}',[AuctionHouseController::class,'viewEditItem']);
Route::post('viewForAuction/itemedited/{catalogueid}/{itemid}',[AuctionHouseController::class,'editItem']);
Route::get('viewForAuction/itemhide/{catalogueid}/{itemid}',[AuctionHouseController::class,'hideItemForAuction']);
Route::get('viewAuction/catalogueedit/{id}',[AuctionHouseController::class,'viewEditCatalogueForAuction']);
 Route::post('viewAuction/catalogueedit/catalogueedited/{id}',[AuctionHouseController::class,'editCatalogueForAuction']);
 Route::get('searchItemsModel',[AuctionHouseController::class,'showAllItems']);
 Route::get('ongoinAuction',[AuctionHouseController::class,'viewOngoingAuction']);
 Route::get('viewCatalogue/{auctionid}',[AuctionHouseController::class,'viewOngoingCatalogue']);
 Route::get('viewCatalogueForCustomer/{auctionid}',[UserController::class,'viewOngoingCatalogue']);
 Route::get('putbid/{id}',[UserController::class,'putbid']);
 Route::post('bid/{id}',[UserController::class,'bid']);
 Route::get('itembids/{id}/{auctionid}',[AuctionHouseController::class,'showItemBids']);
 Route::get('sellItem/{itemid}/{buyerid}/{auctionid}/{bidid}',[AuctionHouseController::class,'sellItem']);
Route::get('soldItems/{auctionid}',[AuctionHouseController::class,'viewSoldItems']);
Route::get('soldItemsForCustomer/{auctionid}',[UserController::class,'viewSoldItemsForCustomer']);
Route::get('commissions/{id}',[AuctionHouseController::class,'commissions']);
Route::get('report/{auctionid}',[AuctionHouseController::class,'getReport']);
Route::get('download/{auctionid}',[AuctionHouseController::class,'downloadPDF']);
Route::get('/profile',[UserController::class,'viewProfile']);
Route::get('/yourprofile',[UserController::class,'viewYourProfile']);
Route::get('/profiles',[UserController::class,'profiles']);
Route::get('/allitems',[UserController::class,'allItems']);
Route::get('/youritems',[UserController::class,'allItemsSeller']);