<template>
  <div class="my-3 my-md-5">
    <div class="container">
			<card-component>
        <template slot="title">Laxyo Mission Control</template>
        <template slot="options">
          <router-link class="btn btn-primary btn-sm" to="/">Home</router-link>
          <router-link class="btn btn-secondary btn-sm ml-2" to="/tasks">Tasks</router-link>
          <router-link class="btn btn-secondary btn-sm ml-2" to="/posts">Posts</router-link>
          <router-link class="btn btn-secondary btn-sm ml-2" to="/schedules">Schedules</router-link>
          <router-link class="btn btn-secondary btn-sm ml-2" to="/docs">Docs</router-link>
          <router-link class="btn btn-secondary btn-sm ml-2" to="/checkins">Check-ins</router-link>
          <router-link class="btn btn-secondary btn-sm ml-2" to="/chats">Chats</router-link>
        </template>
        <template slot="body">
          <router-view></router-view>
        </template>
			</card-component>
    </div>
  </div>
</template>

<script>
import VueRouter from 'vue-router'
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: require('./admin/Home.vue').default
  },
  {
    path: '/tasks',
    name: 'Task',
    component: require('./admin/ManageTasks.vue').default
  },
  {
    path: '/posts',
    name: 'Post',
    component: require('./admin/ManagePosts.vue').default
  },
  {
    path: '/schedules',
    name: 'Schedule',
    component: require('./admin/ManageSchedules.vue').default
  },
  {
    path: '/docs',
    name: 'Doc',
    component: require('./admin/ManageDocs.vue').default
  },
  {
    path: '/checkins',
    name: 'Checkin',
    component: require('./admin/ManageCheckins.vue').default
  },
  {
    path: '/chats',
    name: 'Chat',
    component: require('./admin/ManageChats.vue').default
  }
]  

const router = new VueRouter({
  routes
})

export default {
  router
}
</script>
