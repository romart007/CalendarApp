<template>
	<table class="table table-striped">
		<tr v-for="item in this.$parent.schedule">
			<td>{{item.month_day}} {{item.week_day}}</td>
			<td>{{item.flag ? event.name : null}}</td>
		</tr>
	</table>
</template>

<script>
	export default {
		props: ['event'],
	}
</script>