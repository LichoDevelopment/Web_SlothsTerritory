#!/bin/bash

apt install git -y
git config --global user.email "lichodevelopment@gmail.com"
git config --global user.name "server"

curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash
source ~/.bashrc
nvm install v16.16.0
cd default_site/
npm i
npm run prod