# WP Engine Deployment GitHub Actions

1. Copy & Paste the `wpe-deploy-*.yml` file into your projects `.github/workflows` directory to take advantage of this action.
2. These workflows rely on the `composer-install` action [from Moose]([url](https://github.com/moderntribe/moose/tree/main/.github/actions)). Be sure your project is also using them or that you're replicated that functionality in your local project.
3. You will need to update the `WPE_DEPLOY_REPO`, `DEPLOY_PRIVATE_SSH_KEY`, `COMPOSER_AUTH_JSON`, and `COMPOSER_ENV` secrets to use this deployment in your project.
