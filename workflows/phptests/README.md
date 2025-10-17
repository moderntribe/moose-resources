# SLIC PHP Unit Tests GitHub Actions

1. Copy & Paste the `php-tests.yml` file into your projects `.github/workflows` directory to take advantage of this action.
2. Update your project's `code-quality.yml` file to include the PHP Tests workflow as needed. Here's an example of 
   how to include it:
```yaml
 slic:
   name: 'PHP Tests'
   needs: [coding-standards, phpstan, linting]
   uses: ./.github/workflows/php-tests.yml
    secrets:
      OP_SERVICE_ACCOUNT_TOKEN: ${{ secrets.OP_SERVICE_ACCOUNT_TOKEN }}
      OP_VAULT: ${{ secrets.OP_VAULT }}
      OP_ITEM: ${{ secrets.OP_ITEM }}
```
