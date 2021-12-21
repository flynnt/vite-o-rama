import eslint from '@rollup/plugin-eslint';
import legacy from '@vitejs/plugin-legacy';
import ViteRestart from 'vite-plugin-restart';

export default ({ command }) => ({
  base: command === 'serve' ? '' : '/dist/',
  build: {
    emptyOutDir: true,
    manifest: true,
    outDir: './app/web/dist/',
    rollupOptions: {
      input: {
        app: './src/scripts/main.js',
      },
    },
  },
  plugins: [
    {
      ...eslint(),
      enforce: 'pre',
      apply: 'build',
    },
    legacy({
      targets: ['defaults', 'not IE 11'],
    }),
    ViteRestart({
      reload: ['./app/templates/**/*'],
    }),
  ],
  server: {
    host: '0.0.0.0',
    origin: 'http://localhost:3000',
  },
});
