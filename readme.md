
## Sobre

Aplicação de teste que consiste numa [API](https://pt.wikipedia.org/wiki/Interface_de_programa%C3%A7%C3%A3o_de_aplica%C3%A7%C3%B5es) de pedidos que contém os seguinte Models: Customer, Product, Order e Item desenvolvida em PHP utilizando o framework Laravel.

## Utilizando o projeto

Um pré-requisito para executar esse projeto é ter o docker instalado no seu dispositivo. Será necessário de três contatiners para a execução deste projeto com os serviços listados abaixo:

- **nginx** - `:80`
- **mysql** - `:3306`
- **php** - `:9000`
- **redis** - `:6379`

Na raiz do projeto execute os comandos:

```docker

docker-compose run --rm composer update
docker-compose run --rm npm run dev
docker-compose run --rm artisan migrate

```


## Dúvidas

Se você tiver dúvidas nesse repositorio entre em contato com Luiz Santos via[luizcsdev@laravel.com](mailto:luizcsdev@gmail.com). Todas as dúvidas serão respondidas por e-mail

## License

