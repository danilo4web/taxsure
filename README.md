## Install (Local server)

```bash
# clone repository
git clone https://github.com/danilo4web/taxsure

# go to folder
cd taxsure

# install dependencies
composer install
```
## Install (Docker)

```bash
# clone repository
git clone https://github.com/danilo4web/taxsure

# create container
docker build -f ./Dockerfile -t taxsure/taxsure .

# execute container
docker run -itd --rm -v `pwd`:/var/www/taxsure -p 8002:80 --name taxsure.local taxsure/taxsure:latest
```

# Testing
```bash
# Phpunit
composer test
```
