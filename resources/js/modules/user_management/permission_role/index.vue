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
				  <div class="card-body" v-show="permission_tab">
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
	    								<td style="width: 30px;">
	    									<button class="btn btn-success btn-sm" @click="editPermissionMode(permission.id)">Edit</button>
	    								</td>
	    								<td style="width: 30px;"><button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePermissionModal" @click="getPermission(permission.id)">Delete</button></td>
	    							</tr>
	    						</tbody>
	    					</table>
	    				</div>
	    				<!-- Modal Starts Here -->
	    				<div class="modal fade" id="deletePermissionModal" tabindex="-1" role="dialog" aria-labelledby="deletePermissionModalLabel" aria-hidden="true">
	    				  <div class="modal-dialog" role="document">
	    				    <div class="modal-content">
	    				      <div class="modal-header">
	    				        <h5 class="modal-title" id="deletePermissionModalLabel">Delete Permission</h5>
	    				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	    				          
	    				        </button>
	    				      </div>
	    				      <div class="modal-body">
	    				        <h5>Are you sure you want to delete this Permission?</h5>
	    				      </div>
	    				      <div class="modal-footer">
	    				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    				        <button type="button" class="btn btn-danger" @click="deletePermission(permission.id)" data-dismiss="modal">OK</button>
	    				      </div>
	    				    </div>
	    				  </div>
	    				</div>
	    				<!-- Modal Ends Here -->
	    			</div>
				  </div>
				  <div class="card-body" v-show="role_tab">
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
        								<td style="width: 30px;">
											<button class="btn btn-success btn-sm" @click="editRoleMode(role.id)">Edit</button>
        								</td>
        								<td style="width: 30px;">
											<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteRoleModal" @click="getRole(role.id)">Delete</button>
        								</td>
        							</tr>
        						</tbody>
        					</table>
        				</div>
        				<!-- Modal Starts Here -->
        				<div class="modal fade" id="deleteRoleModal" tabindex="-1" role="dialog" aria-labelledby="deleteRoleModalLabel" aria-hidden="true">
        				  <div class="modal-dialog" role="document">
        				    <div class="modal-content">
        				      <div class="modal-header">
        				        <h5 class="modal-title" id="deleteRoleModalLabel">Delete Role</h5>
        				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        				          
        				        </button>
        				      </div>
        				      <div class="modal-body">
        				        <h5>Are you sure you want to delete this Role?</h5>
        				      </div>
        				      <div class="modal-footer">
        				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        				        <button type="button" class="btn btn-danger" @click="deleteRole(role.id)" data-dismiss="modal">OK</button>
        				      </div>
        				    </div>
        				  </div>
        				</div>
        				<!-- Modal Ends Here -->
        			</div>
				  </div>
				  <div class="card-footer">
				    This is standard card footer
				  </div>
				</div>
			</div><!-- /.col-md-8 --> 
			<div class="col-md-4">
				<!-- Permission Create Form Starts here -->
				<div class="card" v-show="permission_create_form">
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
							<button :class="[btn_loading ? 'btn-loading' : '','btn', 'btn-success', 'btn-block']" @click="savePermission">Save</button>
						</div>
					</div>
				</div>
				<!-- Permission Create Form Ends here -->

				<!-- Edit Permission Starts From here -->
				<div class="card" v-show="edit_permission">
					<div class="card-header">
						<h3 class="card-header">Edit Permission</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label class="form-label">Name</label>
							<input type="text" name="name" class="form-control" v-model="permission.name" />
						</div>
						<div class="form-group">
							<button class="btn btn-success btn-block" @click="updatePermission(permission.id)">Update</button>
						</div>
					</div>
				</div>
				<!-- Edit Permission Mode Ends Here -->

				<!-- Role Create Form Starts From Here -->
				<div class="card" v-show="role_create_form">
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
				<!-- Role Create Form Ends Here -->

				<div class="card" v-show="edit_role">
					<div class="card-header">
						<h3 class="card-header">Edit Role</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label class="form-label">Name</label>
							<input type="text" name="name" class="form-control" v-model="role.name" />
						</div>
						<div class="form-group">
							<button class="btn btn-success btn-block" @click="updateRole(role.id)">Update</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
// import Base_URL from '../../../api/index.js'
	export default {
		name: 'Permission',
		data () {
			return {
				permission_tab: true,
				permission_create_form: true,
				role_tab: false,
				role_create_form: false,
				edit_permission: false,
				edit_role: false,
				permissions: [],
				roles: [],
				permission_name: '',
				role_name: '',
				permission_error: false,
				role_error: false,
				btn_loading: false,
				permission: {},
				role: {}
			}
		},
		methods: {
			openPermissionTab() {
				this.permission_tab = true
				this.permission_create_form = true
				this.role_tab = false
				this.role_create_form = false
				this.edit_permission = false
				this.edit_role = false
			},
			openRoleTab () {
				this.permission_tab = false
				this.permission_create_form = false
				this.role_tab = true
				this.role_create_form = true
				this.edit_permission = false
				this.edit_role = false
			},
			savePermission () {
				if (!this.permission_name) {
					this.permission_error = true
				} else {
					this.permission_error = false
					this.btn_loading = true
					axios.post('/api/permission', {
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
			editPermissionMode(id) {
				this.permission_tab = true
				this.permission_create_form = false
				this.role_tab = false
				this.role_create_form = false
				this.edit_permission = true
				this.edit_role = false

				let uri = 'api/permission/'+id+'/edit';
				axios.get(uri).then(response => {
					this.permission = response.data.permission
				}).catch(error => {
					console.log(error)
				});
			},
			updatePermission(id) {
				let uri = 'api/permission/'+id;
				axios.patch(uri, this.permission).then(response => {
					this.permissions = response.data
				}).catch(error => {
					console.log(error.response.data);
				})
				this.permission_tab = true
				this.permission_create_form = true
				this.role_tab = false
				this.role_create_form = false
				this.edit_permission = false
				this.edit_role = false
			},
			getPermission (id) {
				let uri = 'api/permission/'+id+'/edit';
				axios.get(uri).then(response => {
					this.permission = response.data.permission
				}).catch(error => {
					console.log(error)
				});
			},
			deletePermission (id) {
				let uri = 'api/permission/'+id
				axios.delete(uri).then(response => {
					this.permissions = response.data
				}).catch(error => {
					console.log(error)
				})
			},
			saveRole () {
				if (this.role_name) {
					this.role_error = false
					axios.post('api/role', {
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
			editRoleMode (id) {
				this.permission_tab = false
				this.permission_create_form = false
				this.role_tab = true
				this.role_create_form = false
				this.edit_permission = false
				this.edit_role = true

				let uri = 'api/role/'+id+'/edit';
				axios.get(uri).then(response => {
					this.role = response.data.role
				}).catch(error => {
					console.log(error)
				});
			},
			getRole(id) {
				let uri = 'api/role/'+id+'/edit';
				axios.get(uri).then(response => {
					this.role = response.data.role
				}).catch(error => {
					console.log(error)
				});
			},
			updateRole (id) {
				let uri = 'api/role/'+id;
				console.log(uri)
				axios.patch(uri, this.role).then(response => {
					this.roles = response.data
				}).catch(error => {
					console.log(error.response.data);
				})
				this.permission_tab = false
				this.permission_create_form = false
				this.role_tab = true
				this.role_create_form = true
				this.edit_permission = false
				this.edit_role = false
			},
			deleteRole (id) {
				let uri = 'api/role/'+id
				axios.delete(uri).then(response => {
					this.roles = response.data
				}).catch(error => {
					console.log(error)
				})

			}
		},
		created () {
			axios.get('/api/permissions').then(response => {
				this.permissions = response.data
			}).catch(error => {
				console.log(error)
			});

			axios.get('/api/roles').then(response => {
				this.roles = response.data
			}).catch(error => {
				console.log(error)
			});
		}
	}
</script>