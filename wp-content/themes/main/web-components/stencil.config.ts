import { Config } from '@stencil/core';
import { sass } from '@stencil/sass';

export const config: Config = {
  namespace: 'web-components',
  plugins: [
    sass()
  ],
  outputTargets:[
    {
      type: 'dist'
    },
    {
      type: 'www',
      serviceWorker: null
    }
  ]
};
