#!/bin/bash
# brew install tabbyml/tabby/tabby

# Start server with StarCoder-1B
export TABBY_WEBSERVER_JWT_TOKEN_SECRET=864000
export JWT_EXPIRATION_TIME=864000

tabby serve --device metal --model StarCoder-1B --chat-model Qwen2-1.5B-Instruct

