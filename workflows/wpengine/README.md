# WP Engine Deployment GitHub Actions

## WP Engine Deployment Workflows
We have 3 deployment workflows to interface with whatever hosting environment is needed (deploy-dev.yml,
deploy-stage.yml, deploy-prod.yml). You will need to update the `[DEV|STAGE|PROD]_DEPLOY_REPO`,
`DEPLOY_PRIVATE_SSH_KEY`, and 1Password secrets (`OP_SERVICE_ACCOUNT_TOKEN`, `OP_VAULT`, `OP_ITEM`) to use these
deployments in your project. These are intended to be deploying to the hosting service where the site will live. Most
hosting companies work with `git` making it the default push we currently use.

## Setup Instructions
1. Copy & Paste the `wpe-deploy-*.yml` file into your projects `.github/workflows` directory to take advantage of this action.
2. These workflows rely on the `composer-install` action [from Moose]([url](https://github.com/moderntribe/moose/tree/main/.github/actions)). Be sure your project is also using them or that you're replicated that functionality in your local project.
3. You will need to update the `WPE_DEPLOY_REPO`, `DEPLOY_PRIVATE_SSH_KEY`, `COMPOSER_AUTH_JSON`, and `COMPOSER_ENV` secrets to use this deployment in your project.
