<template>
	
</template>

<script>
	export default {
		name: "DriverInfo",
		data: function() {
			return {
				countries: {!! json_encode($countries) !!},
				tags_arr: {!! json_encode($tags_arr) !!},
				lastname: '{!! $tags['p35t1'] !!}',
				firstname: '{!! $tags['p36t1'] !!}',
				secondname: '{!! $tags['p37t1'] !!}',
				country: '{!! $tags['p39t1'] !!}',
				phone_num: '{!! $tags['p34t1'] !!}',
				address: '{!! $tags['p30t1'] !!}',
			}
		},
		
	}
</script>

<style>
	
</style>