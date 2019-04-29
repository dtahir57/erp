<template>
  <div class="my-3 my-md-5">
    <div class="container">
			<card-component>
        <template slot="title">User Management System</template>
        <template slot="options">
          <router-link class="btn btn-primary btn-sm" to="/">Role & Permission</router-link>
          <router-link class="btn btn-primary btn-sm ml-2" to="/users">Users</router-link>
          <router-link class="btn btn-primary btn-sm ml-2" to="/teams">Teams</router-link>
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
    name: 'Permission',
    component: require('./permission_role/index').default
  },
  {
    path: '/permission/edit/:id',
    name: 'EditPermission',
    component: require('./permission_role/edit_permission').default
  },
  {
    path: '/role/edit/:id',
    name: 'EditRole',
    component: require('./permission_role/edit_role').default
  },
  {
    path: '/users',
    name: 'User',
    component: require('./user/index').default
  },
  {
    path: '/user/edit/:id',
    name: 'EditUser',
    component: require('./user/edit').default
  },
  {
    path: '/role/:id',
    name: 'AssignPermission',
    component: require('./permission_role/AssignPermission.vue').default
  },
  {
    path: '/user/assign_permissions/:id',
    name: 'AssignPermissions',
    component: require('./user/AssignPermission.vue').default
  },
  {
    path: '/user/assign_roles/:id',
    name: 'AssignRole',
    component: require('./user/AssignRole.vue').default
  },
  {
    path: '/teams',
    name: 'Team',
    component: require('./team/index.vue').default
  },
  {
    path: '/teams/assign_users/:id',
    name: 'AssignUser',
    component: require('./team/AssignUser.vue').default
  }
]  

const router = new VueRouter({
  routes
})

export default {
  router
}
</script>
