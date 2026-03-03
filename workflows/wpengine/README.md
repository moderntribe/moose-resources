# WP Engine Deployment GitHub Actions

## WP Engine Deployment Workflows
We have three deployment workflows to interface with whatever hosting environment is needed (`deploy-dev.yml`,
`deploy-stage.yml`, `deploy-prod.yml`). You will need to update the `WPE_SSHG_KEY_PRIVATE` and 1Password secrets
(`OP_SERVICE_ACCOUNT_TOKEN`, `OP_VAULT`, `OP_ITEM`) to use these deployments in your project.
These are intended to be deploying to the hosting service where the site will live. Most hosting companies work
with `git` making it the default push we currently use.

## Setup Instructions
1. Copy and paste the `wpe-deploy-*.yml` file into your project's `.github/workflows` directory to take advantage of this action.
2. Remove `node_modules` line from `.deploy/deploy-exclude.txt`.
3. These workflows rely on the `composer-install` action [from ModernPress]([url](https://github.com/moderntribe/modernpress/tree/main/.github/actions)).
Be sure your project is also using them or that you're replicated that functionality in your local project.
4. You will need to define the `WPE_SSHG_KEY_PRIVATE`, `OP_SERVICE_ACCOUNT_TOKEN`, `OP_VAULT`, and `OP_ITEM` secrets to use this deployment in your project.
