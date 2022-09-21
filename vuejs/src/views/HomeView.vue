<template>
  <div class="home">
    <Notes />
    
  </div>
</template>

<script>
import Notes from '@/components/Notes.vue';
// @ is an alias to /src

export default {
    name: "HomeView",
    components: { Notes }
}
</script>
