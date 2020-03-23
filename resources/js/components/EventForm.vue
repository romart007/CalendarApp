<template>
	<form v-on:submit="saveEvent()">
		<label>Name</label>
		<input type="text" v-model="fields.name" name="name" id="name"/><br/>

		<label>From</label>
		<input type="date" v-model="fields.from" name="from" id="from"/>

		<label>To</label>
		<input type="date" v-model="fields.to" name="to" id="to"/><br/>

		<ul style="list-style: none;">
			<li v-for="day in weekdays" style="display: inline-block;">
				<input type="checkbox" v-model="checkedDays" :value="day"/>{{day}}</li>
		</ul>

		<button type="submit">Save</button>
	</form>
</template>

<script>
	export default {
		data() {
			return {
				RESOURCE_API: this.$parent.RESOURCE_API,
				weekdays: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
				fields: {},
				checkedDays: []
			}
		},

		methods: {
			saveEvent: function() {
				event.preventDefault();

				const vm = this;

				this.fields['days'] = this.checkedDays;

				axios.post(this.RESOURCE_API + '/calendar', this.fields)
					.then(function(response){
						console.log(response);

						let event = response.data.data;
						vm.$emit('newEvent', event.event_id);
					})
					.catch(function(e){
						console.log(e);
					});
			}
		}
	}
</script>