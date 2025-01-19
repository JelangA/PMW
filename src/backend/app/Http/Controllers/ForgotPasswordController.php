<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Mail;
	use Illuminate\Support\Facades\Cache;
	use App\Models\User;
	use App\Helpers\ResponseFormatter;
	use Random\RandomException;
	
	class ForgotPasswordController extends Controller
	{

		/**
		 * @throws RandomException
		 */
		public function sendOtp(Request $request)
		{
			$request->validate([
				'email' => 'required|email|exists:users,email',
			]);
			
			$email = $request->email;
			$otp = random_int(100000, 999999); // Generate OTP 6 digit
			
			// otp disimpan di cache selama 5 menit
			Cache::put("otp_{$email}", $otp, now()->addMinutes(5));
			
			// Kirim email ke user
			Mail::raw("Your OTP code is: $otp", function ($message) use ($email) {
				$message->to($email)
					->subject('Forgot Password OTP');
			});
			
			return ResponseFormatter::createAPI(
				200,
				'success',
				'OTP sent to your email.',
				null
			);
		}
		
		// Verifikasi OTP dan reset password
		public function changePassword(Request $request)
		{
			$request->validate([
				'email' => 'required|email|exists:users,email',
				'otp' => 'required|numeric',
				'new_password' => 'required|string|min:8|confirmed',
			]);
			
			$email = $request->email;
			$otp = $request->otp;
			
			// Periksa OTP di cache
			$cachedOtp = Cache::get("otp_{$email}");
			
			if (!$cachedOtp || $cachedOtp != $otp) {
				return ResponseFormatter::createAPI(
					400,
					'error',
					'Invalid or expired OTP.',
					null
				);
			}
			
			// Update password user
			$user = User::where('email', $email)->first();
			$user->password = bcrypt($request->new_password);
			$user->save();
			
			// Hapus OTP dari cache
			Cache::forget("otp_{$email}");
			
			return ResponseFormatter::createAPI(
				200,
				'success',
				'Password updated successfully.',
				null
			);
		}
	}
