<template>
    <div>
      <h2 v-if="isNewProduct">Add Todo</h2>
      <h2 v-else>Edit Todo</h2>
        <form @submit.prevent="submitForm">
          <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input class="form-control" type="text" id="name" v-model="todo.name" required />
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" v-model="todo.description" required></textarea>
          </div>
          <button type="submit" v-if="isNewTodo" class="btn btn-primary">Add Todo</button>
          <button type="submit" v-else class="btn btn-primary">Update Todo</button>
        </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        todo: {
          name: '',
          description: '',
        }
      }
    },
    computed: {
      isNewTodo() {
        return !this.$route.path.includes('edit');
      }
    },
    async created() {
      if (!this.isNewTodo) {
        const response = await axios.get(`/api/todos/${this.$route.params.id}`);
        this.todo = response.data;
      }
    },
    methods: {
      async submitForm() {
        try {
          if (this.isNewTodo) {
            await axios.post('/api/todos', this.todo);
          } else {
            await axios.put(`/api/todos/${this.$route.params.id}`, this.todo);
          }
          this.$router.push('/');
        } catch (error) {
          console.error(error);
        }
      }
    }
  }
  </script>