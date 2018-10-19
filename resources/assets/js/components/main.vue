<template>
    <div class="main-con">
            <div class="menu-view-con-1">
                <router-link class="menu" :to="{name:'userCRMD'}">
                    <div class="sub-menu-con">
                        <span>사용자 관리</span>
                    </div>
                </router-link>
                <router-link class="menu" :to="{name:'studentCRMD'}">
                    <div class="sub-menu-con">
                        <span>학생 관리</span>
                    </div>
                </router-link>
            </div>
            <div class="menu-view-con-2">
                <router-link class="menu" :to="{name:'companySchedule'}">
                    <div class="sub-menu-con">
                        <span>기업 스케쥴 / 선호도</span>
                    </div>
                </router-link>
            </div>
    </div>
</template>

<script>
    export default {
    }
</script>
<style scoped>
   .main-con{
       display: grid;
       grid-template-rows: 1fr 1fr;
       grid-row-gap: 10px;
       height: 85vh;
       padding: 2%
   }
   .menu-view-con-1{
       display: grid;
       grid-template-columns: 1fr 1fr;
       grid-column-gap: 10px;   
   }
   .menu-view-con-2{
        display: grid;
        grid-template-columns: 1fr
   }
   .sub-menu-con{
       background: rgb(43, 189, 79);
       display: flex;
       align-items: center;
       cursor: pointer;
       height: 100%;
   }
    .sub-menu-con > span{
        font-size: 3em;
        padding: 5%;
        transition: 0.3s;
        width: 100%;
    }
    .sub-menu-con:hover span{
        font-size: 4em;
        color: white;
    
    }
    .menu{
        color : black;
        height: 100%;
        text-decoration:none
    }

</style>