<script setup>

import { ref } from 'vue';
import { onMounted } from "vue";
import { useTaskStore } from "../stores/taskStore";

const taskStore = useTaskStore();

onMounted(() => {
  taskStore.fetchTasks();
});

const newTaskTitle = ref('')

function addTask() {
  if (newTaskTitle.value.trim() !== '') {
    taskStore.addTask({
      id: Date.now(),
      name: newTaskTitle.value,
      completed: false
    })
    newTaskTitle.value = '' // clear input
  }
}

defineProps({
  msg: String
})
</script>

<template>
  <div>
    <h1>{{ msg }}</h1>
    <ul>
      <li v-for="task in taskStore.tasks" :key="task.id">
        {{ task.name }} - {{ task.completed ? "✅" : "❌" }}
        
        <button @click="taskStore.toggleTask(task.id)">
          {{ task.completed ? 'Undo' : 'Complete' }}
        </button>

        <!-- Delete button -->
        <button @click="taskStore.deleteTask(task.id)">Delete</button>
      </li>
    </ul>
  </div>

   <!-- Input + Button -->
    <div>
      <input
        v-model="newTaskTitle"
        placeholder="Enter new task"
      />
      <button @click="addTask">Add Task</button>
    </div>
</template>