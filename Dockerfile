FROM registry.ecoex.ir/internal/library/php/fpm:8.1.1

RUN apk add git

RUN echo "Setting Up Extentions" \
  && install-php-extensions \
  gd pdo_mysql redis sockets decimal


RUN echo "Cleaning Up" \
  && pear config-set http_proxy "" \
  && rm -rf /tmp/* \
  && rm -rf vendor

