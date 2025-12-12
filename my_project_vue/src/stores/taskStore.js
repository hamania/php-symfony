import { defineStore } from "pinia";
import axios from "axios";

export const useTaskStore = defineStore("taskStore", {
  state: () => ({
    tasks: [],
  }),
  actions: {
    async fetchTasks() {
      try {
        const res = await axios.get("https://localhost:8000/api/tasks");
        this.tasks = res.data["hydra:member"];
      } catch (error) {
        console.error("Error fetching tasks:", error);
      }
    },
  },
});