<template>
	<div class="assign_users">
		<h4>Add Users to "{{ team.name }}" Team</h4>
		<div class="card-body">
			<div class="row">
				<multiselect v-model="added_users" :options="users" :multiple="true"></multiselect>
			</div>
			<br>
			<div class="form-group">
				<button class="btn btn-success" @click="addUsers(team.id)">Update</button>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card custom_card_style">
						<div class="card-header">
							<h3 class="card-title">All Users</h3>
						</div>
						<div class="card-body">
							<ul>
								<li v-for="(user, index) in users" :key="index">{{ user }}</li>
							</ul>
						</div>
					</div> <!-- /.card -->
				</div>
				<div class="col-md-6">
					<div class="card custom_card_style">
						<div class="card-header">
							<h3 class="card-title">Added Users</h3>
						</div>
						<div class="card-body">
							<ul>
								<li v-for="(user, index) in added_users" :key="index">{{ user }}</li>
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
	name: 'AssignUser',
	components: { Multiselect },
	data () {
		return {
			team: {},
			added_users: [],
			users: []
		}
	},
	methods: {
		addUsers (id) {
			let uri = '/api/team/add_users/'+id;
			axios.post(uri, {
				users: this.added_users
			}).then(response => {
				this.$router.push({ name: 'Team' });
			}).catch(error => {
				console.log(error.response.data)
			})
		}
	},
	created () {
		let uri = `/api/team/${this.$route.params.id}`;
		axios.get(uri).then(response => {
			this.team = response.data.team
			this.added_users = response.data.users
		}).catch(error => {
			console.log(error.response)
		});
		axios.get('/api/users').then(response => {
			var users = response.data
			for (var i =0; i < users.length; i++) {
				this.users.push(users[i].name);
			}
		}).catch(error => {
			console.log(error.response.data)
		})
	}
}
</script>
<style>
.custom_card_style {
	max-height: 400px;
	overflow-y: auto;
}
.custom_card_style ul {
	list-style-type: none;
	padding: 0;
}
.custom_card_style ul li {
	width: 100%;
	padding: 5px;
	color: #000;
}
.custom_card_style ul li:hover {
	background: #f2f4f7;
	cursor: pointer;
}
</style>