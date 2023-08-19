<template>
    <div>
        <h5 id="associating-form-text-with-form-controls">Name:</h5>
        <h6>{{ todo.name }}</h6>
        <h5 id="associating-form-text-with-form-controls">Description:</h5>
        <p>{{ todo.description }}</p>
        <router-link :to="`/todos/${todo.id}/edit`" class="btn btn-primary">Edit</router-link>
    </div>
</template>

<script>
import axios from 'axios';

export default {
data() {
    return {
    todo: {}
    }
},
async created() {
    try {
    const response = await axios.get(`/api/todos/${this.$route.params.id}`);
    this.todo = response.data;
    } catch (error) {
    console.error(error);
    }
}
}
</script>