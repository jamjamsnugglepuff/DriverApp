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
	<Link class="text-lg hover:ease-in duration-100 hover:underline hover:text-white hover:cursor-pointer" :href="href" :method="method" as="type">{{name}}</Link>
</template>