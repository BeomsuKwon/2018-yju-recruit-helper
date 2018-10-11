<template>
    <div class="container">
        <div id="logo">
            <span>JungPro.com</span>
        </div>

        <div>
            <div id='login-form'>
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
            <!-- <div id='menu-form'>
                    <div>
                        사용자관리
                    </div>
                    <div>
                        학생관리
                    </div>
                    <div>
                        면접스케쥴
                    </div>
                    <div>
                        기업별 선호도
                    </div>
            </div>  -->
        </div>

        <div></div>
   
    </div>
</template>

<script>
    export default {
        data(){
            return {
                user_id : '',
                user_pw : ''
            }
        },
        methods : {
            login_register:function(){
                let url = "/login"
                let login_data = {
                    email : this.user_id,
                    password : this.user_pw
                }
                this.axios.post(url, login_data).then(response =>{
                    console.log(response.data)
                })
            }
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
        display: grid;
        grid-template-rows: 1fr 1fr 1fr 1fr;
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