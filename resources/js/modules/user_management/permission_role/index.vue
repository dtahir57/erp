<template>
	<div class="permission">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
				  <div class="card-header">
				    <h3 class="card-title">Manage Permission & Role</h3>
				    <div class="card-options">
				        <a href="#" class="btn btn-primary btn-sm" @click="openPermissionTab">Permissions</a>
				        <a href="#" class="btn btn-primary btn-sm ml-2" @click="openRoleTab">Roles</a>
				    </div>
				  </div>
				  <div class="card-body" v-show="is_permission">
				    <div class="card">
	    				<div class="table-responsive">
	    					<table class="table table-hover table-outline table-vcenter text-nowrap card-table">
	    						<thead>
	    							<tr>
	    								<td>Permission Name</td>
	    								<td>Edit</td>
	    								<td>Delete</td>
	    							</tr>
	    						</thead>
	    						<tbody>
	    							<tr v-for="permission in permissions" :key="permission.index">
	    								<td>{{ permission.name }}</td>
	    								<td>
	    									<router-link :to="{ name: 'EditPermission', params: {id: permission.id}}" class="btn btn-success">Edit</router-link>
	    								</td>
	    								<td><button class="btn btn-danger" @click="deletePermission(permission.id)">Delete</button></td>
	    							</tr>
	    						</tbody>
	    					</table>
	    				</div>
	    			</div>
				  </div>
				  <div class="card-body" v-show="is_role">
    			    <div class="card">
        				<div class="table-responsive">
        					<table class="table table-hover table-outline table-vcenter text-nowrap card-table">
        						<thead>
        							<tr>
        								<td>Role Name</td>
        								<td>Edit</td>
        								<td>Delete</td>
        							</tr>
        						</thead>
        						<tbody>
        							<tr v-for="role in roles" :key="role.index">
        								<td>{{ role.name }}</td>
        								<td>
											<router-link :to="{ name: 'EditRole', params: {id: role.id}}" class="btn btn-success">Edit</router-link>
        								</td>
        								<td>
											<button class="btn btn-danger" @click="deleteRole(role.id)">Delete</button>
        								</td>
        							</tr>
        						</tbody>
        					</table>
        				</div>
        			</div>
				  </div>
				  <div class="card-footer">
				    This is standard card footer
				  </div>
				</div>
			</div><!-- /.col-md-8 --> 
			<div class="col-md-4">
				<div class="card" v-show="is_permission">
					<div class="card-header">
						<h3 class="card-header">Create New Permission</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label class="form-label">Permission Name</label>
							<input type="text" name="name" placeholder="Permisson Name" class="form-control" v-model="permission_name" @keyup.enter="savePermission" />
							<p class="text-danger" v-show="permission_error">Name Field is required</p>
						</div>
						<div class="form-group">
							<button :class="[this.btn_loading ? 'btn-loading' : '','btn', 'btn-success', 'btn-block']" @click="savePermission">Save</button>
						</div>
					</div>
				</div>
				<div class="card" v-show="is_role">
					<div class="card-header">
						<h3 class="card-header">Create New Role</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label class="form-label">Role Name</label>
							<input type="text" name="name" placeholder="Role Name" v-model="role_name" class="form-control" @keyup.enter="saveRole" />
							<p class="text-danger" v-show="role_error">Name Field is required</p>
						</div>
						<div class="form-group">
							<button class="btn btn-success btn-block" @click="saveRole">Save</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import Base_URL from '../../../api/index.js'
	export default {
		name: 'Permission',
		data () {
			return {
				is_permission: true,
				is_role: false,
				permissions: [],
				roles: [],
				permission_name: '',
				role_name: '',
				permission_error: false,
				role_error: false,
				btn_loading: false
			}
		},
		methods: {
			openPermissionTab() {
				this.is_permission = true
				this.is_role = false
			},
			openRoleTab () {
				this.is_permission = false
				this.is_role = true
			},
			savePermission () {
				if (!this.permission_name) {
					this.permission_error = true
				} else {
					this.permission_error = false
					this.btn_loading = true
					axios.post(Base_URL+'/api/permission', {
						name: this.permission_name
					}).then(response => {
						this.permissions = response.data
					}).catch(errors => {
						console.log(errors)
						this.role_errors = errors
					})
					this.btn_loading = false
					this.permission_name = ''
				}
			},
			deletePermission (id) {
				let uri = Base_URL+'api/permission/'+id
				axios.delete(uri).then(response => {
					this.permissions = response.data
				}).catch(error => {
					console.log(error)
				})
			},
			saveRole () {
				if (this.role_name) {
					this.role_error = false
					axios.post(Base_URL+'api/role', {
						name: this.role_name
					}).then(response => {
						this.roles = response.data
					}).catch(error => {
						console.log(error)
					})
					this.role_name = ''
				} else {
					this.role_error = true
				}
			},
			deleteRole (id) {
				let uri = Base_URL+'api/role/'+id
				axios.delete(uri).then(response => {
					this.roles = response.data
				}).catch(error => {
					console.log(error)
				})

			}
		},
		created () {
			axios.get(Base_URL+'/api/permissions').then(response => {
				this.permissions = response.data
			}).catch(error => {
				console.log(error)
			});

			axios.get(Base_URL+'/api/roles').then(response => {
				this.roles = response.data
			}).catch(error => {
				console.log(error)
			});
		}
	}
</script>