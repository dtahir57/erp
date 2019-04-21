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
										</tr>
									</thead>
									<tbody>
										<tr v-for="user in users" :key="user.index">
											<td>{{ user.name }}</td>
											<td>{{ user.email }}</td>
											<td style="width: 30px;">
												<router-link :to="{ name: 'EditUser', params: {id: user.id} }" class="btn btn-success btn-sm">Edit</router-link>
											</td>
											<td style="width: 30px;">
												<button class="btn btn-danger btn-sm" @click="destroy(user.id)">Delete</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
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
							<label class="form-label">Password</label>
							<input type="password" name="password" placeholder="Password" v-model="password" class="form-control" />
						</div>
						<div class="form-group">
							<label class="form-label">Name</label>
							<input type="password" name="password_confirmation" placeholder="Confirm Password" v-model="password_confirmation" class="form-control" />
						</div>
						<div class="form-group">
							<button class="btn btn-success btn-block" @click="save">Save</button>
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
	name: 'User',
	data () {
		return {
			users: [],
			name: '',
			email: '',
			password: '',
			password_confirmation: '',
			errors: []
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
			}).catch(error => {
				this.errors = error.response.data.errors
				console.log(error.response.data.errors)
			})
			this.name = '',
			this.email = '',
			this.password = '',
			this.password_confirmation = ''
		},
		destroy (id) {
			let uri = '/api/user/'+id;
			axios.delete(uri).then(response => {
				// console.log(response)
				this.users = response.data
			}).catch(error => {
				console.log(error.response.data)
			}) 
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