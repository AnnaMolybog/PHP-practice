FROM phpdockerio/php71-fpm:latest

ARG USERID=500
ARG GROUPID=500
# Install selected extensions and other stuff
RUN apt-get update \
    # Frontend tools
    && apt-get install -y apt-transport-https \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
    && apt update && apt install -y yarn \
    && curl -sL https://deb.nodesource.com/setup_6.x | bash - \
    && apt-get install -y nodejs \
    # PHP extensions
    && apt-get -y --no-install-recommends install php7.1-gd php7.1-mbstring php7.1-mysql php-redis php7.1-intl php7.1-soap php7.1-xsl php7.1-phpdbg git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && mkdir /application \
    && usermod -u $USERID -d /application www-data \
    && chown www-data:www-data /application \
    && usermod -u $USERID -d /run www-data \
    && chown www-data:www-data /run \
    # Install blackfire probe php extension
    && version=$(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;") \
    && curl -A "Docker" -o /tmp/blackfire-probe.tar.gz -D - -L -s https://blackfire.io/api/v1/releases/probe/php/linux/amd64/$version \
    && tar zxpf /tmp/blackfire-probe.tar.gz -C /tmp \
    && mv /tmp/blackfire-*.so $(php -r "echo ini_get('extension_dir');")/blackfire.so \
    && printf "extension=blackfire.so\nblackfire.agent_socket=tcp://blackfire:8707\n" > /etc/php/7.1/fpm/conf.d/blackfire.ini
WORKDIR "/application"
USER www-data
