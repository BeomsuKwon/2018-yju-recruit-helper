<template>
    <div class="main-con">
            <div>
               사용자 관리
            </div>
            <div>
                학생 관리
            </div>
            <div>
               면접 스케줄
            </div>
            <div>
                기업 선호도
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
       grid-template-columns: 1fr 1fr;
       grid-column-gap: 10px;
       grid-row-gap: 10px;
       height: 85vh;
       padding: 2%
   }
    .main-con div{
        padding: 5%;
        background:rgb(70, 223, 138);
        display: flex;
        align-items: center;
        font-size : 4em;
        transition: 0.5s;    
        cursor:pointer;

    }
    .main-con div:hover{
        background: rgb(49, 155, 84);
        color : white;
        font-size: 4.5em;
        
    }

</style>