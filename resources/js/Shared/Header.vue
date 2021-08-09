<template>
  <header>
    <div class="container-fluid bg-gray-300 py-4">
      <div class="row">
        <div class="col p-4">
           <Link :href="route('dashboard.index')">Projects & Tasks</Link>
        </div>
      </div>
    </div>
  </header>
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
a{
  font-size:30px;
  font-weight: 900;
  color: #FF2730;
  text-decoration: none;
  text-transform: uppercase;
}
a:hover{
  color: #FC4850;
}
</style> 