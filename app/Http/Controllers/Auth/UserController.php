<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;

class UserController extends Controller
{
    const FAILED    = 0;
    const SUCCESS   = 1;

    private $user;

    function __construct() 
    {
        // User 모델 변수 초기화.
        $this->user = new User();
    }

    /**
     * 로그인 함수
     * 
     * form-data 형식
     * id           유저 ID
     * password     유저 PW
     * 
     * @param  Request $request
     * 
     * @return Integer 로그인 성공 시 세션 반환, 실패 시 0
     */
    public function login(Request $req)
    {   
        $user_id = $req->input('id');
        $user_pw = $req->input('password');

        // 입력값 검사
        if ($this->user->validate($user_id, $user_pw)) {
            // 세션에 유저 데이터 저장.

            // [1] 세션 변수 초기화.
            $session = $req->session();

            // [2] 세션 상태 검사.
            if (!$session->isStarted()) {
                $session->start();
            }

            // [3] 세션에 유저 데이터 저장.
            if ($session->has('user'))
                $session->forget('user');

            $session->put('user', ['id' => $user_id]);

            return $session->all();
        }

        // 로그인 실패 시
        return self::FAILED;
    }

    /**
     * 회원 가입
     * 
     * form-data 형식
     * id           유저 ID
     * password     유저 PW
     * 
     * @param  Request $request
     * 
     * @return Integer 로그인 성공 시 1, 실패 시 0
     */
    public function register(Request $req)
    {
        $user_id = $req->input('id');
        $user_pw = $req->input('password');

        if ($this->user->register($user_id, $user_pw)) {

            return self::SUCCESS;
        }

        return self::FAILED;
    }
}
