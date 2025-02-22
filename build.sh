#!/bin/bash

# Navigate to your theme directory on the live server
cd /home/forumiri/public_html/wp-content/themes/Franci-bau

# Pull changes from the Git repository
git pull origin main

# Install npm packages (if needed)
# npm install

# Run npm watch to compile JavaScript and SCSS files
npm run watch &

# Run grunt to watch Tailwind CSS and other styles
grunt
