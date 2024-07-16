FROM php:7.3-cli-alpine

# 更换国内源为阿里云
RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/' /etc/apk/repositories

# Docker容器里 安装 make 工具
RUN apk update && \
    apk add --no-cache make

WORKDIR /src