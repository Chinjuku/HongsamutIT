<script>
	export let data;
	const products = data.products
</script>

{#each products as product}
	<ul>
		<li>
			{product.title}
		</li>
	</ul>
{/each}
<h1>Welcome to IT</h1>
<h3>Svelte</h3>
<h2>Hello Hongsamut</h2>
<h1>Hello World</h1>
<h1>kuy github</h1>