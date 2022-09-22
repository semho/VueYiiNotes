<template>
  <div class="tc-notes-wrapper">
    <add-new-button @listenerAddNotea="addNote" />
    <div class="tc-notes">
      <note v-for="(note, index) in notes" :key="index" :note="note" @deleteNote='deleteNote'
        @noteUpdated="noteUpdated"/>
    </div>
  </div>
</template>

<script>
import AddNewButton from "./AddNewButton.vue";
import Note from "./Note.vue";
import httpClient from '../services/http.service.js';
export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "Notes",
  components: { Note, AddNewButton },
  data() {
    return {
      notes: [],
    };
  },
  methods: {
    async addNote() {
      const {status, data} = await httpClient.post('note', {});
      if (status === 201) { 
        this.notes.unshift(data);
      }
    },
    async deleteNote(note) {
      const {status} = await httpClient.delete(`note/${note.id}`, {});
      if (status === 204) { 
        this.notes.splice(this.notes.indexOf(note), 1);
      }
    },
    async noteUpdated(note) {
      await httpClient.put(`note/${note.id}`, note);
    }
  },
  async mounted() {
    const {status, data} = await httpClient.get('note');
    if (status === 200) {
      this.notes = data;
    }
  }
};
</script>

<style lang="scss" scoped>
.tc-notes-wrapper {
  padding: 30px;
  .tc-notes {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin: 0 auto;
  }
}
</style>
