<template>
	<div class="assign_role">
		<div class="card-body">
			<div class="row">
				<multiselect v-model="assigned_roles" :options="roles" :multiple="true"></multiselect>
			</div>
			<br>
			<div class="form-group">
				<button class="btn btn-success" @click="assignRoles(user.id)">Update</button>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">All Roles</h3>
						</div>
						<div class="card-body">
							<ul>
								<li v-for="(role, index) in roles" :key="index">{{ role }}</li>
							</ul>
						</div>
					</div> <!-- /.card -->
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Assigned Roles</h3>
						</div>
						<div class="card-body">
							<ul>
								<li v-for="(role, index) in assigned_roles" :key="index">{{ role }}</li>
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
	name: 'AssignRole',
	components: { Multiselect },
	data () {
		return {
			user: {},
			roles: [],
			assigned_roles: []
		}
	},
	methods: {
		assignRoles (id) {
			let uri = '/api/user/assign_roles/'+id;
			axios.post(uri, {
				roles: this.assigned_roles
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
			this.assigned_roles = response.data.roles
		}).catch(error => {
			console.log(error.response);
		})

		axios.get('/api/roles').then(response => {
			var roles = response.data
			for (var i =0; i < roles.length; i++) {
				this.roles.push(roles[i].name)
			}
		}).catch(error => {
			console.log(error)
		});
	}
}
</script>