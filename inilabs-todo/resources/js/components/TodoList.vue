<template>
    <div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                <tr v-for="todo in todos" :key="todo.id">
                    <td>{{ todo.id }}</td>
                    <td>{{ todo.name }}</td>
                    <td>{{ todo.description }}</td>
                    <td>
                      <div class="row gap-3">
                        <router-link :to="`/todos/${todo.id}`" class="p-2 col border btn btn-primary">View</router-link>
                        <router-link :to="`/todos/${todo.id}/edit`" class="p-2 col border btn btn-success">Edit</router-link>
                        <button @click="deleteTodo(todo.id)" type="button" class="p-2 col border btn btn-danger">Delete</button>
                      </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      todos: []
    }
  },
  async created() {
    try {
      const response = await axios.get('/api/todos');
      this.todos = response.data;
    } catch (error) {
      console.error(error);
    }
  },
  methods: {
    async deleteTodo(id) {
      try {
        await axios.delete(`/api/todos/${id}`);
        this.todos = this.todos.filter(todo => todo.id !== id);
      } catch (error) {
        console.error(error);
      }
    }
  }
}
</script>