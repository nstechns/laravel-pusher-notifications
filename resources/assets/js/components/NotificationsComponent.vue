<template>
  <li class="dropdown" @click="markNotificationAsRead">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
      <span class="glyphicon glyphicon-globe"></span> Notifcations <span class="badge">{{
        totalUnreadNotification
      }}</span>
    </a>

    <ul class="dropdown-menu" role="menu">
      <li v-if="unreadNotification.length > 0">
        <notification-item v-for="punread in unreadNotification" v-bind:key="punread.data.user.id"
                           :unread="punread"></notification-item>
      </li>
      <li v-else>
        <a href="javascript:;">No Notification is available</a>
      </li>
    </ul>

  </li>
</template>

<script>
import NotificationItem from './NotificationItem.vue';

export default {
  props: ['unreads', 'userid'],
  components: {NotificationItem},
  data() {
    return {
      unreadNotification: this.unreads,
      totalUnreadNotification: this.unreads.length
    }
  },
  methods: {
    markNotificationAsRead() {
      if (this.totalUnreadNotification) {
        axios.get('/admin/markasread');
        this.totalUnreadNotification = 0;
      }
    },
    showUserProfile(notify) {
      // If it's okay let's create a notification
      var notification = new Notification(notify.user.name + " is signup");
      notification.onclick = function (event) {
        event.preventDefault(); // prevent the browser from focusing the Notification's tab
        window.open('http://blog-notify.test/admin/user/profile/' + notify.user.id, '_blank');
      }

    }
  },
  mounted() {
    Notification.requestPermission().then(function (result) {
      console.log(result);
    });

    console.log('Component mounted.');
    console.log(this.userid);
    Echo.private('App.Admin.' + this.userid)
        .notification((notify) => {
          console.log(notify);
          let newUnreadNotification = {data: {admin: notify.admin, user: notify.user}};
          this.unreadNotification.push(newUnreadNotification);
          this.totalUnreadNotification++;
          if (!("Notification" in window)) {
            alert("This browser does not support desktop notification");
          }
          // Let's check whether notification permissions have already been granted
          else if (Notification.permission === "granted") {
            this.showUserProfile(notify);
          } else if (Notification.permission !== "denied") {
            Notification.requestPermission(function (permission) {
              // If the user accepts, let's create a notification
              if (permission === "granted") {
                this.showUserProfile(notify);
              }

            });
          }
        });
  }
}
</script>
