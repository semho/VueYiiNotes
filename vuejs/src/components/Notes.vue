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
export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "Notes",
  components: { Note, AddNewButton },
  data() {
    return {
      notes: [
        {
          title: "Заметка 1",
          body: "Описание заметки 1",
        },
        {
          title: "Заметка 2",
          body: "Описание заметки 2",
        },
        {
          title: "Заметка 3",
          body: "Описание заметки 3",
        },
        {
          title: "Заметка 4",
          body: "Описание заметки 4",
        },
        {
          title: "Заметка 5",
          body: "Описание заметки 5",
        },
      ],
    };
  },
  methods: {
    addNote() {
      this.notes.unshift({title: '', body: ''});
    },
    deleteNote(note) {
      this.notes.splice(this.notes.indexOf(note), 1);
    },
    // eslint-disable-next-line no-unused-vars
    noteUpdated(note) {
      
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
