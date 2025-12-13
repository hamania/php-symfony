import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vite.dev/config/
export default defineConfig({
  base: '/',
  server: {
    port: 5173,        // 👈 your custom port
    strictPort: true,  // 👈 fail if port is taken, don’t fall back
  },
  plugins: [vue()],
})
