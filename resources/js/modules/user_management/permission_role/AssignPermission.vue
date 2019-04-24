<template>
	<div class="assign_permission">
		<h4>Assign Permissions to {{ role.name }}</h4>
		<div class="card-body">
			<div class="row">
				<multiselect v-model="assigned_permissions" :options="permissions" :multiple="true"></multiselect>
			</div>
			<div class="form-group">
				<button class="btn btn-success" @click="assignPermissions(role.id)">Update</button>
			</div>
		</div>
	</div>
</template>
<script>
import Multiselect from 'vue-multiselect'

export default {
	name: 'AssignPermission',
	components: { Multiselect },
	data () {
		return {
			role: {},
			permissions: [],
			assigned_permissions: []
		}
	},
	methods: {
		assignPermissions (id) {
			let uri = '/api/role/assign_permissions/'+id;
			axios.post(uri, {
				permissions: this.assigned_permissions
			}).then(response => {
				this.$router.push({ name: 'Permission' })
			}).catch(errors => {
				console.log(errors.response.data)
			})
		}
	},
	created () {
		let uri = `/api/role/${this.$route.params.id}`;
		axios.get(uri).then(response => {
			this.role = response.data.role
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