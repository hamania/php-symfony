import { defineStore } from "pinia";
import axios from "axios";

axios.baseURL = import.meta.env.VITE_BASE_API_URL || "http://localhost:8001/api";
if (axios.baseURL.includes("http")) {
  axios.baseURL = window.location.origin + axios.baseURL;
}
console.log("axios.baseURL:", axios.baseURL);

export const useTaskStore = defineStore("taskStore", {
  state: () => ({
    tasks: [],
  }),
  actions: {
    async fetchTasks() {
      try {
        const res = await axios.get(axios.baseURL + "/tasks");
        this.tasks = res.data["member"];
      } catch (error) {
        console.error("Error fetching tasks:", error);
      }
    },

    async addTask(task) {
      try {
        const payload = {
          name: task.name,
          completed: task.completed ?? false
        };
        const options = {
          headers: {
            'Content-Type': 'application/ld+json'
          }
        };
        const res = await axios.post(axios.baseURL + "/tasks", payload, options)
        // API Platform returns the created entity
        this.tasks.push(res.data)
      } catch (err) {
        console.error('Error creating task:', err)
      }
    },

    async toggleTask(id) {
      const task = this.tasks.find(t => t.id === id)
      if (task) {
        const payload = { ...task, completed: !task.completed }
        const options = {
          headers: {
            'Content-Type': 'application/merge-patch+json'
          }
        };
        try {
          await axios.patch(axios.baseURL +`/tasks/${id}`, payload, options)
          task.completed = !task.completed
        } catch (err) {
          console.error('Error updating task:', err)
        }
      }
    }
  },
});