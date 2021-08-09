<template>
    <ul>
        <li>
            <Link :href="route('project.index')">Projetos</Link>
        </li>
    </ul>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
  components: {
    Link,
  }
}
</script>

<style scoped>
ul{
    list-style: none;
    padding:2rem 0px;
    margin:0px; 
}

ul > li{
    padding:0px;
}
ul > li > a{
    color: white;
    font-size: 1.3rem;
    text-decoration: none;
    font-weight: 700;
    padding: 10px 40px;
    display: block;
}
ul > li > a:hover, .active{
    background: var(--gray-100);
    color: var(--gray-900);
}
</style>