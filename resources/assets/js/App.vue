<template>
    <div class="container">
            <header>
                 <span>JUNGPRO</span>
                 <button @click=logout>logout</button>
            </header>
            <section>
                <div class="section-Parent">
                    <div id='login-form' v-if='login_data==null'>
                        <div>
                            <input v-model="user_id">
                        </div>
                        <div>
                            <input v-model="user_pw" v-on:keyup.enter="login_register">
                        </div>
                        <div>
                            <button @click="login_register" v-on:keyup.enter="login_register">로긴</button>
                        </div>
                    </div>
                    <div v-else-if="login_data!=null">
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
                 this.login_stauts();
            },   
            data(){
                return {
                    user_id : null,
                    user_pw : null,
                    login_data : null,
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
                            user_token  : response.data._token,
                            user_name   : response.data.user.id
                           
                        } 
                         this.$cookie.set('userinfo', JSON.stringify(this.login_data.user_token),7)
                         this.user_id=null;
                         this.user_pw=null;
                    })
                  
                 
                },
                login_stauts : function(){ //로그인 인증 절차
                    let url = "Auth/니가채우셈" 
                    let user_key = {
                        너가바꾸셈 : this.$cookie.get('userinfo')
                    }
                    if(this.$cookie.get('userinfo')!=null){
                        this.axios.post(url,user_key).then(respones=>{
                         this.login_data = {
                            user_token  : response.data._token,
                            user_name   : response.data.user.id
                        }    
                        })
                    
                    }else{
                          this.login_data=null;
                    }
                },
                logout : function(){
                    this.login_data=null
                    this.$cookie.delete('userinfo')
                    
                }

            }
    }
</script>
