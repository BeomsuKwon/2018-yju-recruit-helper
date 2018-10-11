<template>
   
    <div class="page-layout">
         <div class="text-layout"> 
             <span>
                 회원 가입
             </span>
            </div>
            <div class="signup-layout">
                <div>
                <input type="text"
                    placeholder="アカウントを入力して下さい">
                </div>
                <div>
                <input type="password"
                    placeholder="パスワードを入力して下さい">
                </div>
                <div>
                    <button>가입완료!</button>
                </div>
            </div>
        <div class="text-layout"></div>
    </div>
    
    
</template>
<script>
export default {
    
}
</script>
<style scoped>
    .page-layout{
        height: 100vh;
        display: grid;
        grid-template-rows: 1fr 1fr 1fr;
        width: 50vw;
        margin: auto;   
        background: red;
    }
    .text-layout{
        text-align: center;
        display: flex;
        align-items: center;
    }
    .signup-layout{
        display: grid;
        grid-template-rows: 1fr 1fr 1fr;
    }
    .text-layout span{
        margin:auto;
    }
</style>