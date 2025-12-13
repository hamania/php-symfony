#!/bin/bash
# brew install tabbyml/tabby/tabby

# Start server with StarCoder-1B
export TABBY_WEBSERVER_JWT_TOKEN_SECRET=18e1e03d-bef4-4ecc-8e15-e3381210cdc8
export JWT_EXPIRATION_TIME=864000

tabby serve --device metal --model StarCoder-1B --chat-model Qwen2-1.5B-Instruct

#PC admin hamania@gmail.com:A7m!Qx2#Lp9Z 
#PC token auth_1ee1b68e812a4833ad7af12829b3f9c7

#mac admin hamania@gmail.com:A7m!Qx2#Lp9Z 
#mac token auth_1ee1b68e812a4833ad7af12829b3f9c7