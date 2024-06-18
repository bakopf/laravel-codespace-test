import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
      ],
      refresh: true,
    }),
  ],
  resolve: {
    alias: {
      // Include jQuery and Popper.js aliases
      jquery: path.resolve(__dirname, 'node_modules/jquery/dist/jquery.min.js'),
      'popper.js': path.resolve(__dirname, 'node_modules/@popperjs/core/dist/umd/popper.min.js'),
    },
  },
});
