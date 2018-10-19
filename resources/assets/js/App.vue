<template>
    <div class="container">
            <header>
                 <span>JUNGPRO</span>
                 
            </header>
            <section>
                <div class="section-Parent">
                    <!-- <div id='login-form' v-if='login_data==null'>
                        <div id="logo">
                            <span>JUNGPRO</span>
                        </div>
                        <div>
                            <input v-model="user_id">
                        </div>
                        <div>
                            <input v-model="user_pw">
                        </div>
                        <div>
                            <button @click="login_register">로긴</button>
                        </div>
                    </div>
                    <div v-else-if="login_data!=null">
                        <transition name="fade">
                            <router-view></router-view>
                        </transition>
                    </div> -->
                     <div>
                        <transition name="fade">
                            <router-view></router-view>
                        </transition>
                    </div>
                </div>
            </section>
    </div>
</template>

<style scoped>
    @import url("https://fonts.googleapis.com/css?family=Krub");

    body{
        background-color: rgb(240, 240, 240);
    }
    .fade-enter-active, .fade-leave-active {
      transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    }
    .container{
        display: grid;
        grid-template-rows: 8% 92%;
        margin: auto;
        width: 100vw;
        height: 100vh;
    }
    header{
        display: flex;
        align-items: center;
        border-bottom: 1.5px solid rgb(204, 204, 204);
    }
    header > span{
        margin-left: 30px;
        font-family: 'Krub', sans-serif;
        font-size: 2em;
    }
    footer{
        background: red;
    }
    .section-Parent{
        margin: auto;
        width: 70vw;
    }
    .section-Parent div{
        margin: auto;
    }

</style>

<script>
     export default {
            mounted(){
                
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
                    this.setCookie(userinfo,this.login_data,7)
                },
                // login_stauts : function(){ //로그인 인증 절차
                //     let url = "Auth/login"
                //     let login_data = {
                //         user_key : this.getCookie('user_key')
                //     }
                //     if(this.getCookie('user_key')!=null){
                //         this.axios.post(url,key).then(respones=>{
                //         this.login_status = respones.data;    
                //         })
                //     }else{
                //         this.login_status=false;
                //     }
                // },

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
