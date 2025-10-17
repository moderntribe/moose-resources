# Lighthouse CI GitHub Actions

## Lighthouse Testing

We are using the [Lighthouse CI](https://github.com/treosh/lighthouse-ci-action/tree/main) for testing list of production urls that we would like to run lighthouse tests on
and stores the results as artifacts of the action. There are parameters that we set in the [lighthouserc.json](../.github/lighthouse/lighthouserc.json)
file allowing us to set the minimum values for each of the lighthouse matrix. There are minimum values set as a
baseline but each value should be updated once a project is live in order to track that updates made do not effect the
results over time along with the urls that you want to check.  It is recommended that you check production URLs so that
you are getting a realistic representation of the content, images, and caching for the live site. **You will need to
edit the lighthouserc.json file for your project to take advantage of this action**.

## Setup Instructions
1. Copy & Paste the `lighthouse-ci.yml` file into your projects `.github/workflows` directory to take advantage of this action.
2. Create a `lighthouse` folder in your `.github` directory.
3. Copy the `lighthouserc.json` configuration file into the `lighthouse` directory you created above.
3. Update the lighthouse-ci.yml file to suit your project's needs. You will need to adjust the URLs being tested and other settings.
