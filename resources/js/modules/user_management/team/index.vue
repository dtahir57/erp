<template>
	<div class="team">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Manage Teams</h3>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover table-outline table-vcenter text-nowrap card-table">
								<thead>
									<tr>
										<td>Team Name</td>
										<td>Team Description</td>
										<td>Edit</td>
										<td>Delete</td>
										<th class="text-center"><i class="icon-settings"></i></th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="(team, index) in teams" :key="index">
										<td>{{ team.name }}</td>
										<td>{{ team.description }}</td>
										<td style="width: 30px;">
											<button class="btn btn-success btn-sm" @click="editTeam(team.id)">Edit</button>
										</td>
										<td style="width: 30px;">
											<button class="btn btn-danger btn-sm" @click="getTeam(team.id)" data-toggle="modal" data-target="#deleteTeamModal">Delete</button>
										</td>
										<td style="width: 30px;">
        									<div class="item-action dropdown">
        										<a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
        										<div class="dropdown-menu dropdown-menu-right">
        											<router-link :to="{ name: 'AssignUser', params: {id: team.id}}" class="dropdown-item"><i class="dropdown-icon fe fe-users"></i> Add Users </router-link>
        										</div>
        									</div>
        								</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Modal Starts Here -->
				<div class="modal fade" id="deleteTeamModal" tabindex="-1" role="dialog" aria-labelledby="deleteTeamModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="deleteTeamModalLabel">Delete Team</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          
				        </button>
				      </div>
				      <div class="modal-body">
				        <h5>Are you sure you want to delete this Team?</h5>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="button" class="btn btn-danger" @click="destroy(team.id)" data-dismiss="modal">OK</button>
				      </div>
				    </div>
				  </div>
				</div>
				<!-- Modal Ends Here -->
			</div>
			<div class="col-md-4">
				<div class="card" v-show="!this.editTeamMode">
					<div class="card-header">
						<h3 class="card-title">Create New Team</h3>
					</div>
					<div class="card-body">
						<div v-if="this.errors">
							<div v-for="error in errors" :key="error.index">
								<p class="text-danger">{{ error[0] }}</p>
							</div>
						</div>
						<div class="form-group">
							<label class="form-label">Team Name</label>
							<input type="text" class="form-control" placeholder="Team Name" v-model="name" />
						</div>
						<div class="form-group">
							<label class="form-label">Team Description</label>
							<textarea class="form-control" placeholder="Team Description" rows="6" v-model="description"></textarea>
						</div>
						<div class="form-group">
							<button class="btn btn-success btn-block" @click="save">Save</button>
						</div>
					</div>
				</div>
				<div class="card" v-show="this.editTeamMode">
					<div class="card-header">
						<h3 class="card-title">Edit Team</h3>
					</div>
					<div class="card-body">
						<div v-if="this.errors">
							<div v-for="error in errors" :key="error.index">
								<p class="text-danger">{{ error }}</p>
							</div>
						</div>
						<div class="form-group">
							<label class="form-label">Team Name</label>
							<input type="text" class="form-control" placeholder="Team Name" v-model="team.name" />
						</div>
						<div class="form-group">
							<label class="form-label">Team Description</label>
							<textarea class="form-control" placeholder="Team Description" rows="6" v-model="team.description"></textarea>
						</div>
						<div class="form-group">
							<button class="btn btn-success btn-block" @click="update(team.id)">Update</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
export default {
	name: 'Team',
	data () {
		return {
			teams: [],
			name: '',
			description: '',
			errors: [],
			team: {},
			editTeamMode: false
		}
	},
	methods: {
		save () {
			let uri = '/api/team';
			axios.post(uri, {
				name: this.name,
				description: this.description
			}).then(response => {
				this.teams = response.data
				this.name = ''
				this.description = ''
				this.errors = []
			}).catch(error => {
				console.log(error.response.data)
				this.errors = error.response.data.errors
			})
		},
		getTeam (id) {
			let uri = '/api/team/'+id;
			axios.get(uri).then(response => {
				this.team = response.data
			}).catch(error => {
				console.log(error.response.data)
			})
		},
		editTeam (id) {
			this.editTeamMode = true
			let uri = '/api/team/'+id+'/edit';
			axios.get(uri).then(response => {
				this.team = response.data.team
			}).catch(error => {
				console.log(error.response.data)
			})
		},
		update (id) {
			let uri = '/api/team/'+id;
			axios.patch(uri, {
				name: this.team.name,
				description: this.team.description
			}).then(response => {
				this.teams = response.data
			}).catch(error => {
				console.log(error.response.data)
			});
			this.editTeamMode = false
		},
		destroy (id) {
			let uri = '/api/team/'+id;
			axios.delete(uri).then(response => {
				this.teams = response.data
			}).catch(error => {
				console.log(error.response.data)
			})
		}
	},
	created () {
		let uri = '/api/teams';
		axios.get(uri).then(response => {
			this.teams = response.data
		}).catch(error => {
			console.log(error.response.data);
		})
	}
}
</script>