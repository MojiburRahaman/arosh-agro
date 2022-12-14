 <?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\BestDealController;
    use App\Http\Controllers\BrandController;
    use App\Http\Controllers\CartController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\CatagoryController;
    use App\Http\Controllers\ColorController;
    use App\Http\Controllers\FlavourController;
    use App\Http\Controllers\FrontendController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\MdController;
    use App\Http\Controllers\ProductViewController;
    use App\Http\Controllers\SearchController;
    use App\Http\Controllers\SizeController;
    use App\Http\Controllers\SubCatagoryController;
    use App\Http\Controllers\RoleController;
    use App\Http\Controllers\CouponController;
    use App\Http\Controllers\WishlistController;
    use App\Http\Controllers\BlogController;
    use App\Http\Controllers\UserProfileController;
    use App\Http\Controllers\CheckoutController;
    use App\Http\Controllers\OrderController;
    use App\Http\Controllers\SiteSettingController;
    use App\Http\Controllers\SocialLoginController;
    use App\Http\Controllers\SisterConcernController;
    use App\Http\Controllers\ServiceController;
    use App\Http\Controllers\GalleryAllController;
    use App\Http\Controllers\PagesController;
    use App\Http\Controllers\SellingpointController;




    // socialite
    Route::get('login/google', [SocialLoginController::class, 'GoogleLogin'])->name('GoogleLogin');
    Route::get('register/google', [SocialLoginController::class, 'GoogleRegister'])->name('GoogleRegister');
    Route::get('login/callback', [SocialLoginController::class, 'GoogleCallbackUrlRegister'])->name('GoogleCallbackUrlRegister');




    Route::middleware(['auth', 'XssFilter', 'HtmlMinify',  'checkcoustomer'])->group(function () {
        // Profile route
        Route::get('/profile', [UserProfileController::class, 'FrontendProfile'])->name('FrontendProfile');
        Route::post('/change-password', [UserProfileController::class, 'ChangeUserPass'])->name('ChangeUserPass');
        // wishlist route start
        // Route::get('/wishlist', [WishlistController::class, 'WishlistView'])->name('WishlistView');
        // Route::post('/wishlist-post', [WishlistController::class, 'WishlistPost'])->name('WishlistPost');
        // Route::get('/wishlist-remove/{id}', [WishlistController::class, 'WishlistRemove'])->name('WishlistRemove');
        // checkout route start
        Route::get('/checkout', [CheckoutController::class, 'CheckoutView'])->name('CheckoutView');
        Route::post('/checkout-post', [CheckoutController::class, 'CheckoutPost'])->name('CheckoutPost');
        Route::post('/checkout/billing/division_id', [CheckoutController::class, 'CheckoutajaxDivid'])->name('CheckoutajaxDivid');
        Route::post('/checkout/billing/disctrict_id', [CheckoutController::class, 'CheckoutajaxDistrictid'])->name('CheckoutajaxDistrictid');
    });


    // frontend route start
    Route::middleware(['XssFilter', 'HtmlMinify'])->group(function () {

        Route::get('/', [FrontendController::class, 'Frontendhome'])->name('Frontendhome');
        // Route::get('/searching', [FrontendController::class, 'Frontendsearching'])->name('Frontendsearching');
        Route::get('/shop', [FrontendController::class, 'Allproducts'])->name('allproducts');
        Route::get('/contact', [FrontendController::class, 'FrontndContact'])->name('FrontndContact');
        Route::post('/contact', [FrontendController::class, 'FrontendContactPost'])->name('FrontendContactPost');
        Route::get('/about', [FrontendController::class, 'FrontendAbout'])->name('FrontendAbout');
        Route::get('/image-gallery', [FrontendController::class, 'ImageGallery'])->name('ImageGallery');
        Route::get('/selling-points', [FrontendController::class, 'SellingPoint'])->name('spoints');
        Route::get('/video-gallery', [FrontendController::class, 'VideoGallery'])->name('VideoGallery');
        Route::get('/sister-concerns', [FrontendController::class, 'Sisterconcern'])->name('sisterconcern');
        Route::get('/deals', [FrontendController::class, 'FrontendDeals'])->name('FrontendDeals');
        Route::get('/deals/status', [FrontendController::class, 'FrontendDealsStaus'])->name('FrontendDealsStaus');
        // Route::get('/certified', [FrontendController::class, 'FrontendCertified'])->name('FrontendCertified');
        Route::post('/newsletter', [FrontendController::class, 'FrontendNewsLetter'])->name('FrontendNewsLetter');

        // product route
        Route::get('/product/{slug}', [ProductViewController::class, 'SingleProductView'])->name('SingleProductView');
        // Route::post('/product/review', [ProductViewController::class, 'ProductReview'])->name('ProductReview');
        Route::post('/product/get-size', [ProductViewController::class, 'GetSizeByColor'])->name('GetSizeByColor');
        // Route::post('/product/get-flavour', [ProductViewController::class, 'GetFlavourBySize'])->name('GetFlavourBySize');
        Route::post('/product/get-pricebysize', [ProductViewController::class, 'GetPriceBySize'])->name('GetPriceBySize');
        //Md Message Route
        // Route::get('/md-message', [FrontendController::class, 'Mdmessage'])->name('Mdmessage');
        Route::get('/service', [FrontendController::class, 'service'])->name('service');
        Route::get('/service/{slug}', [FrontendController::class, 'ServiceView'])->name('ServiceView');
        // blog route
        // Route::get('/blog', [FrontendController::class, 'Frontendblog'])->name('Frontendblog');
        // Route::get('/blog/{slug}', [FrontendController::class, 'FrontenblogView'])->name('FrontenblogView');

        // Route::post('/blog/comment', [FrontendController::class, 'BlogComment'])->name('BlogComment');
        // Route::post('/blog/reply', [FrontendController::class, 'BlogReply'])->name('BlogReply');
        // search route start
        Route::get('/category/{slug}', [SearchController::class, 'CategorySearch'])->name('CategorySearch');
        // Route::get('/product-sub-category/{slug}', [SearchController::class, 'SubCategorySearch'])->name('SubCategorySearch');
        // Route::get('/brand/{slug}', [SearchController::class, 'BrandSearch'])->name('BrandSearch');
        // cart route start
        Route::get('/cart', [CartController::class, 'CartView'])->name('CartView');
        Route::post('/cart/coupon', [CartController::class, 'CouponCheck'])->name('CouponCheck');
        Route::post('/cart/credit/', [CartController::class, 'ReedemCredit'])->name('ReedemCredit');
        Route::get('/cart/cart-delete/{id}', [CartController::class, 'CartDelete'])->name('CartDelete');
        // Route::post('/cart/cart-clear/', [CartController::class, 'CartClear'])->name('CartClear');
        Route::post('/cart/quantity-update', [CartController::class, 'CartUpdate'])->name('CartUpdate');
        Route::post('/cartpost', [CartController::class, 'CartPost'])->name('CartPost');
        Route::get('/{page}', [FrontendController::class, 'DynamicPage'])->name('DynamicPage');
    });





    // backend route
    Route::get('/admin/login', [DashboardController::class, 'AdminLogin'])->name('AdminLogin')->middleware('guest', 'throttle:10,5');
    Route::post('/admin/login', [DashboardController::class, 'AdminLoginPost'])->name('AdminLoginPost')->middleware('guest', 'throttle:10,5');
    // backend route start
    Route::middleware(['auth', 'HtmlMinify', 'checkadminpanel'])->prefix('admin')->group(function () {
        Route::get('/change-password', [DashboardController::class, 'AdminChangePassword'])->name('AdminChangePassword');
        Route::post('/change-password', [DashboardController::class, 'AdminChangePasswordPost'])->name('AdminChangePasswordPost');
        Route::post('dashboard/ck-editor-upload', [DashboardController::class, 'CkfileUpload'])->name('CkfileUpload');
        Route::resource('dashboard', DashboardController::class)->except('destroy', 'update', 'edit', 'show', 'store', 'create');
        // catagory route
        Route::post('/catagory/mark-delete', [CatagoryController::class, 'MarkdeleteCatagory'])->name('MarkdeleteCatagory');
        Route::resource('/catagory', CatagoryController::class);
        // subcatagory route
        Route::post('/sub-catagory/mark-delete', [SubCatagoryController::class, 'MarkdeleteSubCatagory'])->name('MarkdeleteSubCatagory');
        Route::resource('/subcatagory', SubCatagoryController::class)->except('show');

        // product route
        Route::get('/products/status/{id}', [ProductController::class, 'ProductStaus'])->name('ProductStaus');
        Route::post('/products/mark-delete/', [ProductController::class, 'MarkdeleteProduct'])->name('MarkdeleteProduct');
        Route::get('/products/edit/product-attribute-delete/{id}', [ProductController::class, 'ProducvtAtributeDelete'])->name('ProducvtAtributeDelete');
        // Route::get('/products/edit/product-flavour-delete/{id}', [ProductController::class, 'ProductFlavourDelete'])->name('ProductFlavourDelete');
        Route::get('/products/edit/product-image-delete/{id}', [ProductController::class, 'ProductImagesDelete'])->name('ProductImagesDelete');
        Route::get('/products/get-sub-cat/{cat_id}', [ProductController::class, 'GetSubcatbyAjax'])->name('GetSubcatbyAjax');
        Route::resource('/products', ProductController::class);
        Route::resource('/mds', MdController::class);
        Route::resource('/sister-concern', SisterConcernController::class);
        Route::resource('/services', ServiceController::class);
        Route::resource('/gallery', GalleryAllController::class);
        Route::resource('/spoints', SellingpointController::class);

        //    roles route
        Route::get('/roles/add-user', [RoleController::class, 'CreateUser'])->name('CreateUser');
        Route::post('/roles/add-user-post', [RoleController::class, 'CreateUserPost'])->name('CreateUserPost');
        Route::post('/roles/assign-user-post', [RoleController::class, 'AssignUserPost'])->name('AssignUserPost');
        Route::get('/roles/assign-user', [RoleController::class, 'AssignUser'])->name('AssignUser');
        Route::resource('/roles', RoleController::class)->except('show');
        // order route
        Route::get('orders/cancel/{id}', [OrderController::class, 'OrderCancel'])->name('OrderCancel');
        Route::get('orders/status/{id}', [OrderController::class, 'DeliveryStatus'])->name('DeliveryStatus');
        Route::get('orders/download-invoice/{id}', [OrderController::class, 'InvoiceDownload'])->name('InvoiceDownload');
        Route::resource('/orders', OrderController::class)->except('create', 'store', 'edit', 'destroy', 'update');

        Route::get('settings/about/{id}', [SiteSettingController::class, 'SiteAbout'])->name('SiteAbout');
        Route::post('settings/delivery-charge', [SiteSettingController::class, 'SiteDeliveryPost'])->name('SiteDeliveryPost');
        Route::get('settings/delivery-charge', [SiteSettingController::class, 'SiteDelivery'])->name('SiteDelivery');
        Route::get('settings/credit', [SiteSettingController::class, 'SiteCredit'])->name('SiteCredit');
        Route::post('settings/credit', [SiteSettingController::class, 'SiteCreditPost'])->name('SiteCreditPost');
        Route::post('settings/about', [SiteSettingController::class, 'SiteAboutUpdate'])->name('SiteAboutUpdate');
        Route::get('settings/banner-status/{id}', [SiteSettingController::class, 'SiteBannerStatus'])->name('SiteBannerStatus');
        Route::get('settings/banner-delete/{id}', [SiteSettingController::class, 'SiteBannerDelete'])->name('SiteBannerDelete');
        Route::post('settings/banner-post', [SiteSettingController::class, 'SiteBannerPost'])->name('SiteBannerPost');
        Route::get('settings/banner', [SiteSettingController::class, 'SiteBanner'])->name('SiteBanner');
        Route::post('settings/subscriber', [SiteSettingController::class, 'SiteSubscriber'])->name('SiteSubscriber');

        Route::resource('/settings', SiteSettingController::class)->except('show', 'destroy', 'index', 'store');
        Route::resource('/coupons', CouponController::class);
        Route::resource('/color', ColorController::class)->except('show');
        Route::resource('/size', SizeController::class)->except('show');


        // Route::resource('/blogs', BlogController::class);

        Route::resource('/deals', BestDealController::class)->except('edit', 'update');

        Route::resource('/pages', PagesController::class);
    });
