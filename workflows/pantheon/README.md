# Pantheon Deployment GitHub Actions

## Pantheon Deployment Workflows
A single deployment workflow interfaces with the main destination (`dev`) as well as any multi-dev environments.
You will need to update the `PANTHEON_SSH_KEY` ([doc](https://docs.pantheon.io/ssh-keys)), `PANTHEON_MACHINE_TOKEN`
([doc](https://docs.pantheon.io/machine-tokens)), 1Password secrets (`OP_SERVICE_ACCOUNT_TOKEN`, `OP_VAULT`, `OP_ITEM`),
as well as the `PANTHEON_SITE_MACHINE_NAME` variable to use this deployment in your project.

## Setup Instructions
1. Copy and paste the `deploy-pantheon.yml` file into your project's `.github/workflows` directory to take advantage of this action.
2. Remove `node_modules` line from `.deploy/deploy-exclude.txt`.
3. This workflow relies on the `composer-install` action [from ModernPress]([url](https://github.com/moderntribe/modernpress/tree/main/.github/actions)).
Be sure your project includes the action, or that you've replicated that functionality in your local project.
4. You will need to define the `PANTHEON_SSH_KEY`, `PANTHEON_MACHINE_TOKEN`, `OP_SERVICE_ACCOUNT_TOKEN`, `OP_VAULT`,
and `OP_ITEM` secrets, as well as `PANTHEON_SITE_MACHINE_NAME` variable to use this deployment in your project.
