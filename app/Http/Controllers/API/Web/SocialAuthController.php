<?php

namespace App\Http\Controllers\API\Web;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\CountryInterface;
use App\Interfaces\Web\SocialAuthInterface;
use App\Models\Admin\Customer;
use App\Models\Admin\PaymentMethod;
use App\Models\Admin\TaxRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{

    private $SocialAuthRepository;
    private $CountryRepository;
    public function __construct(SocialAuthInterface $SocialAuthRepository, CountryInterface $CountryRepository,)
    {
        $this->SocialAuthRepository = $SocialAuthRepository;
        $this->CountryRepository = $CountryRepository;
    }


    public function redirect(Request $request)
    {
        session()->put('from_page', $request->query('from'));
        if ($request->has('cart_session')) {
            session()->put('cart_session', $request->query('cart_session'));
        }
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        $fromPage = session()->get('from_page');

        try {
            $setting = getSetting();
            $countries = $this->CountryRepository->all();
            $payment_methods = PaymentMethod::with('payment_config')->get();
            $pkey =  $payment_methods[0]->payment_config[0]->value;
            $social_user = Socialite::driver('google')->user();
            $tax = TaxRate::where('status', 1)->first();



            $customer = Customer::where('google_id',  $social_user->getId())->first();
            if (!$customer) {
                $params['session_id'] = session()->get('cart_session');
                $params['first_name'] = $social_user->getName();
                $params['last_name'] =  '';
                $params['email'] =  $social_user->getEmail();
                $params['google_id'] =  $social_user->getId();
                $params['avatar'] = $social_user->getAvatar();
                $params['status'] = '1';
                // $params['is_customer'] = 0;


                $params['phone'] =  null;
                $params['country_id'] =  14;
                $params['state_id'] = null;
                $params['city_id'] = null;
                $params['postcode'] =  null;
                $params['street_address'] = null;


                $response =  $this->SocialAuthRepository->store($params);
                $response_data = $response->getData(true);
            } else {
                $params['session_id'] = session()->get('cart_session');
                $params['email'] =  $social_user->getEmail();
                $params['google_id'] =  $social_user->getId();
                $response =  $this->SocialAuthRepository->login($params);
                $response_data = $response->getData(true);
            }

            if ($fromPage == 'checkout') {
                return view('customer.checkout', compact('setting', 'countries', 'pkey', 'response_data', 'tax'));
            } else {
                return redirect()->route('index')->with([
                    'response_data' => $response_data
                ]);
            }
        } catch (\Throwable $th) {
            Log::error('An error occurred in social Auth: ' . $th->getMessage(), ['exception' => $th]);
            if ($fromPage == 'checkout') {
                return redirect()->route('checkout');
            } elseif ($fromPage == 'register') {
                return redirect()->route('register');
            } else {
                return redirect()->route('login');
            }
        }
    }


    public function facebookRedirect(Request $request)
    {
        session()->put('from_page', $request->query('from'));
        if ($request->has('cart_session')) {
            session()->put('cart_session', $request->query('cart_session'));
        }
        return Socialite::driver('facebook')->redirect();
    }
    public function callbackFacebook()
    {
        $fromPage = session()->get('from_page');
        try {
            $setting = getSetting();
            $countries = $this->CountryRepository->all();
            $payment_methods = PaymentMethod::with('payment_config')->get();
            $pkey =  $payment_methods[0]->payment_config[0]->value;
            $social_user = Socialite::driver('facebook')->user();
            $tax = TaxRate::where('status', 1)->first();
            // Retrieve the 'from_page' from session

            $customer = Customer::where('facebook_id',  $social_user->getId())->first();
            if (!$customer) {
                $params['session_id'] = session()->get('cart_session');
                $params['first_name'] = $social_user->getName();
                $params['last_name'] =  '';
                $params['email'] =  $social_user->getEmail();
                $params['facebook_id'] =  $social_user->getId();
                $params['avatar'] = $social_user->getAvatar();
                $params['status'] = '1';
                // $params['is_customer'] = 0;


                $params['phone'] =  null;
                $params['country_id'] =  14;
                $params['state_id'] = null;
                $params['city_id'] = null;
                $params['postcode'] =  null;
                $params['street_address'] = null;


                $response =  $this->SocialAuthRepository->store($params);
                $response_data = $response->getData(true);
            } else {
                $params['session_id'] = session()->get('cart_session');
                $params['email'] =  $social_user->getEmail();
                $params['facebook_id'] =  $social_user->getId();
                $response =  $this->SocialAuthRepository->login($params);
                $response_data = $response->getData(true);
            }




            if ($fromPage == 'checkout') {
                return view('customer.checkout', compact('setting', 'countries', 'pkey', 'response_data', 'tax'));
            } else {
                return redirect()->route('index')->with([
                    'response_data' => $response_data
                ]);
            }
        } catch (\Throwable $th) {
            Log::error('An error occurred in social Auth: ' . $th->getMessage(), ['exception' => $th]);
            if ($fromPage == 'checkout') {
                return redirect()->route('checkout');
            } elseif ($fromPage == 'register') {
                return redirect()->route('register');
            } else {
                return redirect()->route('login');
            }
        }
    }
}
