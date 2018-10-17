<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    const FAILED    = 0;
    const SUCCESS   = 1;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'password'
    ];

    public $timestamps = false;

    /**
     * 유저 데이터 검사
     * 
     * @param String $id        로그인 아이디.
     * @param String $password  로그인 비밀번호.
     * 
     * @return Integer 유효한 값일 경우 유저의 이름, 유효하지 않을 경우 1
     */
    public function validate(String $id, String $password)
    {
        // 전달 받은 유저 정보로 특정 유저의 비밀번호 조회.
        $user = User::where('name', $id)->first();

        // 가져온 비밀번호가 입력된 비밀번호와 같을 때.
        if ($user->password === $password)
            return self::SUCCESS;

        // 실패 반환.
        return self::FAILED;
    }

    /**
     * 유저 등록
     * 
     * @param String $name      로그인 아이디
     * @param String $password  로그인 비밀번호
     * 
     * @return Integer 등록 성공 시 0
     * 
     * @throws Illuminate\Database\QueryException
     */
    public function register(String $name, String $password)
    {
        User::create([
            'name'      => $name,
            'password'  => $password
        ])->save();

        return self::SUCCESS;
    }
}
