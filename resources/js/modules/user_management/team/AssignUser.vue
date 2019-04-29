<template>
	<div class="assign_users">
		<!--  -->
	</div>
</template>
<script>
import Multiselect from 'vue-multiselect'

export default {
	name: 'AssignUser',
	components: { Multiselect },
	data () {
		return {
			team: {},
			users: []
		}
	},
	created () {
		let uri = `/api/team/${this.$route.params.id}`;
		axios.get(uri).then(response => {
			this.team = response.data
		}).catch(error => {
			console.log(error.response)
		});
		axios.get('/api/users').then(response => {
			this.users = response.data
		}).catch(error => {
			console.log(error.response.data)
		})
	}
}
</script>