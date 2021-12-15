module.exports = {
  parserOptions: {
    requireConfigFile: false,
  },
  extends: ['airbnb-base', 'plugin:prettier/recommended'],
  parser: '@babel/eslint-parser',
  rules: {
    'no-console': 'warn',
    'import/no-extraneous-dependencies': ['error', { devDependencies: true }],
    'no-param-reassign': ['error', { props: false }],
  },
  env: {
    browser: true,
  },
};
