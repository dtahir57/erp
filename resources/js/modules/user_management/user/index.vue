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
											<td>
												<router-link :to="{ name: 'EditUser', params: {id: user.id} }" class="btn btn-success btn-sm">Edit</router-link>
											</td>
											<td>
												<button class="btn btn-danger btn-sm">Delete</button>
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
						<div class="form-group">
							<label class="form-label">Name</label>
							<input type="text" name="name" placeholder="Name" class="form-control" />
						</div>
						<div class="form-group">
							<label class="form-label">Email</label>
							<input type="email" name="email" placeholder="Email" class="form-control" />
						</div>
						<div class="form-group">
							<label class="form-label">Password</label>
							<input type="password" name="password" placeholder="Password" class="form-control" />
						</div>
						<div class="form-group">
							<label class="form-label">Name</label>
							<input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" />
						</div>
						<div class="form-group">
							<button class="btn btn-success btn-block">Save</button>
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
	name: 'User',
	data () {
		return {
			users: []
		}
	},
	created () {
		let uri = Base_URL+'api/users';
		axios.get(uri).then(response => {
			this.users = response.data
		}).catch(error => {
			console.log(error)
		});
	}
}
</script>