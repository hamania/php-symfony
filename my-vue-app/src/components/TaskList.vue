<script setup>
import { onMounted } from "vue";
import { useTaskStore } from "../stores/taskStore";

const taskStore = useTaskStore();

onMounted(() => {
  taskStore.fetchTasks();
});
</script>

<template>
  <div>
    <h1>Tasks 2</h1>
    <ul>
      <li v-for="task in taskStore.tasks" :key="task.id">
        {{ task.name }} - {{ task.completed ? "✅" : "❌" }}
      </li>
    </ul>
  </div>
</template>