<template>
	<div id="calendar">
		<div class="col-md-5">
			<event-form @newEvent="getEvent"></event-form></div>

		<div class="col-md-7">
			<event-list :event="event"></event-list></div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				RESOURCE_API: process.env.MIX_RESOURCE_API,
				event: {},
				schedule: []
			}
		},

		methods: {
			getEvent: function(eventId) {
				axios.get(this.RESOURCE_API + `/calendar/events/${eventId}?include=schedule`)
					.then(response => {
						console.log(response);

						this.event = response.data.data;
						this.schedule = this.event.schedule.data;

						//this.events = response.data.data;
						//let 
					});	
			}
		}
	}
</script>