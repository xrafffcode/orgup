<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Otp;
use App\Models\User;
use App\Notifications\SendOtpNotification;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert as Swal;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Displays the register view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.auth.register');
    }

    /**
     * Submits the registration form.
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     */
    public function store(RegisterRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);

        $this->beginTransaction();

        try {
            $user = User::create($data);

            $user->student()->create($data);

            $user->assignRole('student');

            $otp = $this->generateOtp($user);

            $user->notify(new SendOtpNotification($otp->otp));

            $this->commit();

            return redirect()->route('verification');
        } catch (\Exception $e) {
            $this->rollBack();

            throw $e;

            Swal::toast($e->getMessage(), 'error');

            return redirect()->back();
        }
    }

    /**
     * Displays the verification view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function verification()
    {
        return view('pages.auth.verification');
    }

    /**
     * Checks if the otp is valid.
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function verify(Request $request)
    {
        $otp = Otp::where('otp', $request->otp)->where('expired_at', '>=', now())->first();

        if ($otp) {
            $user = User::find($otp->user_id);

            $user->update(['email_verified_at' => now()]);

            $otp->delete();

            Auth::login($user);

            Swal::toast('Akun anda telah terverifikasi', 'success');

            return redirect()->route('app.landing');
        }

        return back()->withErrors(['otp' => 'Kode OTP yang anda masukkan tidak sesuai.']);
    }

    public function generateOtp($user)
    {
        $otp = new Otp();

        $otp->user_id = $user->id;
        $otp->otp = rand(100000, 999999);
        $otp->expired_at = now()->addMinutes(5);

        $otp->save();

        return $otp;
    }
}
