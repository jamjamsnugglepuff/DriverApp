<script>
	import { Link } from '@inertiajs/vue3';

	export default{

		props: ['href', 'name', 'method', 'type'],

		components: {
			Link
		},
	}
</script>
<template>
	<Link class="block text-white text-center bg-black hover:bg-white hover:text-black w-full p-3 hover:cursor-pointer" :href="href" :method="method" as="type">{{name}}</Link>
</template>