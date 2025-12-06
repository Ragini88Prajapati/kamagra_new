<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Gender;
use App\Models\Client\Order;
use App\Models\Client\Product;
use App\Models\Client\Users_detail;
use App\Models\Client\YoutubeLink;
use App\Models\Client\ProductType;
use App\Models\Client\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use App\AdminBannerModel;
use App\ContactUs;
use App\Testimonials;
use App\NewsLetter;
use App\BlogModel;
use App\BlogReview;
use App\StaticModel;
use App\StaticContent;
use App\Models\Admin\Category;

class HomeController extends Controller
{
    public $data = array();

    public function __construct()
    {
    }

    public function index()
        {
            $data['product_list'] = Product::where('status', 1)->select('name', 'slug', 'id', 'mrp', 'price', 'subtitle', 'discount', 'image', 'image_path', 'gender_id')->get();
            $best_prod = Product::where('status', 1)->select('name', 'slug', 'id', 'mrp', 'price', 'subtitle', 'discount', 'image', 'image_path', 'gender_id')->get();
            $data['best_product'] = json_decode($best_prod, true);
            $data['product_type'] = ProductType::get();
            $data['banners'] = AdminBannerModel::get();
            $data['static'] = StaticModel::where('id', 1)->first();
            $data['testimonial'] = Testimonials::get();
            $data['static_seo'] = StaticContent::where('title', 'home')->first();
            $data['categories'] = Category::select('id', 'name')->where('status', 1)->get();
            $data['products_list'] = Product::where('status', 1)->get();

            return $this->_display('client2.index', $data);
        }


    public function terms_and_refund_policy()
    {
        $data = array();
        return $this->_display('client.terms-condition', $data);
    }

    public function signup()
    {
        $data = array();
        return $this->_display('client2.register', $data);
    }

    public function address_form()
    {
        $data = array();
        return $this->_display('client.user.address_form', $data);
    }

    public function privacy_policy()
    {
        $data = array();
        return $this->_display('client.user.privacy_policy', $data);
    }

    public function contact_us()
    {
        $data = array();
        return $this->_display('client2.contact_us', $data);
    }

    public function about_us()
    {
        $data = array();
        return $this->_display('client2.about_us', $data);
    }
    
    

    public function change_password()
    {
        $data = array();
        return $this->_display('client.user.change_password', $data);
    }

    public function edit_details()
    {
        $data = array();
        return $this->_display('client.user.edit_details', $data);
    }

    public function test_email()
    {
        $user_id = Auth::user()->id;

        $auth_user_data = Auth::user()->toArray();
        $data['order_data'] = Order::where('users_id', $user_id)
            ->where('id', 7)
            ->with([
                'order_product.product.brand', 'order_product.delivery_status',
                'user_detail',
                'user', 'state'
            ])
            ->get()->first();
        return view('client.email.order-placed', $data);
        $user = '';
        $mail =  Mail::send('client.email.testemail', [], function ($m) use ($auth_user_data) {
            $user_email = isset($auth_user_data['email']) && !empty($auth_user_data['email']) ? $auth_user_data['email'] : "";
            $user_name = isset($auth_user_data['name']) && !empty($auth_user_data['name']) ? $auth_user_data['name'] : "";
            $m->to($user_email, $user_name)->subject('Your Order is placed on always healthy pharma');
        });

        // $mail = Mail::raw('dvijparekh1995@gmail.com', 'hiiiiiiiiii');
        echo "<pre>";
        print_r($mail);
        exit;
    }

    public function save_contactus(Request $request){
        // dd(request()->input());
        $res=ContactUs::insert([
            'name'=>request()->input('contact_name'),
            'email'=>request()->input('contact_mail'),
            'message'=>request()->input('contact_msg'),
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        if($res){
            return redirect()->back()->with('msg','We will contact you shortly');
        }else{
            return redirect()->back()->with('msg','Something went wrong');
        }
    }

    public function save_newsletter(Request $request){
        // dd(request()->input());
        $check=NewsLetter::where('email',request()->input('subscribe_email'))->first();
        if($check){
            return redirect()->back()->with('msg','You have successful subscribe for newsletter');
        }else{
            $res=NewsLetter::insert([
                'email'=>request()->input('subscribe_email'),
                'created_at'=>date('Y-m-d H:i:s'),
            ]);
            if($res){
                return redirect()->back()->with('msg','You have successful subscribe for newsletter');
            }else{
                return redirect()->back()->with('msg','Something went wrong');
            }
        }
        
    }

    public function _display($view, $data)
    {
        $cart_data = CartController::get_cart_details();
        $this->data['cart_total_quantity']  = isset($cart_data['cart_total_quantity']) && !empty($cart_data['cart_total_quantity']) ? $cart_data['cart_total_quantity'] : 0;
        $data  = array_merge($this->data, $data);
        $data['cart_data']=$cart_data;
        // dd($data);
        return view($view, $data);
    }

    public function order_summary(Request $request)
    {
        $data = array();
        $order_id=request()->input('oid');
        // $user_id = Auth::user()->id;
        $data['order']=Order::where('id',$order_id)->first();
        $data['order_data'] = OrderProduct::where('order_id',$order_id)
            ->get();
        // dd($data);
        // return $this->_display('client.user.order-history', $data);
        return $this->_display('client2.order-summary', $data);
    }
  
      public function order_confirmation()
    {
        $data = array();
        return $this->_display('client2.order-confirmation', $data);
    }

    //   public function product_list()
    // {
    //     $data = array();
    //     return $this->_display('client2.product-list', $data);
    // }
    public function user_profile()
    {
        $data = array();
        return $this->_display('client2.user-profile', $data);
    }

    public function free_shipping()
    {
        $data = array();
        return $this->_display('client2.free-shipping', $data);
    }
    public function satisfaction()
    {
        $data = array();
        return $this->_display('client2.satisfaction', $data);
    }
    public function delivery_information()
    {
        $data = array();
        return $this->_display('client2.delivery-information', $data);
    }
    public function kamagra_glossary()
    {
        $data = array();
        return $this->_display('client2.kamagra-glossary', $data);
    }
    public function sexual_enhance()
    {
        $data = array();
        return $this->_display('client2.sexual-enhance', $data);
    }
    public function partner_page()
    {
        $data = array();
        return $this->_display('client2.partner', $data);
    }
    public function partner_register()
    {
        $data = array();
        return $this->_display('client2.partner-register', $data);
    }

    public function thank_you(Request $request)
    {
        
        $data = array();

        $data['categories'] = Category::select('id', 'name')->where('status', 1)->get(); //ragini
        $data['order_id']=request()->input('order_id'); 
        $data['user_id'] = session('user_id'); // Debug here
        $data['shipping_firstname'] = session('shipping_firstname'); // Debug here
        // $data['user_id'] = $request->input('user_id'); // Retrieve user_id
        // $data['shipping_firstname'] = $request->input('shipping_firstname'); // Retrieve shipping_firstname
    
        // dd($data);
        return $this->_display('client2.thank-you', $data);
    }
    
      public function blog()
    {
        $data = array();
        $data['blogs']=BlogModel::paginate(12);
        return $this->_display('client2.blog', $data);
    }
       public function blog_detail($url)
    {
        $data = array();
        $blogData=BlogModel::where('url',$url)->first();
        $data['blog']=$blogData;
        $data['review']=BlogReview::where('blog_id',$blogData->id)->get();
        $data['related_blog']=BlogModel::where('url','!=',$url)->take(4)->get();
        return $this->_display('client2.blog-detail', $data);
    }

    public function saveBlogReview(Request $request){
        $res=BlogReview::insert([
            'blog_id'=>request()->input('blog_data'),
            'name'=>request()->input('username'),
            'email'=>request()->input('email_blog'),
            'description'=>request()->input('comment_content'),
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        if($res){
            return redirect()->back()->with("msg","Review Saved");
        }else{
            return redirect()->back()->with("msg","Something Went Wrong");
        }
    }
    
    public function sitemapXml(){
        $data['blogs']=BlogModel::get();
        $product_list = Product::where('status', 1)->get();
        $data['product_list'] = $product_list;
        return response()->view('client2.sitemap', $data)->header('Content-Type', 'text/xml');
      
    }
}