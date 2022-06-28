<?php

/*
|----------------z----------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------

| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::post('/update', 'UpdateController@step0')->name('update');
Route::get('/update/step1', 'UpdateController@step1')->name('update.step1');
Route::get('/update/step2', 'UpdateController@step2')->name('update.step2');*/

use Illuminate\Support\Facades\Route;

Route::get('/admin', 'HomeController@admin_dashboard')->name('admin.dashboard')->middleware(['auth', 'admin']);
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    //csv exports
    Route::get('/product/search', 'ProductController@select2Productsearch');


    //Expense Controller
    Route::get('/admin-expensetype', 'ExpenseController@adminexpensetype')->name('admin.expensetype');
    Route::post('/add-expensetype', 'ExpenseController@addexpensetype')->name('addexpensetype');
    Route::get('/expendse-Edit/{id}', 'ExpenseController@expenseEdit')->name('expenseEdit');
    Route::post('/update-expense-type/{id}', 'ExpenseController@updateexpensetype')->name('updateexpensetype');
    //expense statement
    Route::get('/expense-statement', 'ExpenseController@expenseStatement')->name('expenseStatement');
    Route::Post('/addexpense', 'ExpenseController@addexpense')->name('addexpense');
    //update for whatsapp
    Route::get('/services/providerlist', 'ServiceController@service_providerApplication')->name('service_provider.application');
    Route::get('/services/orderplacing', 'ServiceController@service_orderplacing')->name('service_orderplacing.application');
    //assign role service Controller
    Route::post('/assign-role-Service', 'ServiceController@assignroleService')->name('assignroleService');
    //csv download
    Route::get('/csvdownload', 'AccountController@exportCsv')->name('csvdownload');

    //end Expense Controller
    Route::get('/sellerProductView/{id}', 'AccountController@sellerProductView')->name('sellerProductView');
    Route::get('/sellerOrderfilter', 'AccountController@sellerOrderfilter')->name('sellerOrderfilter');
    //Account Controller
    Route::get('/admin-selectNewRole', 'AccountController@adminselectNewRole')->name('admin.selectNewRole');
    //Journal_entries
    Route::get('/Journal_entries', 'AccountController@Journal_entries')->name('Journal_entries');
    Route::get('/journial-Details/{slug}', 'AccountController@journialDetails')->name('journialDetails');


    //Order Voucher Item Added
    Route::get('/order-purchase-added/{id}', 'AccountController@order_purchase_added')->name('order_purchase_added');
    Route::get('/order-purchase-Paid/{id}', 'AccountController@order_purchase_Paid')->name('order_purchase_Paid');
    Route::get('/order-sales-added/{id}', 'AccountController@order_sales_added')->name('order_sales_added');
    Route::get('/order-sales-paid/{id}', 'AccountController@order_sales_paid')->name('order_sales_paid');







    // Route::get('/salesorders','AccountController@salesorders')->name('salesorders');
    Route::get('/salesinvoice', 'AccountController@salesinvoice')->name('salesinvoice');
    Route::get('/refresh-purchase/{orderid}', 'AccountController@refreshpurchase')->name('refreshpurchase');
    Route::get('/all-order-status', 'AccountController@salesorders')->name('salesorders');
    Route::get('/salesreturn', 'AccountController@salesreturn')->name('salesreturn');
    Route::get('/salesdelivery', 'AccountController@salesdelivery')->name('salesdelivery');
    Route::get('/salesreport', 'AccountController@salesreport')->name('salesreport');
    Route::get('/salesreport-orderitemwise', 'AccountController@salesreportorderitemwise')->name('salesreportorderitemwise');

    Route::get('/chat-of-Accounts', 'AccountController@account_head')->name('chatof_Accounts');
    Route::get('/voucher-entries', 'AccountController@voucher_entries')->name('voucher_entries');
    //coa Type

    Route::post('/create_coa_type', 'AccountController@create_coa_type')->name('create_coa_type');

    Route::post('/loadcoadataajax', 'AccountController@loadcoadataajax')->name('loadcoadataajax');

    //modification Coa
    Route::get('/chat-of-Accounts-modify', 'AccountController@chatof_Accounts_modify')->name('chatof_Accounts_modify');
    Route::get('/profit-Group-Edit/{id}', 'AccountController@profitGroupEdit')->name('profitGroupEdit');
    Route::get('/profit-Child-Group-Edit/{id}', 'AccountController@profitChildGroupEdit')->name('profitChildGroupEdit');
    Route::get('/profit-Child-Group-Delete/{id}', 'AccountController@profitChildGroupDelete')->name('profitChildGroupDelete');
    Route::get('/profit-Account-view/{id}', 'AccountController@profitAccountview')->name('profitAccountview');



    Route::get('updateBalanceSheetAccount', 'AccountController@updateBalanceSheetAccount')->name('updateBalanceSheetAccount');

    Route::get('/profitandloss-newgroup', 'AccountController@profitandloss_newgroup')->name('profitandloss_newgroup');
    Route::get('/balance-sheet-newgroup', 'AccountController@balancesheet_newgroup')->name('balancesheet_newgroup');
    Route::get('/profit-and-loss-new-account', 'AccountController@profitandlossnewaccount')->name('profitandlossnewaccount');
    Route::get('/update-profit-and-loss-account', 'AccountController@updateprofitandlossaccount')->name('updateprofitandlossaccount');

    Route::post('/update-Child-profit-and-loss-Account', 'AccountController@updateChildprofitandlossAccount')->name('updateChildprofitandlossAccount');

    Route::post('/update-Profit-and-Loss-Account', 'AccountController@updateProfitandLossAccount')->name('updateProfitandLossAccount');

    //balanceSheet

    Route::get('/main-Balance-Sheet-Group-Edit/{id}', 'AccountController@mainBalanceSheetGroupEdit')->name('mainBalanceSheetGroupEdit');

    Route::post('/update-group-balance-sheet-group', 'AccountController@updategroupbalancesheetgroup')->name('updategroupbalancesheetgroup');

    Route::get('/delete-balance-Sheet-MainGroup/{id}', 'AccountController@deletebalanceSheetMainGroup')->name('deletebalanceSheetMainGroup');
    Route::get('manage-chart-of-accounts', 'AccountController@managechartofaccouts')->name('managechartofaccouts');
    Route::get('account-Details-view/{id}', 'AccountController@accountDetailsview')->name('accountDetailsview');
    //bela obela Inventory

    Route::get('all-store-list', 'InventoryController@all_store_list')->name('all_store_list');
    Route::post('bob-create-store', 'InventoryController@bobcreatestore')->name('bobcreatestore');
    Route::get('store_edit/{id}', 'InventoryController@store_edit')->name('store_edit');
    Route::get('store_delete/{id}', 'InventoryController@store_delete')->name('store_delete');
    Route::post('store_update', 'InventoryController@store_update')->name('store_update');
    Route::get('all-inventory-show', 'InventoryController@allinventoryshow')->name('allinventoryshow');
    Route::get('edit-inventory/{id}', 'InventoryController@editinventory')->name('editinventory');
    Route::post('/addstoreupdate', 'InventoryController@addstoreupdate')->name('addstoreupdate');
    Route::post('/add-product-item-update', 'InventoryController@addproductitemupdate')->name('addproductitemupdate');
    Route::post('/store-and-purchase-update', 'InventoryController@storeandpurchaseupdate')->name('storeandpurchaseupdate');
    Route::get('/product-wise-stock/{id}', 'InventoryController@productwisestock')->name('productwisestock');
    Route::get('/store-wise-product-stock/store/{id}', 'InventoryController@storewiseProductStock')->name('storewiseProductStock');



    //Purchase Module By Mannaf  >> START
    Route::get('/purchases/list-of/warehouse/{warehouse}', 'PurchaseController@purchaseList')->name('purchaseList');
    Route::get('/purchases/list-of/warehouse/{warehouse}/purchase/{purchase}', 'PurchaseController@purchaseItems')->name('purchaseItems');

    Route::get('/new/purchase/warehouse/{warehouse}', 'PurchaseController@selectWarehouseToPurchase')->name('selectWarehouseToPurchase');
    Route::get('/new/purchase/warehouse/{warehouse}/search/supplier', 'PurchaseController@serchSupplier')->name('serchSupplier');
    Route::get('/new/purchase/warehouse/{warehouse}/supplier/{supplier}', 'PurchaseController@newPurchase')->name('newPurchase');
    Route::get('/select/product/{product}/warehouse/{warehouse}/supplier/{supplier}', 'PurchaseController@selectTempProduct')->name('selectTempProduct');
    Route::get('/unselect/product/{product}/warehouse/{warehouse}/supplier/{supplier}', 'PurchaseController@unselectTempProduct')->name('unselectTempProduct');
    Route::get('/update/item/{item}/type/{type}/warehouse/{warehouse}/supplier/{supplier}', 'PurchaseController@updateTempItem')->name('updateTempItem');
    Route::post('/purchase/store/warehouse/{warehouse}/supplier/{supplier}', 'PurchaseController@storePurchase')->name('storePurchase');

    Route::get('/warehouse-wise/{warehouse}/stock-list', 'PurchaseController@warhouseStockList')->name('warhouseStockList');


    Route::get('supplier/{supplier}/payment', 'PurchaseController@supplierPayment')->name('supplierPayment');
    Route::post('supplier/{supplier}/payment', 'PurchaseController@storeSupplierPayment')->name('storeSupplierPayment');


    Route::get('/warehouse-stock-check-of-order/{order}', 'PurchaseController@warehouseStockCheck')->name('warehouseStockCheck');
    Route::post('/admin-order/{order}', 'PurchaseController@orderStatusChange')->name('orderStatusChange');

    Route::get('/old-order/status/change', 'PurchaseController@oldOrderStatusChange')->name('oldOrderStatusChange');

    //Suppliers
    Route::get('/suppliers', 'SupplierPurchaseController@index')->name('supplier.index');
    Route::get('/supplier/create', 'SupplierPurchaseController@create')->name('supplier.create');
    Route::post('/supplier/create', 'SupplierPurchaseController@store')->name('supplier.store');
    Route::get('/supplier/{supplier}/edit', 'SupplierPurchaseController@edit')->name('supplier.edit');
    Route::patch('/supplier/{supplier}/update', 'SupplierPurchaseController@update')->name('supplier.update');
    Route::get('/supplier/{supplier}/destroy', 'SupplierPurchaseController@destroy')->name('supplier.destroy');
    Route::get('/supplier/{supplier}/invoice', 'SupplierPurchaseController@supplierInvoice')->name('supplier.supplierInvoice');
    Route::get('/supplier/{supplier}/invoice/purchase/{purchase}', 'SupplierPurchaseController@supplierInvoiceDetails')->name('supplier.supplierInvoiceDetails');
    Route::get('/supplier/{supplier}/product/stocks', 'SupplierPurchaseController@supplierProductStock')->name('supplierProductStock');

    //Suppliers

    // Supplier Purchase Start
    Route::get('/new/supplier/purchase/warehouse/{warehouse}', 'SupplierPurchaseController@selectWarehouseToPurchase')->name('supplier.selectWarehouseToPurchase');
    Route::get('/new/supplier/purchase/warehouse/{warehouse}/search/supplier', 'SupplierPurchaseController@serchSupplier')->name('supplier.serchSupplier');
    Route::get('/new/supplier/{supplier}/purchase/warehouse/{warehouse}', 'SupplierPurchaseController@newPurchase')->name('supplier.newPurchase');
    Route::get('/new/supplier/getProductAjax', 'SupplierPurchaseController@getProductAjax')->name('getProductAjax');
    Route::get('/new/supplier/getProductPrice', 'SupplierPurchaseController@getProductPrice')->name('getProductPrice');
    Route::post('/store/new/temp-item', 'SupplierPurchaseController@addTempItem')->name('addTempItem');
    Route::get('/delete/supplier/{supplier}/warehouse/{warehouse}/temp-item/{item}', 'SupplierPurchaseController@deleteTempItem')->name('deleteTempItem');
    Route::post('/new/supplier/{supplier}/warehouse/{warehouse}/finalSave', 'SupplierPurchaseController@finalSave')->name('finalSave');

    Route::get('/warehouse/{warehouse}/purchase-list', 'SupplierPurchaseController@warehousePurchaseList')->name('warehousePurchaseList');
    Route::get('/warehouse/{warehouse}/purchase/{purchase}/item', 'SupplierPurchaseController@warehousePurchaseItem')->name('warehousePurchaseItem');
    Route::get('/supplier-payments/from/supplier/{supplier}', 'SupplierPurchaseController@supplierPayment')->name('supplier.supplierPayment');

    // Supplier Purchase Start

    Route::get('/warehouse/stock/of/product/{product}', 'SupplierPurchaseController@warehouseWiseProductStockList')->name('warehouseWiseProductStockList');
    Route::get('/sale/history/of/stock/{stock}/of', 'SupplierPurchaseController@salesHistoryOfStock')->name('salesHistoryOfStock');



    //Purchase Module By Mannaf  >> END

    //seller wise customer list

    Route::get('seller-voucher-list/{seller_id}/{ac_type}/{start?}/{end?}', 'AccountController@sellervoucherlist')->name('sellervoucherlist');
    Route::get('user-voucher-list//{user_id}/{ac_type}/{start?}/{end?}', 'AccountController@uservoucherlist')->name('uservoucherlist');




    Route::get('belaobela-journal', 'AccountController@belaobelajournal')->name('belaobelajournal');
    Route::get('search-journal-entry', 'AccountController@searchjournalentry')->name('searchjournalentry');



    Route::get('belaobela-journal-entry-edit/{id}', 'AccountController@belaobelajournalentryedit')->name('belaobelajournalentryedit');
    Route::post('update-belaobela-entries', 'AccountController@updatebelaobelaentries')->name('updatebelaobelaentries');

    //purchase Paid veiw
    Route::get('add-to-purchase-paid-view/{id}', 'AccountController@addtopurchasepaidview')->name('addtopurchasepaidview');

    Route::post('/store-profit-and-loss-groups', 'AccountController@storeprofitandlossgroup')->name('storeprofitandlossgroup');
    Route::post('/update-profit-and-loss-group', 'AccountController@updateprofitandlossgroup')->name('updateprofitandlossgroup');
    Route::post('/store-balance-sheet-group', 'AccountController@storebalancesheetgroup')->name('storebalancesheetgroup');
    Route::post('/store-profit-and-loss-account', 'AccountController@storeprofitandlossaccount')->name('storeprofitandlossaccount');


    Route::get('/balance-sheet-new-account', 'AccountController@balancesheetnewaccount')->name('balancesheetnewaccount');


    Route::post('/store-balance-sheetnewaccount', 'AccountController@storebalancesheetnewaccount')->name('storebalancesheetnewaccount');

    Route::get('/delete-profit-and-loss-group/{id}', 'AccountController@deleteprofitandlossgroup')->name('deleteprofitandlossgroup');
    //balanceSheet Update
    Route::get('/Update-child-Balance-Sheet-Account/{id}', 'AccountController@UpdatechildBalanceSheetAccount')->name('UpdatechildBalanceSheetAccount');

    Route::post('/update-balance-sheet-group-account', 'AccountController@updatebalancesheetnewaccount')->name('updatebalancesheetnewaccount');

    //   Route::post('/update-balance-sheet-Account', 'AccountController@updatebalancesheetaccounts')->name('updatebalancesheetaccount');



    //BalanceSheet Accounts
    Route::get('balance-sheet-account-edit/{id}', 'AccountController@balancesheetaccountedit')->name('balancesheetaccountedit');
    Route::post('/update-balance-sheet-Account', 'AccountController@updatebalancesheetaccounts')->name('updatebalancesheetaccount');
    Route::get('/view-balanceSheet-account/{id}', 'AccountController@viewbalancesheet')->name('viewbalanceSheet');









    Route::get('/delete-Balace-Sheet-Accounts/{id}', 'AccountController@deleteBalaceSheetAccounts')->name('deleteBalaceSheetAccounts');
    //subGroup Category
    Route::get('/sub-group-Balace-Sheet-Edit/{id}', 'AccountController@subgroupBalaceSheetEdit')->name('subgroupBalaceSheetEdit');





    //
    Route::get('/voucher_entries_modify', 'AccountController@voucher_entries_modify')->name('voucher_entries_modify');
    Route::get('/all-voucher-list', 'AccountController@allvoucherlist')->name('allvoucherlist');
    Route::get('/all-voucher-list/serarch', 'AccountController@allvoucherSearch')->name('allvoucherSearch');
    Route::get('/vourcherview/{id}', 'AccountController@vourcherview')->name('vourcherview');
    Route::get('/vourcheredit/{id}', 'AccountController@vourcheredit')->name('vourcheredit');
    Route::post('/update-voucher-entries', 'AccountController@updatevoucherentries')->name('updatevoucherentries');
    Route::get('/voucher-entries-delete/{id}', 'AccountController@voucherentriesdelete')->name('voucherentriesdelete');

    //ledger Searching
    Route::get('/ledger_searching', 'AccountController@ledger_searching')->name('ledger_searching');
    Route::get('/createledger', 'AccountController@createledger')->name('createledger');
    //Inventory
    Route::get('/inventory', 'AccountController@inventory')->name('inventory');
    Route::get('/inventory_view/{id?}', 'AccountController@inventory_view')->name('inventory_view');







    Route::post('/store-voucher-entries', 'AccountController@storevoucherentries')->name('storevoucherentries');

    Route::get('/Summary_accounts', 'AccountController@Summary_accounts')->name('Summary_accounts');
    Route::get('/accounts-Report', 'AccountController@accounts_Report')->name('accounts_Report');
    Route::get('/profit-and-loss-report', 'AccountController@profitandlossreport')->name('profitandlossreport');
    Route::get('/create-new-profit-and-loss-report', 'AccountController@createnewprofitandlossreport')->name('createnewprofitandlossreport');


    Route::get('/profit-and-loss-report', 'AccountController@profitandlossreport')->name('profitandlossreport');
    Route::get('/balance-sheet-Report', 'AccountController@balancesheetReport')->name('balancesheetReport');
    Route::get('/create-new-balance-sheet-report', 'AccountController@createnewbalancesheetreport')->name('createnewbalancesheetreport');
    //genal ledger
    Route::get('/trial-balance-report', 'AccountController@trial_balance_report')->name('trial_balance_report');
    Route::get('/general-ledger-summery', 'AccountController@general_ledger_summery')->name('general_ledger_summery');
    Route::get('/general-ledger-transection', 'AccountController@general_ledger_transection')->name('general_ledger_transection');
    //voucher-Items
    Route::get('/Voucher-Items/{id}/{balanceType}/{sheetname?}/{start?}/{end?}', 'AccountController@VoucherItems')->name('voucheritems');

    // Route::get('/create-new-balance-sheet-report', 'AccountController@genarel_ledger_transection')->name('createnewbalancesheetreport');
    Route::get('/create-generel-ledger-transaction-report', 'AccountController@creategenerelledgertransactionreport')->name('creategenerelledgertransactionreport');
    Route::get('/create-trial-balance-report', 'AccountController@createtrialbalancereport')->name('createtrialbalancereport');
    Route::get('/create-General-Ledger-Summery', 'AccountController@createGeneralLedgerSummery')->name('createGeneralLedgerSummery');





    //end modification Coa



    Route::get('/income-statement', 'AccountController@balancesheet')->name('balancesheet');
    Route::get('/income-invoice', 'AccountController@balanceinvoice')->name('balanceinvoice');


    Route::get('/direct-OrderChage', 'AccountController@directOrderChage')->name('directOrderChage');
    Route::get('/order-edit-purchase-and-delivery/{id}', 'AccountController@ordereditpurchaseanddelivery')->name('ordereditpurchaseanddelivery');
    Route::post('/order-edit-purchase-and-delivery-save/{id}', 'AccountController@ordereditpurchaseanddeliverysave')->name('ordereditpurchaseanddeliverysave');

    //end Controller
    //Activity Logs
    Route::get('/adminActivitylogs', 'modificationController@adminActivitylogs')->name('adminActivitylogs');
    Route::get('/editedbydeteils/{id}', 'modificationController@editedbydeteils')->name('editedbydeteils');
    Route::get('/editedbyorder-show/{id}', 'modificationController@editedbyordershow')->name('editedbyorder.show');
    //end Activity Logs
    //
    Route::post('/changeOrderIdAdmin', 'modificationController@changeOrderIdAdmin')->name('changeOrderIdAdmin');
    Route::get('/orderidshowAdmin/{id}', 'modificationController@orderidshowAdmin')->name('orderidshowAdmin');
    //



    //ORDER dELIVERY STATUS
    Route::post('/admin-order-statusChange', 'modificationController@adminorderstatuschange')->name('adminorderstatuschange');

    //End delivery status

    //modification Controller
    Route::get('/order-Customer-Details/{id}', 'modificationController@orderCustomerDetails')->name('orderCustomerDetails');
    Route::get('/admin-customer-Veiw/{id}', 'modificationController@adminCustomerVeiw')->name('adminCustomerVeiw');



    Route::get('/sale-customer-invoice/{id}', 'modificationController@salecustomerinvoice')->name('salecustomerinvoice');

    Route::get('/adminsellerview/{id}', 'modificationController@adminsellerview')->name('adminsellerview');
    Route::get('/adminsellerProduct/{id}', 'modificationController@adminsellerProduct')->name('adminsellerProduct');
    //end Modification Controller
    //end modification Controller
    //Job Corner
    Route::get('/job-corner/internship/apllication', 'JobController@internshipApplication')->name('jobs.internship.application');
    Route::get('/job-corner/join-with-us/apllication', 'JobController@joinUsApplication')->name('jobs.join.application');

    Route::get('/contact-us/apllication', 'JobController@contactUsApplication')->name('contuct_us.application');
    Route::post('/contact-us/message_modal', 'JobController@message_modal')->name('contuct_us.message_modal');

    //Service List
    Route::get('/service-list', 'JobController@create')->name('service_list');


    //Update Routes

    Route::resource('categories', 'CategoryController');
    Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('categories.edit');
    Route::get('/categories/destroy/{id}', 'CategoryController@destroy')->name('categories.destroy');
    Route::post('/categories/featured', 'CategoryController@updateFeatured')->name('categories.featured');


    Route::any('/bulk-categories', 'CategoryController@bulkCategoryIndex')->name('bulk_category');

    Route::resource('brands', 'BrandController');
    Route::get('/brands/edit/{id}', 'BrandController@edit')->name('brands.edit');
    Route::get('/brands/destroy/{id}', 'BrandController@destroy')->name('brands.destroy');
    Route::resource('colors', 'ColorController');
    Route::get('/colors/edit/{id}', 'ColorController@edit')->name('colors.edit');
    Route::get('/colors/destroy/{id}', 'ColorController@destroy')->name('colors.destroy');

    Route::get('/products/admin', 'ProductController@admin_products')->name('products.admin');
    Route::get('/products/seller', 'ProductController@seller_products')->name('products.seller');
    Route::get('/products/all', 'ProductController@all_products')->name('products.all');
    Route::get('/products/create', 'ProductController@create')->name('products.create');
    Route::get('/products/admin/{id}/edit', 'ProductController@admin_product_edit')->name('products.admin.edit');
    Route::get('/products/custom_slug_check', 'ProductController@custom_slug_check')->name('products.custom_slug_check');

    Route::get('/products/seller/{id}/edit', 'ProductController@seller_product_edit')->name('products.seller.edit');
    Route::post('/products/todays_deal', 'ProductController@updateTodaysDeal')->name('products.todays_deal');
    Route::post('/products/featured', 'ProductController@updateFeatured')->name('products.featured');
    //update pre order
    Route::post('/products/pre_order', 'ProductController@preorder')->name('products.preorder');





    Route::post('/products/get_products_by_subcategory', 'ProductController@get_products_by_subcategory')->name('products.get_products_by_subcategory');

    Route::resource('sellers', 'SellerController');
    Route::get('sellers_ban/{id}', 'SellerController@ban')->name('sellers.ban');
    Route::get('/sellers/destroy/{id}', 'SellerController@destroy')->name('sellers.destroy');
    Route::get('/sellers/view/{id}/verification', 'SellerController@show_verification_request')->name('sellers.show_verification_request');
    Route::get('/sellers/approve/{id}', 'SellerController@approve_seller')->name('sellers.approve');
    Route::get('/sellers/reject/{id}', 'SellerController@reject_seller')->name('sellers.reject');
    Route::get('/sellers/login/{id}', 'SellerController@login')->name('sellers.login');
    Route::post('/sellers/payment_modal', 'SellerController@payment_modal')->name('sellers.payment_modal');
    Route::get('/seller/payments', 'PaymentController@payment_histories')->name('sellers.payment_histories');
    Route::get('/seller/payments/show/{id}', 'PaymentController@show')->name('sellers.payment_history');
    Route::get('/seller/withdraw_requests_export/', 'SellerWithdrawRequestController@withdraw_requests_export')->name('sellers.withdraw_requests_export');
    Route::get('/seller/mis_report/', 'SellerWithdrawRequestController@mis_report')->name('sellers.mis_report');
    Route::get('/seller/sellers/due_report/', 'SellerWithdrawRequestController@sellers_due_report')->name('sellers.due_report');


    Route::resource('customers', 'CustomerController');
    Route::get('customers_ban/{customer}', 'CustomerController@ban')->name('customers.ban');
    Route::get('/customers/login/{id}', 'CustomerController@login')->name('customers.login');
    Route::get('/customers/destroy/{id}', 'CustomerController@destroy')->name('customers.destroy');

    Route::get('/newsletter', 'NewsletterController@index')->name('newsletters.index');
    Route::post('/newsletter/send', 'NewsletterController@send')->name('newsletters.send');
    Route::post('/newsletter/test/smtp', 'NewsletterController@testEmail')->name('test.smtp');

    Route::resource('profile', 'ProfileController');

    Route::post('/business-settings/update', 'BusinessSettingsController@update')->name('business_settings.update');
    Route::post('/business-settings/update/activation', 'BusinessSettingsController@updateActivationSettings')->name('business_settings.update.activation');
    Route::get('/general-setting', 'BusinessSettingsController@general_setting')->name('general_setting.index');
    Route::get('/activation', 'BusinessSettingsController@activation')->name('activation.index');
    Route::get('/payment-method', 'BusinessSettingsController@payment_method')->name('payment_method.index');
    Route::get('/file_system', 'BusinessSettingsController@file_system')->name('file_system.index');
    Route::get('/social-login', 'BusinessSettingsController@social_login')->name('social_login.index');
    Route::get('/smtp-settings', 'BusinessSettingsController@smtp_settings')->name('smtp_settings.index');
    Route::get('/google-analytics', 'BusinessSettingsController@google_analytics')->name('google_analytics.index');
    Route::get('/google-recaptcha', 'BusinessSettingsController@google_recaptcha')->name('google_recaptcha.index');
    Route::get('/facebook-chat', 'BusinessSettingsController@facebook_chat')->name('facebook_chat.index');
    Route::post('/env_key_update', 'BusinessSettingsController@env_key_update')->name('env_key_update.update');
    Route::post('/payment_method_update', 'BusinessSettingsController@payment_method_update')->name('payment_method.update');
    Route::post('/google_analytics', 'BusinessSettingsController@google_analytics_update')->name('google_analytics.update');
    Route::post('/google_recaptcha', 'BusinessSettingsController@google_recaptcha_update')->name('google_recaptcha.update');
    Route::post('/facebook_chat', 'BusinessSettingsController@facebook_chat_update')->name('facebook_chat.update');
    Route::post('/facebook_pixel', 'BusinessSettingsController@facebook_pixel_update')->name('facebook_pixel.update');
    Route::get('/currency', 'CurrencyController@currency')->name('currency.index');
    Route::post('/currency/update', 'CurrencyController@updateCurrency')->name('currency.update');
    Route::post('/your-currency/update', 'CurrencyController@updateYourCurrency')->name('your_currency.update');
    Route::get('/currency/create', 'CurrencyController@create')->name('currency.create');
    Route::post('/currency/store', 'CurrencyController@store')->name('currency.store');
    Route::post('/currency/currency_edit', 'CurrencyController@edit')->name('currency.edit');
    Route::post('/currency/update_status', 'CurrencyController@update_status')->name('currency.update_status');
    Route::get('/verification/form', 'BusinessSettingsController@seller_verification_form')->name('seller_verification_form.index');
    Route::post('/verification/form', 'BusinessSettingsController@seller_verification_form_update')->name('seller_verification_form.update');
    Route::get('/vendor_commission', 'BusinessSettingsController@vendor_commission')->name('business_settings.vendor_commission');
    Route::post('/vendor_commission_update', 'BusinessSettingsController@vendor_commission_update')->name('business_settings.vendor_commission.update');

    Route::resource('/languages', 'LanguageController');
    Route::post('/languages/{id}/update', 'LanguageController@update')->name('languages.update');
    Route::get('/languages/destroy/{id}', 'LanguageController@destroy')->name('languages.destroy');
    Route::post('/languages/update_rtl_status', 'LanguageController@update_rtl_status')->name('languages.update_rtl_status');
    Route::post('/languages/key_value_store', 'LanguageController@key_value_store')->name('languages.key_value_store');



    // website setting
    Route::group(['prefix' => 'website'], function () {
        Route::view('/header', 'backend.website_settings.header')->name('website.header');
        Route::view('/footer', 'backend.website_settings.footer')->name('website.footer');
        Route::view('/pages', 'backend.website_settings.pages.index')->name('website.pages');
        Route::view('/appearance', 'backend.website_settings.appearance')->name('website.appearance');
        Route::resource('custom-pages', 'PageController');
        Route::get('/custom-pages/edit/{id}', 'PageController@edit')->name('custom-pages.edit');
        Route::get('/custom-pages/destroy/{id}', 'PageController@destroy')->name('custom-pages.destroy');
        Route::view('/email-sms', 'backend.marketing.auto_email_sms')->name('email_sms_setup');
    });

    Route::resource('roles', 'RoleController');
    Route::get('/roles/edit/{id}', 'RoleController@edit')->name('roles.edit');
    Route::get('/roles/destroy/{id}', 'RoleController@destroy')->name('roles.destroy');

    Route::resource('staffs', 'StaffController');
    Route::get('/staffs/destroy/{id}', 'StaffController@destroy')->name('staffs.destroy');

    Route::resource('flash_deals', 'FlashDealController');
    Route::get('/flash_deals/edit/{id}', 'FlashDealController@edit')->name('flash_deals.edit');
    Route::get('/flash_deals/destroy/{id}', 'FlashDealController@destroy')->name('flash_deals.destroy');
    Route::post('/flash_deals/update_status', 'FlashDealController@update_status')->name('flash_deals.update_status');
    Route::post('/flash_deals/update_featured', 'FlashDealController@update_featured')->name('flash_deals.update_featured');
    Route::post('/flash_deals/product_discount', 'FlashDealController@product_discount')->name('flash_deals.product_discount');
    Route::post('/flash_deals/product_discount_edit', 'FlashDealController@product_discount_edit')->name('flash_deals.product_discount_edit');

    //Subscribers
    Route::get('/subscribers', 'SubscriberController@index')->name('subscribers.index');
    Route::get('/subscribers/destroy/{id}', 'SubscriberController@destroy')->name('subscriber.destroy');

    // Route::get('/orders', 'OrderController@admin_orders')->name('orders.index.admin');
    // Route::get('/orders/{id}/show', 'OrderController@show')->name('orders.show');
    // Route::get('/sales/{id}/show', 'OrderController@sales_show')->name('sales.show');
    // Route::get('/sales', 'OrderController@sales')->name('sales.index');

    // All Orders
    Route::get('/all_orders/report/export', 'OrderController@all_order_export')->name('all_order.all_order_export');
    Route::get('/all_orders', 'OrderController@all_orders')->name('all_orders.index');
    Route::get('/all_orders/report', 'OrderController@all_orders_report')->name('all_orders.report');
    Route::get('/all_orders/{id}/show', 'OrderController@all_orders_show')->name('all_orders.show');

    //start advertisement container
    Route::get('/all/contianers', 'AdvertisementController@allcontianers')->name('allcontianers');
    Route::get('/advertisement/contianer/edit/{id}', 'AdvertisementController@advertisement_container_edit')->name('advertisement_container_edit');

    Route::get('/advertisement/contianers', 'AdvertisementController@advertisement_containers')->name('advertisement_containers');
    Route::post('/advertisement/contianers/update', 'AdvertisementController@advertisement_containers_post_update')->name('advertisement_containers_post.update');

    Route::post('/advertisement/contianers/post', 'AdvertisementController@advertisement_containers_post')->name('advertisement_containers_post');
    Route::get('/advertisement/container/delete/{id}', 'AdvertisementController@advertisementContainerDelete')->name('advertisementContainerDelete');

    Route::get('/advertisement/container/items/view/{id}', 'AdvertisementController@advertisementContainerItemsView')->name('advertisement_container_items_view');

    //start advertisement items
    Route::get('/advertisement/items/{containerid?}', 'AdvertisementController@advertisement_items')->name('advertisement_items');
    Route::post('/advertisement/items/post', 'AdvertisementController@advertisementItemsPost')->name('advertisement_items_post');
    Route::get('/all/aditems', 'AdvertisementController@allAddItems')->name('all_add_items');
    Route::get('/advertisement/item/edit/{id}', 'AdvertisementController@advertisement_items_edit')->name('advertisement_items_edit');

    Route::post('/advertisement/item/post/update', 'AdvertisementController@advertisementItemPostupdate')->name('advertisement_items_post_update');

    Route::get('/advertisement/item/delete/{id}', 'AdvertisementController@advertisementItemDelete')->name('advertisementItemDelete');
    //end advertisement


    Route::get('/delivery_status/report', 'OrderController@all_orders_delivery_status')->name('all_orders_delivery_status');
    //sales Delivery
    Route::get('/salesorder-show/{id}/show', 'OrderController@salesorder')->name('salesorder.show');
    //end sales Delivery

    // Inhouse Orders
    Route::get('/inhouse-orders', 'OrderController@admin_orders')->name('inhouse_orders.index');
    Route::get('/inhouse-orders/{id}/show', 'OrderController@show')->name('inhouse_orders.show');

    // Seller Orders
    Route::get('/seller_orders', 'OrderController@seller_orders')->name('seller_orders.index');
    Route::get('/seller_orders/{id}/show', 'OrderController@seller_orders_show')->name('seller_orders.show');

    // Pickup point orders
    Route::get('orders_by_pickup_point', 'OrderController@pickup_point_order_index')->name('pick_up_point.order_index');
    Route::get('/orders_by_pickup_point/{id}/show', 'OrderController@pickup_point_order_sales_show')->name('pick_up_point.order_show');

    Route::get('/orders/destroy/{id}', 'OrderController@destroy')->name('orders.destroy');
    Route::get('invoice/admin/{order_id}', 'InvoiceController@admin_invoice_download')->name('admin.invoice.download');
    Route::get('invoice-test/admin/{order_id}', 'InvoiceController@test_invoice')->name('test_invoice');
    Route::get('report-test/admin/{order_id}', 'InvoiceController@test_report_pdf')->name('test_report_pdf');


    Route::post('/pay_to_seller', 'CommissionController@pay_to_seller')->name('commissions.pay_to_seller');

    //Reports
    Route::get('/stock_report', 'ReportController@stock_report')->name('stock_report.index');
    Route::get('/in_house_sale_report', 'ReportController@in_house_sale_report')->name('in_house_sale_report.index');
    Route::get('/seller_sale_report', 'ReportController@seller_sale_report')->name('seller_sale_report.index');
    Route::get('/wish_report', 'ReportController@wish_report')->name('wish_report.index');
    Route::get('/user_search_report', 'ReportController@user_search_report')->name('user_search_report.index');
    Route::get('/purchase_report', 'ReportController@purchaseReport')->name('purchaseReport');
    Route::get('/employee-all-Ajax', 'ReportController@supplierAllAjax')->name('supplierAllAjax');
    Route::get('/seller-all-Ajax', 'ReportController@sellerAllAjax')->name('sellerAllAjax');

    //Coupons
    Route::resource('coupon', 'CouponController');
    Route::post('/coupon/get_form', 'CouponController@get_coupon_form')->name('coupon.get_coupon_form');
    Route::post('/coupon/get_form_edit', 'CouponController@get_coupon_form_edit')->name('coupon.get_coupon_form_edit');
    Route::get('/coupon/destroy/{id}', 'CouponController@destroy')->name('coupon.destroy');

    //Reviews
    Route::get('/reviews', 'ReviewController@index')->name('reviews.index');
    Route::post('/reviews/published', 'ReviewController@updatePublished')->name('reviews.published');

    //Support_Ticket
    Route::get('support_ticket/', 'SupportTicketController@admin_index')->name('support_ticket.admin_index');
    Route::get('support_ticket/{id}/show', 'SupportTicketController@admin_show')->name('support_ticket.admin_show');
    Route::post('support_ticket/reply', 'SupportTicketController@admin_store')->name('support_ticket.admin_store');

    //Pickup_Points
    Route::resource('pick_up_points', 'PickupPointController');
    Route::get('/pick_up_points/edit/{id}', 'PickupPointController@edit')->name('pick_up_points.edit');
    Route::get('/pick_up_points/destroy/{id}', 'PickupPointController@destroy')->name('pick_up_points.destroy');

    //conversation of seller customer
    Route::get('conversations', 'ConversationController@admin_index')->name('conversations.admin_index');
    Route::get('conversations/{id}/show', 'ConversationController@admin_show')->name('conversations.admin_show');

    Route::post('/sellers/profile_modal', 'SellerController@profile_modal')->name('sellers.profile_modal');
    Route::post('/sellers/profile_modal_v2', 'SellerController@profile_modal_v2')->name('sellers.profile_modal_v2');
    Route::post('/sellers/approved', 'SellerController@updateApproved')->name('sellers.approved');

    Route::resource('attributes', 'AttributeController');
    Route::get('/attributes/edit/{id}', 'AttributeController@edit')->name('attributes.edit');
    Route::get('/attributes/destroy/{id}', 'AttributeController@destroy')->name('attributes.destroy');

    Route::resource('addons', 'AddonController');
    Route::post('/addons/activation', 'AddonController@activation')->name('addons.activation');

    Route::get('/customer-bulk-upload/index', 'CustomerBulkUploadController@index')->name('customer_bulk_upload.index');
    Route::post('/bulk-user-upload', 'CustomerBulkUploadController@user_bulk_upload')->name('bulk_user_upload');
    Route::post('/bulk-customer-upload', 'CustomerBulkUploadController@customer_bulk_file')->name('bulk_customer_upload');
    Route::get('/user', 'CustomerBulkUploadController@pdf_download_user')->name('pdf.download_user');
    //Customer Package

    Route::resource('customer_packages', 'CustomerPackageController');
    Route::get('/customer_packages/edit/{id}', 'CustomerPackageController@edit')->name('customer_packages.edit');
    Route::get('/customer_packages/destroy/{id}', 'CustomerPackageController@destroy')->name('customer_packages.destroy');

    //Classified Products
    Route::get('/classified_products', 'CustomerProductController@customer_product_index')->name('classified_products');
    Route::post('/classified_products/published', 'CustomerProductController@updatePublished')->name('classified_products.published');

    //Shipping Configuration
    Route::get('/shipping_configuration', 'BusinessSettingsController@shipping_configuration')->name('shipping_configuration.index');
    Route::post('/shipping_configuration_save', 'BusinessSettingsController@shipping_configuration_save')->name('shipping_configuration.save');
    Route::get('/shipping_configuration_edit/{id?}', 'BusinessSettingsController@shipping_configuration_edit')->name('shipping_configuration.edit');
    Route::post('/shipping_seller_configuration_update', 'BusinessSettingsController@shipping_seller_configuration_update')->name('shipping_seller_configuration_update');
    Route::get('/shipping_configuration_delete/{id}', 'BusinessSettingsController@shipping_configuration_delete')->name('shipping_configuration.delete');
    Route::post('/shipping_configuration/update', 'BusinessSettingsController@shipping_configuration_update')->name('shipping_configuration.update');

    //delivery method configuration
    Route::resource('delivery_method_configuration', 'DelivryMethodController');
    Route::post('/delivery_method_configuration/update_delivery_method', 'DelivryMethodController@update_delivery_method')->name('delivery_method_configuration.update_delivery_method');
    Route::get('/delivery_method_configuration/delete/{id}', 'DelivryMethodController@delete')->name('delivery_method_configuration.delete_delivery_method');

    Route::post('/delivery_method/min_charge', 'DelivryMethodController@minimumDeliveryCharge')->name('minimum_delivery_charge');


    // Route::resource('pages', 'PageController');
    // Route::get('/pages/destroy/{id}', 'PageController@destroy')->name('pages.destroy');

    Route::resource('countries', 'CountryController');
    Route::post('/countries/status', 'CountryController@updateStatus')->name('countries.status');

    Route::resource('cities', 'CityController');
    Route::get('/cities/edit/{id}', 'CityController@edit')->name('cities.edit');
    Route::get('/cities/destroy/{id}', 'CityController@destroy')->name('cities.destroy');

    Route::view('/system/update', 'backend.system.update')->name('system_update');
    Route::view('/system/server-status', 'backend.system.server_status')->name('system_server');

    // uploaded files
    Route::any('/uploaded-files/file-info', 'AizUploadController@file_info')->name('uploaded-files.info');
    Route::resource('/uploaded-files', 'AizUploadController');
    Route::get('/uploaded-files/destroy/{id}', 'AizUploadController@destroy')->name('uploaded-files.destroy');

    //popup routes start here
    Route::get('/popup/create', 'PopupController@create')->name('popup.create');
    Route::get('/popup/index', 'PopupController@all_popups')->name('popup.index');
    Route::get('/popup/edit/{id?}', 'PopupController@edit')->name('popup.edit');
    Route::get('/popup/delete/{id?}', 'PopupController@destroy')->name('popup.delete');
    Route::post('/popup/published', 'PopupController@updatePublished')->name('popup.published');
    Route::post('/popup/store', 'PopupController@store')->name('popup.store');
    Route::post('/popup/update', 'PopupController@update')->name('popup.update');

    Route::get('/survey_popup/index', 'PopupController@all_survey_popup')->name('survey_popup.index');
    Route::get('/survey_popup/delete/{id?}', 'PopupController@destroy_survey')->name('survey_popup.delete');
    Route::get('/survey_popup/view/{id?}', 'PopupController@survey_popup_view')->name('survey_popup.view');
    //Delivery Man
    Route::resource('deliveryMan', 'DeliveryManController');
    Route::get('assign-delivery-man', 'DeliveryManController@assign_delivery_man')->name('assign_delivery_man');
    Route::get('daily-order-summary', 'DeliveryManController@daily_order_summery')->name('daily_order_summery');
});
