<template>
	<div class="assign_permission">
		<h4>Assign Permissions to {{ user.name }}</h4>
		<div class="card-body">
			<div class="row">
				<multiselect v-model="assigned_permissions" :options="permissions" :multiple="true"></multiselect>
			</div>
			<div class="form-group">
				<button class="btn btn-success" @click="assignPermissions(user.id)">Update</button>
			</div>
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