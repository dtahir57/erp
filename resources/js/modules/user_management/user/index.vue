<template>
	<div class="user">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Manage Users</h3>
					</div>
					<div class="card-body">
						<div class="card">
							<div class="table-responsive">
								<table class="table table-hover table-outline table-vcenter text-nowrap card-table">
									<thead>
										<tr>
											<td>Name</td>
											<td>Email</td>
											<td>Edit</td>
											<td>Delete</td>
											<th class="text-center"><i class="icon-settings"></i></th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="user in users" :key="user.index">
											<td>{{ user.name }}</td>
											<td>{{ user.email }}</td>
											<td style="width: 30px;">
												<button class="btn btn-success btn-sm" @click="editUser(user.id)">Edit</button>
											</td>
											<td style="width: 30px;">
												<button class="btn btn-danger btn-sm" @click="getUser(user.id)" data-toggle="modal" data-target="#deleteUserModal">Delete</button>
											</td>
											<td style="width: 30px;">
												<div class="item-action dropdown">
													<a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<router-link :to="{ name: 'AssignPermissions', params: {id: user.id}}" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Assign Permissions </router-link>
														<router-link :to="{ name: 'AssignRole', params: {id: user.id}}" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Assign Roles </router-link>
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<!-- Modal Starts Here -->
							<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          
							        </button>
							      </div>
							      <div class="modal-body">
							        <h5>Are you sure you want to delete this User?</h5>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        <button type="button" class="btn btn-danger" @click="destroy(get_user.id)" data-dismiss="modal">OK</button>
							      </div>
							    </div>
							  </div>
							</div>
							<!-- Modal Ends Here -->
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card" v-show="!is_edit_mode">
					<div class="card-header">
						<h3 class="card-title">Add New User</h3>
					</div>
					<div class="card-body">
						<div v-if="this.errors">
							<div v-for="error in errors" :key="error.index">
								<p class="text-danger">{{ error[0] }}</p>
							</div>
						</div>
						<div class="form-group">
							<label class="form-label">Name</label>
							<input type="text" name="name" placeholder="Name" v-model="name" class="form-control" />
						</div>
						<div class="form-group">
							<label class="form-label">Email</label>
							<input type="email" name="email" placeholder="Email" v-model="email" class="form-control" />
						</div>
						<div class="form-group">
							<button class="btn btn-success btn-block" @click="save">Save</button>
						</div>
					</div>
				</div> <!-- /.card -->
				<div class="card" v-show="is_edit_mode">
					<div class="card-header">
						<h3 class="card-title">Edit User</h3>
					</div>
					<div class="card-body">
						<div v-if="this.errors">
							<div v-for="error in errors" :key="error.index">
								<p class="text-danger">{{ error[0] }}</p>
							</div>
						</div>
						<div class="form-group">
							<label class="form-label">Name</label>
							<input type="text" name="name" placeholder="Name" v-model="user.name" class="form-control" />
						</div>
						<div class="form-group">
							<label class="form-label">Email</label>
							<input type="email" name="email" placeholder="Email" v-model="user.email" class="form-control" />
						</div>
						<div class="form-group">
							<button class="btn btn-success btn-block" @click="update(user.id)">Update</button>
						</div>
					</div>
				</div> <!-- /.card -->
			</div>
		</div>
	</div>
</template>
<script>
// import Base_URL from '../../../api/index.js'

export default {
	name: 'User',
	data () {
		return {
			users: [],
			name: '',
			email: '',
			errors: [],
			is_edit_mode: false,
			user: {},
			get_user: {}
		}
	},
	methods: {
		save () {
			let uri = '/api/user';
			axios.post(uri, {
				name: this.name,
				email: this.email,
				password: this.password,
				password_confirmation: this.password_confirmation
			}).then(response => {
				this.users = response.data
				this.name = '',
				this.email = '',
				this.errors = []
			}).catch(error => {
				this.errors = error.response.data.errors
				console.log(error.response.data.errors)
			})
		},
		destroy (id) {
			let uri = '/api/user/'+id;
			axios.delete(uri).then(response => {
				// console.log(response)
				this.users = response.data
			}).catch(error => {
				console.log(error.response.data)
			}) 
		},
		editUser (id) {
			this.is_edit_mode = true
			let uri = '/api/user/'+id+'/edit';
			axios.get(uri).then(response => {
				console.log(response.data)
				this.user = response.data
			}).catch(error => {
				console.log(error.response.data)
			})
		},
		getUser(id) {
			let uri = '/api/user/'+id;
			axios.get(uri).then(response => {
				this.get_user = response.data
			}).catch(error => {
				console.log(error.response)
			})
		},
		update (id) {
			let uri = '/api/user/'+id;
			axios.patch(uri, {
				name: this.user.name,
				email: this.user.email,
			}).then(response => {
				this.users = response.data
			}).catch(error => {
				this.errors = error.response.data.errors
				console.log(error.response.data.errors)
			})
			this.is_edit_mode = false
		}
	},
	created () {
		let uri = '/api/users';
		axios.get(uri).then(response => {
			this.users = response.data
		}).catch(error => {
			console.log(error)
		});
	}
}
</script>