<template>
   <a :href="userUrl">
       newly registered user: {{ unread.data.user.name }} user id: {{ unread.data.user.id }}
   </a>
</template>

<script>

export default {
   props:['unread'],
   data(){
     return{
        userUrl:""
     }
   },
   mounted(){
    this.userUrl = "/admin/user/profile/"+this.unread.data.user.id
   }
}
</script>
