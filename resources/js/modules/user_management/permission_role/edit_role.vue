<template>
	<div class="edit_role">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Edit Role</h3>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label class="form-label">Name</label>
					<input type="text" name="name" class="form-control" v-model="role.name" />
				</div>
				<div class="form-group">
					<button class="btn btn-success" @click="updateRole">Update</button>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import Base_URL from '../../../api/index.js'

export default {
	name: 'EditRole',
	data () {
		return {
			role: {}
		}
	},
	methods: {
		updateRole () {
			let uri = Base_URL+`api/role/${this.$route.params.id}`;
			console.log(uri)
			axios.patch(uri, this.role).then(response => {
				this.$router.push({ name: 'Permission' });
			}).catch(error => {
				console.log(error);
			})
		}
	},
	created() {
		let uri = Base_URL+`api/role/${this.$route.params.id}/edit`;
		axios.get(uri).then(response => {
			this.role = response.data.role
		}).catch(error => {
			console.log(error)
		});
	}
}
</script>