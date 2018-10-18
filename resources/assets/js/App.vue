<template>
    <div class="container">
        <div>
            <div id='login-form' v-if='login_data==null'>
                <div id="logo">
                    <span>JungPro.com</span>
                </div>
                <div>
                    로긴하쇼
                </div>
                <div>
                    <input v-model="user_id">
                </div>
                <div>
                    <input v-model="user_pw">
                </div>
                <div>
                    <button @click="login_register">로긴</button>
                    <router-link class="menu" :to="{name:'signup'}">
                    회원가입
                    </router-link>   
                </div>
            </div>
            <div v-else-if="login_data!=null">
                <transition name="fade">
                    <router-view></router-view>
                </transition>
            </div>
        </div>

        <div></div>
   
      
    </div>
</template>

<style>

    .fade-enter-active, .fade-leave-active {
      transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    }
</style>

<script>
     export default {
            mounted(){
                this.getCookie();
            },

            data(){
                return {
                    user_id : null,
                    user_pw : null,
                    login_data : null
                }
            },
            methods : {
                login_register: function(){
                    let url = "Auth/login"
                    let login_data = {
                        id : this.user_id,
                        password : this.user_pw
                    }
                    this.axios.post(url, login_data).then(response =>{
                        this.login_data = {
                            user_token : response.data._token,
                            user_name : response.data.user.id
                        }

                    })
                    this.setCookie("userinfo",this.login_data,7)
                },

                setCookie:function(name,value,time) {   //사용자 쿠키 값 저장
                    let date = new Date();
                    date.setTime(date.getTime() + time*24*60*60*1000);
                    document.cookie =  name + '=' + value + ';expires=' + date.toUTCString() + ';path=/';
                },

                getCookie:function(name) {              // 사용자 쿠키 값 불러오기
                    var value = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
                    return value? value[2] : null;
                },
            }
    }
</script>
<style>
        .container{
        display: grid;
        grid-template-rows: 1fr 1fr 1fr;
        margin: auto;
        background: rgb(235, 235, 235);
        height: 100vh;
    }
    #logo{
        text-align: center;
        font-size: 7em;
    }
    #login-form{
        width: 30vw;
        margin: auto;

    }
    #login-form div{
        margin: auto;
    }
    #menu-form{
        width: 50vw;
        margin: auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        text-align: center;
        cursor: pointer;
        grid-row-gap: 1vw;
        grid-column-gap: 1vw;
    }
    #menu-form div{
        height: 30vh;
        display: flex;
        background: rgb(106, 106, 126);
        transition: 0.5s;
        align-items: center;
    }
    #menu-form div:hover{
        background: rgb(56, 56, 241);
    }
</style>
