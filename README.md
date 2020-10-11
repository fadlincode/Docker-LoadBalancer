# Docker-LoadBalancer

Using : Nginx, PHP, MySQL, HAProxy

## Installation
```bash
git clone https://github.com/fadlincode/Docker-LoadBalancer.git
```

## Run
```bash
cd Docker-LoadBalancer
docker-compose up
```

## Notes (Conditional)

if container gives permission denied after run project, make sure your machine is Permissive 
```bash
getenforce
setenforce 0
```
