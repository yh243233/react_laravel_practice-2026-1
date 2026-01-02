<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    protected function users(){
        $response = User::all();
        return $response;
    }

    protected function login(Request $request){

        Log::info('ログインリクエストを受信しました', $request->all());
        Log::debug('ログイン処理を行います。');
        Log::debug("リクエスト内容".$request);
        $loginUser = User::where('email',$request['email'])->first();
        Log::debug("検索結果".$loginUser);

        if ($request['email'] === $loginUser->email) {
            Log::debug("メールアドレスが一致しました");
        }

        if (Hash::check($request['password'], $loginUser->password)) {
            Log::debug("パスワードが一致しました");
        }

        //TODO:ログイン情報が存在しない場合に「$loginUser->email」部分でエラーが出る。
        if($request['email'] === $loginUser->email && Hash::check($request['password'],$loginUser->password)){
            Log::debug("条件が合致しました");
            return response()->json([
                'success' => true,
                'results' => [
                    'id' => $loginUser->id,
                    'name' => $loginUser->name,
                    'email' => $loginUser->email,
                ],
            ], 200);
        }else{
            Log::debug("条件に合致しませんでした");
            return response()->json(false);
        };
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return response()->json(['message' => 'ログイン成功']);
    //     }

    //     return response()->json(['error' => 'Invalid credentials'], 401);
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'ログアウト成功']);
    }

    public function user(Request $request)
    {
        return response()->json(Auth::user());
    }
}

