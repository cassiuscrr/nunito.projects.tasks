<template>
  <nav aria-label="Pagination table" v-if="data.last_page > 1">
    <ul class="pagination justify-content-center">
      
      <li class="page-item" v-if="data.prev_page_url">
        <a class="page-link" :href="data.prev_page_url" >Anterior</a
        >
      </li>

      <li :class="(n == data.current_page ) ? 'page-item active' : 'page-item'" v-for="n in data.last_page" :key="n">
        <a class="page-link" :href="`${data.path}?page=${n}`"> {{ n }} </a>
      </li>
      
      <li class="page-item" v-if="data.next_page_url">
        <a class="page-link" :href="data.next_page_url">Próximo</a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
    props:{
        data: Object,
    }
};
</script>

<style scoped>
.page-link{
  cursor: pointer;
}
</style>