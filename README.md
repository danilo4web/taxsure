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
docker-compose up -p
```




## ROUTES

@ Create
```bash
URL: http://0.0.0.0:8001/customer/create 
TYPE: POST
DATA:
{
	"name": "Danilo",
	"email": "danilo4web@gmail.com",
	"phone": "471199999999",
	"address": "My address, 100 - City",
	"gender": "M",
	"status": "1"
}
```

@ Update
```bash 
URL: http://0.0.0.0:8001/customer/1 
TYPE: PUT
DATA:
{
	"name": "Danilo - Updated",
	"email": "daniloborgespereira@gmail.com",
	"phone": "88999997768",
	"address": "My address, 100 - City",
	"gender": "M",
	"status": "1"
}    
```

@ Show
```bash 
URL: http://0.0.0.0:8001/customer/2
TYPE: GET
```

@ Delete
```bash 
URL: http://0.0.0.0:8001/customer/3
TYPE: DELETE
```

@ Search
```bash 
URL: http://0.0.0.0:8001/customers
TYPE: POST
DATA:
{
	"name": "Danilo",
	"email": "daniloborgespereira@gmail.com"
}    
```
