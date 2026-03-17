FROM  nginx:stable-alpine3.23-perl

COPY ./nginx.conf /etc/nginx/

COPY ./conf.d/* /etc/nginx/conf.d/

# RUN rm /etc/nginx/conf.d/default.conf

# SSL
# RUN apk add certbot
RUN apk add openssl
RUN mkdir -p /cert/
COPY ./openssl.cnf ./cert/
WORKDIR /cert/
RUN openssl req -x509 -nodes -days 365 \
    -newkey rsa:2048 \
    -keyout localhost.key \
    -out localhost.crt \
    -config openssl.cnf \
    -extensions ext

RUN mkdir /etc/nginx/sites-enabled/




EXPOSE 80 443