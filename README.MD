## Web Form - Login

This is a Web application build on PHP 8.3.3 and MySQL 8.0.36. Both dependencies are part of the Docker setup which
you can find as part of the project and doesn't require local installation. Keep in mind when you run the command 
'<b>docker-compose up -d</b>' in terminal it will creates a Database named '<b>wf_login</b>'.

### Prerequisites

1. Docker - Can be downloaded/installed from the official [Docker page](https://docs.docker.com/get-docker/)

### Setup

The application is dockerized. To install the service locally type the following commands in your terminal:

```shell
git clone https://github.com/seeff00/wf-login.git
cd wf-login
mv .env.dev .env
docker-compose up -d
```

### Usage

Open your favorite browser and enter 'localhost' in the URL field. 

![home.jpg](..%2F..%2FDesktop%2Fhome.jpg)