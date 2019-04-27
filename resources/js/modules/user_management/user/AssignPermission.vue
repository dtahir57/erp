<template>
	<div class="assign_permission">
		<h4>Assign Permissions to {{ user.name }}</h4>
		<div class="card-body">
			<div class="row">
				<multiselect v-model="assigned_permissions" :options="permissions" :multiple="true"></multiselect>
			</div>
			<br>
			<div class="form-group">
				<button class="btn btn-success" @click="assignPermissions(user.id)">Update</button>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">All Permissions</h3>
						</div>
						<div class="card-body">
							<ul>
								<li v-for="(permission, index) in permissions" :key="index">{{ permission }}</li>
							</ul>
						</div>
					</div> <!-- /.card -->
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Assigned Permissions</h3>
						</div>
						<div class="card-body">
							<ul>
								<li v-for="(permission, index) in assigned_permissions" :key="index">{{ permission }}</li>
							</ul>
						</div>
					</div> <!-- /.card -->
				</div>
			</div> <!-- /.row -->
		</div>
	</div>
</template>
<script>
import Multiselect from 'vue-multiselect'

export default {
	name: 'AssignPermissions',
	components: { Multiselect },
	data () {
		return {
			user: {},
			permissions: [],
			assigned_permissions: []
		}
	},
	methods: {
		assignPermissions (id) {
			let uri = '/api/user/assign_permissions/'+id;
			axios.post(uri, {
				permissions: this.assigned_permissions
			}).then(response => {
				this.$router.push({ name: 'User' })
			}).catch(errors => {
				console.log(errors.response.data)
			})
		}
	},
	created () {
		let uri = `/api/user/${this.$route.params.id}`;
		axios.get(uri).then(response => {
			this.user = response.data.user
			this.assigned_permissions = response.data.permissions
		}).catch(error => {
			console.log(error.response);
		})

		axios.get('/api/permissions').then(response => {
			var permissions = response.data
			for (var i =0; i < permissions.length; i++) {
				this.permissions.push(permissions[i].name)
			}
		}).catch(error => {
			console.log(error)
		});
	}
}
</script>